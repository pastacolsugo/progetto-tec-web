<?php

namespace App\Http\Controllers;

use App\Events\ProductSoldOut;
use App\Events\OrderShipped;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Product;

class OrderController extends Controller
{

    public function showOrder()
    {
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', $user_id)->get()->first();
        $cart_id = $cart->id;
        $cart_items = CartItem::where('cart_id', $cart_id)->get();

        foreach ($cart_items as $cart_item) {
            $price = Product::where('id', $cart_item->product_id)->select('price')->get()->first()->price;
            $name = Product::where('id', $cart_item->product_id)->select('name')->get()->first()->name;
            $cart_item['price'] = $price;
            $cart_item['name'] = $name;
        }

        return view('new-order', ['cart_items' => $cart_items, 'cart' => $cart]);
    }

    public function showMyOrders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        $order_ids = $orders->pluck('id');
        $order_items = OrderItem::whereIn('order_id', $order_ids)->get();
        foreach($order_items as $order_item)
        {
            $product = Product::find($order_item->product_id);
            $order_item['name'] = $product->name;
            $order_item['price'] = $product->price;
        }

        return view('my-orders', ['orders' => $orders, 'order_items' => $order_items]);
    }

    public function showOrderSellerListing()
    {
        $seller_id = auth()->user()->id;
        $products = Product::where('seller_id', $seller_id)->get();
        $products_ids = $products->pluck('id');
        $order_items = OrderItem::whereIn('product_id', $products_ids)->get();
        $order_ids = $order_items->pluck('order_id');
        $orders = Order::whereIn('id', $order_ids)->get();
        foreach($order_items as $order_item)
        {
            $product = Product::find($order_item->product_id);
            $order_item['name'] = $product->name;
            $order_item['price'] = $product->price;
        }

        return view('ordersSellerListing', ['orders' => $orders, 'order_items' => $order_items]);
    }

    public function showConfirmOrder()
    {
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', $user_id)->get()->first();
        $cart_id = $cart->id;
        $cart_items = CartItem::where('cart_id', $cart_id)->get();

        foreach ($cart_items as $cart_item) {
            $price = Product::where('id', $cart_item->product_id)->select('price')->get()->first()->price;
            $name = Product::where('id', $cart_item->product_id)->select('name')->get()->first()->name;
            $cart_item['price'] = $price;
            $cart_item['name'] = $name;
        }

        return view('confirmOrder', ['cart_items' => $cart_items, 'cart' => $cart]);
    }

    public function placeOrder(Request $request)
    {
        $user_id = auth()->user()->id;
        $user_cart = Cart::where('user_id', $user_id)->get()->first();
        $cart_items = CartItem::where('cart_id', $user_cart->id)->get();

        foreach($cart_items as $item)
        {
            $product = Product::find($item->product_id);
            if($this->checkSoldOut($product, $item->quantity))
            {
                return redirect()->route('cart')->with('Message', $product->name.' solo '.$product->stock .' rimasti');
            }
        }

        $newOrder = new Order;
        $newOrder->order_date = new DateTime();
        $newOrder->order_total = 0;
        $newOrder->order_status = "Ordinato";
        $newOrder->user_id = $user_id;
        $newOrder->ship_address = $request->get('address');
        $newOrder->save();

        foreach ($cart_items as $cart_item)
        {
            $product = Product::where('id', $cart_item->product_id)->first();

            $newOrderItem = new OrderItem();
            $newOrderItem->product_id = $cart_item->product_id;
            $newOrderItem->order_id = $newOrder->id;
            $newOrderItem->quantity = $cart_item->quantity;
            $newOrderItem->unit_price_paid = $product->price;
            $newOrderItem->status = "Ordinato";

            $product->stock -= $newOrderItem->quantity;
            $product->save();

            $newOrder->order_total += $product->price * $newOrderItem->quantity;
            $newOrder->save();

            $cart_item->delete();

            if ($newOrderItem->quantity <= 0) {
                $newOrderItem->delete();
            } else {
                $newOrderItem->save();
            }
        }

        $user_cart->subtotal = 0;
        $user_cart->items = 0;
        $user_cart->save();

        return redirect()->route('my-orders');
    }

    public function orderNow(Request $request)
    {
        $user_id = auth()->user()->id;
        $cart = Cart::where('user_id', $user_id)->get();
        $product = Product::find($request->get('product_id'));

        $newCartItem = new CartItem;
        $newCartItem->product_id = $product->id;
        $newCartItem->cart_id = $cart->id;
        $newCartItem->quantity = 1;
        $newCartItem->save();

        $cart->items ++;
        $cart->subtotal += $product->price;
        $cart->save();

        return redirect()->route('new-order');
    }

    public function confirmOrderItem(Request $request)
    {
        $order_item = OrderItem::find($request->get('order_item_id'));
        $order_item->status = "Confermato";
        $order_item->save();

        $this->confirmOrder(Order::find($order_item->order_id));

        return redirect()->route('ordersSellerListing');
    }

    private function confirmOrder(Order $order)
    {
        $order_items = OrderItem::where('order_id', $order->id)->get();
        $count = 0;
        foreach($order_items as $item)
        {
            if($item->status == "Confermato" || $item->status == "Spedito" || $item->status == "Consegnato")
            {
                $count++;
            }
        }
        if($count == $order_items->count())
        {
            $order->order_status = "Confermato";
            $order->save();
        }

        return;
    }

    public function shipOrderItem(Request $request)
    {
        $order_item = OrderItem::find($request->get('order_item_id'));
        $order = Order::find($order_item->order_id);
        $product = Product::find($order_item->product_id);
        $order_item->status = "Spedito";
        $order_item->save();

        event(new OrderShipped($order_item, $order, $product));
        $this->shipOrder(Order::find($order_item->order_id));

        return redirect()->route('ordersSellerListing');
    }

    private function shipOrder(Order $order)
    {
        $order_items = OrderItem::where('order_id', $order->id)->get();
        $count = 0;
        foreach($order_items as $item)
        {
            if($item->status == "Spedito" || $item->status == "Consegnato")
            {
                $count++;
            }
        }
        if($count == $order_items->count())
        {
            $order->order_status = "Spedito";
            $order->shipped_date = new DateTime();
            $order->save();
        }

        return;
    }

    public function deliverOrderItem(Request $request)
    {
        $order_item = OrderItem::find($request->get('order_item_id'));
        $order_item->status = "Consegnato";
        $order_item->save();

        $this->deliverOrder(Order::find($order_item->order_id));

        return redirect()->route('ordersSellerListing');
    }

    private function deliverOrder(Order $order)
    {
        $order_items = OrderItem::where('order_id', $order->id)->get();
        $count = 0;
        foreach($order_items as $item)
        {
            if($item->status == "Consegnato")
            {
                $count++;
            }
        }
        if($count == $order_items->count())
        {
            $order->order_status = "Consegnato";
            $order->save();
        }

        return;
    }

    private function checkSoldOut(Product $product, $quantity)
    {
        if($product->stock - $quantity == 0)
        {
            event(new ProductSoldOut($product));
            return false;
        }
        else if($product->stock - $quantity < 0)
        {
            return true;
        }
        return false;
    }

}

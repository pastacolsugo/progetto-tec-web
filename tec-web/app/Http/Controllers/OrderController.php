<?php

namespace App\Http\Controllers;

use App\Events\ProductSoldOut;
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

        return view('my-orders', ['orders' => $orders]);
    }

    public function placeOrder(Request $request)
    {
        $user_id = auth()->user()->id;
        $items = CartItem::where('user_id', $user_id)->get();

        foreach($items as $item)
        {
            $this->checkSoldOut($item);
        }

        $newOrder = new Order;
        $newOrder->order_date = new DateTime();
        $newOrder->order_total = $cart->subtotal;
        $newOrder->order_status = "Pending";
        $newOrder->user_id = $user_id;
        $newOrder->ship_address = $request->address;
        $newOrder->save();

        foreach($items as $item)
        {
            $newOrderItem = new OrderItem;
            $newOrderItem->product_id = $item->product_id;
            $newOrderItem->order_id = $newOrder->id;
            $newOrderItem->quantity = $item->quantity;
            $newOrderItem->save();
        }

        return redirect()->route('my-orders');
    }

    public function orderNow(Request $request, $product_id)
    {
        $user_id = auth()->user()->id;
        $cart = Cart::where('user_id', $user_id)->get();
        $product = Product::find($product_id);

        $newCartItem = new CartItem;
        $newCartItem->product_id = $product_id;
        $newCartItem->cart_id = $cart->id;
        $newCartItem->quantity = 1;
        $newCartItem->save();

        $cart->items ++;
        $cart->subtotal += $product->price;
        $cart->save();

        return redirect()->route('new-order');
    }

    public function confirmOrder(Order $order)
    {
        $order->order_status = "Confirmed";
        $order->save();

        return Response("Your order has been confirmed", 200);
    }

    public function shipOrder(Order $order)
    {
        $order->order_status = "Shipped";
        $order->shipped_date = new DateTime();
        $order->save();

        event(new OrderShipped($order));

        return Response("Your order has been shipped", 200);
    }

    public function deliverOrder(Order $order)
    {
        $order->order_status = "Delivered";
        $order->save();

        return Response("Your order has been delivered", 200);
    }

    private function checkSoldOut(CartItem $item)
    {
        $product = Product::find($item->product_id);
        if($product->stock - $item->quantity == 0)
        {
            event(new ProductSoldOut($product));
        }
    }

}

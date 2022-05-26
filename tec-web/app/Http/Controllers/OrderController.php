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

        $newOrder = new Order();
        $newOrder->order_date = new DateTime();
        $newOrder->order_total = 0;
        $newOrder->order_status = "Pending";
        $newOrder->user_id = $user_id;
        $newOrder->ship_address = $request->get('address');
        $newOrder->save();

        foreach ($cart_items as $cart_item)
        {
            $availableProductStock = Product::where('id', $cart_item->product_id)->first()->stock;
            if ($availableProductStock <= 0) {
                continue;
            }

            $newOrderItem = new OrderItem();
            $newOrderItem->product_id = $cart_item->product_id;
            $newOrderItem->order_id = $newOrder->id;
            $newOrderItem->quantity = $availableProductStock < $cart_item->quantity ? $availableProductStock : $cart_item->quantity;

            $product = Product::where('id', $cart_item->product_id)->first();
            $product->stock -= $newOrderItem->quantity;
            $product->save();

            $newOrder->order_total += $product->price * $newOrderItem->quantity;
            $newOrder->save();

            if ($availableProductStock < $cart_item->quantity) {
                $cart_item->quantity -= $availableProductStock;
                $cart_item->save();
            } else {
                $cart_item->delete();
            }

            if ($newOrderItem->quantity <= 0) {
                $newOrderItem->delete();
            } else {
                $newOrderItem->save();
            }
        }

        $cart_items = CartItem::where('cart_id', $user_cart->id)->get();
        $user_cart->subtotal = 0;
        $user_cart->items = 0;

        foreach ($cart_items as $cart_item) {
            $product_price = Product::where('id', $cart_item->product_id)->first()->price;
            $user_cart->subtotal += $cart_item->quantity * $product_price;
            $user_cart->items += $cart_item->quantity;
        }
        $user_cart->save();

        if (OrderItem::where('order_id', $newOrder->id)->count() <= 0) {
            $newOrder->delete();
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

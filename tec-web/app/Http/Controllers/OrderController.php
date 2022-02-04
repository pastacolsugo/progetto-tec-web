<?php

namespace App\Http\Controllers;

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
        return view('newOrder');
    }

    public function showMyOrders()
    {
        return view('myOrders');
    }

    public function placeOrder(Request $request)
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();
        $items = CartItem::where('id', cart)->get();

        $newOrder = new Order;
        $newOrder->order_date = new DateTime();
        $newOrder->order_total = $cart->subtotal;
        $newOrder->order_status = "Pending";
        $newOrder->user_id = $user_id;
        $newOrder->ship_address = $request->address;
        $newOrder->save();

        foreach($items as $item)
        {
            checkSoldOut($item);
            $newOrderItem = new OrderItem;
            $newOrderItem->product_id = $item->product_id;
            $newOrderItem->order_id = $newOrder->id;
            $newOrderItem->quantity = $item->quantity;
            $newOrderItem->save();
        }
//TODO redirect to checkout route or thankyou route
//        return redirect()->route('');
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

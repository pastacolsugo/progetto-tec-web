<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return view('cart');
    }

    public function addProductToCart(Request $request)
    {
        if (!$request->has('productId') or !$request->has('quantity')) {
            return Response('Missing request parameters', 422);
        }
        $user_id = Auth::id();
        $productId = $request->productId;
        $quantity = $request->quantity;

        $newItem = new CartItem;
        $newItem->product_id = $request->productId;
        $newItem->cart_id = getCartId($user_id);
        $newItem->quantity = $request->quantity;
        $newItem->save();

        $body = "Successfully added n = $quantity, productId = $productId";
        $res = Response($body, 200);

        return $res;
    }

    public function emptyCart(Request $request) {
        if (Auth::id() == null) {
            return Response("User not logged in", 401);
        }
        $user_id = Auth::id();
        $cart_id = getCartId($user_id);
        CartItem::where('cart_id', $cart_id)->delete();
        return Response("Successfully emptied cart w/ cart_id = $cart_id", 200);
    }

    private function getCartId(int $user_id) {
        return CArt::where('user_id', $user_id)->select('id')->get()->first()->id;
    }
}

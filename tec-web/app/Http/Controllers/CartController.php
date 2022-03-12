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
    private function getCartId(int $user_id) {
        return Cart::where('user_id', $user_id)->select('id')->get()->first()->id;
    }

    private function getCartItems(int $cart_id) {
        return CartItem::where('cart_id', $cart_id)->select('product_id', 'quantity')->get();
    }

    private function getProductImageUrl(int $product_id) {
        return Product::where('id', $product_id)->select('gallery')->get()->first()->gallery;
    }

    private function getProductPrice(int $product_id) {
        return Product::where('id', $product_id)->select('price')->get()->first()->price;
    }

    private function getProductName(int $product_id) {
        return Product::where('id', $product_id)->select('name')->get()->first()->name;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        $user_id = Auth::id();
        $cart_id = $this->getCartId($user_id);
        $cart_items = $this->getCartItems($cart_id);
        foreach ($cart_items as $item) {
            $image_url = $this->getProductImageUrl($item->product_id);
            $price = $this->getProductPrice($item->product_id);
            $name = $this->getProductName($item->product_id);
            $item['image'] = $image_url;
            $item['price'] = $price;
            $item['name'] = $name;
        }
        return view('cart', ['cart_items' => $cart_items]);
    }

    public function addProductToCart(Request $request)
    {
        if (!$request->has('product_id') or !$request->has('quantity')) {
            return Response('Missing request parameters', 422);
        }
        $user_id = Auth::id();
        $product_id = $request->product_id;
        $cart_id = $this->getCartId($user_id);
        //need cart for update
        $cart = Cart::where('user_id', $user_id)->get()->first();

        $cartItem = CartItem::where('cart_id', $cart_id)->where('product_id', $product_id)->get()->first();

        if ($cartItem != null) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $newItem = new CartItem;
            $newItem->product_id = $product_id;
            $newItem->cart_id = $this->getCartId($user_id);
            $newItem->quantity = $request->quantity;
            $newItem->save();
        }
        //update cart subtotal and quantity
        $cart->items += $request->quantity;
        $cart->subtotal += ($this->getProductPrice($product_id)) * ($request->quantity);
        $cart->save();

        //removed response

        return redirect()->route('new-order');
    }

    public function emptyCart(Request $request) {
        if (Auth::id() == null) {
            return Response("User not logged in", 401);
        }
        $user_id = Auth::id();
        $cart_id = $this->getCartId($user_id);
        CartItem::where('cart_id', $cart_id)->delete();
        return Response("Successfully emptied cart w/ cart_id = $cart_id", 200);
    }

    public function removeProduct(Request $request) {
        if (Auth::id() == null) {
            return Response("User not logged in", 401);
        }
        if (!$request->has('product_id')) {
            return Response('Missing request parameters', 422);
        }

        $user_id = Auth::id();
        $cart_id = $this->getCartId($user_id);
        $product_id = $request->product_id;
        //need cart for update
        $cart = Cart::where('user_id', $user_id)->get()->first();

        $cartItem = CartItem::where('cart_id', $cart_id)->where('product_id', $product_id)->get()->first();

        if ($cartItem == null) {
            return Response("Item not found in user's cart.");
        }

        if ($request->has('quantity')) {
            $cartItem->quantity -= $request->quantity;
            $cartItem->save();
            //update cart subtotal and quantity
            $cart->items -= $request->quantity;
            $cart->subtotal -= ($this->getProductPrice($product_id)) * ($request->quantity);
        }

        if ($cartItem->quantity <= 0 or !$request->has('quantity')) {
            //update cart subtotal and quantity
            $cart->items -= $cartItem->quantity;
            $cart->subtotal -= ($this->getProductPrice($product_id)) * ($cartItem->quantity);
            $cartItem->delete();
        }
        
        $cart->save();

        //removed response

        return redirect()->route('new-order');
    }
}

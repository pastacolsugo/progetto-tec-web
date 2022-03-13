<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SellerListingController extends Controller
{
    public function __invoke(Request $request) {
        if (Auth::id() == null) {
            return Response("User not logged in", 401);
        }
        $seller_id = Auth::id();

        $products = Product::where('seller_id', $seller_id)->get();

        return view('sellerListing', ['products' => $products]);
    }
}

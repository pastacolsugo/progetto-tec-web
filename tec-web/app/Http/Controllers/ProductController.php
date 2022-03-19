<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduct(Request $req, $id)
    {
        $product = Product::where('id', $id)->get()->first();
        return view('product', ['product' => $product]);
    }

    public function showProducts(Request $req)
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }
}

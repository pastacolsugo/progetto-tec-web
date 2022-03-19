<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller {
    public function __invoke(){

        // choose some products and show them on the home page
        $products = Product::take(4)->get();
        return view('home', ['products' => $products]);
    }
}

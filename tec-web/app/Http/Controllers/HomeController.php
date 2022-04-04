<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller {
    public function __invoke(){

        // choose some products and show them on the home page
        $products = Product::all()->random(8);
        return view('home', ['products' => $products]);
    }
}

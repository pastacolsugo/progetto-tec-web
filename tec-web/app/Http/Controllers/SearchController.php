<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        $results = null;

        if($searchQuery = $request->get('searchQuery')){
            $results = Product::search($searchQuery)->get();
        }

        return view('search', ['results' => $results]);
    }
}
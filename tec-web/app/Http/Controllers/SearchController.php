<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        $results = null;

        if($query = $request->get('query')){
            $results = Product::search($query)->paginate(2);
        }

        return view('search', ['results' => $results]);
    }
}
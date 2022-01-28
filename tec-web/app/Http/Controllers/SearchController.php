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
           // $results = Product::search($query)->paginate(10);

            switch (request('sortBy')) {
                case 'ascendingPrice':
                    $results = Product::search($query)->get()->pluck('price');
                    $results= Product::whereIn('price',$results)->orderBy('price','asc')->paginate(10);
                    break;
                case 'descendingPrice':
                    $results = Product::search($query)->get()->pluck('price');
                    $results= Product::whereIn('price',$results)->orderBy('price','desc')->paginate(10);
                    break;
                default:
                    $results = Product::search($query)->paginate(10);;
                    break;
            }
        }

        return view('search', ['results' => $results]);
    }

}
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
           $results = Product::search($query)->paginate(12);
         
            switch (request('sortBy')) {
                case 'ascendingPrice':
                    $results = Product::search($query, function($meilisearch, $query, $options){
                        $options['sort'] = ['price:asc'];
                        return $meilisearch->search($query, $options);
                    })->paginate(12)->withQueryString();
                    break;
                case 'descendingPrice':
                    $results = Product::search($query, function($meilisearch, $query, $options){
                        $options['sort'] = ['price:desc'];
                        return $meilisearch->search($query, $options);
                    })->paginate(12)->withQueryString();
                    break;
                default:
                    break;
            }
        }

        return view('search', ['query' => $query, 'results' => $results]);
    }

}

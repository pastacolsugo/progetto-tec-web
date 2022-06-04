<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ImagesController extends Controller
{
    public function __invoke(Request $request, $id) {
        if ($id == null) {
            return Response('Image not found', 404);
        }

        $image = Product::where("id", $id)->first()->gallery;

        $response = Storage::response($image);
        $response->headers->set('Cache-Control', 'public, max-age=2628000');

        return $response;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class EditProductController extends Controller
{
    public function editProductForm(Request $request, $id) {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->get()->first();

        if ($product == null) {
            return null;
        }
        return view('editProduct', ['product' => $product]);
    }

    public function editProductRequest(Request $request) {
        $requiredFields = ['product_id'];

        foreach ($requiredFields as $field) {
            if (!$request->has($field)){
                // TODO: use correct http status code
                return Response("Error, missing $field", 401);
            }
        }

        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->where('seller_id', Auth::id())->get()->first();

        if ($product == null) {
            // TODO: use correct http status code
            return Response("Error, product $product_id not found", 401);
        }

        $updatableFields = [
            'name',
            'price',
            'stock',
            'description',
        ];

        foreach ($updatableFields as $field) {
            if ($request->has($field)) {
                $product->$field = $request->$field;
            }
        }

        if ($request->has('image_upload')) {
            $file = $request->file('image_upload')->store('images');
            $product->gallery = $file;
        }

        $product->save();

        return redirect()->route('sellerListing');
    }

    public function deleteProductRequest (Request $request, $id) {
        $userId = Auth::id();
        $product = Product::where('seller_id', $userId)->where('id', $id)->delete();

        return redirect()->route('sellerListing');
    }
}

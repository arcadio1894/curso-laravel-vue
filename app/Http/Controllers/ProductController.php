<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return $products;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        Product::create($request->all());

        return;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        Product::find($id)->update($request->all());

        return;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function getProductById($id){
        $product = Product::find($id);
        return $product;
    }
}

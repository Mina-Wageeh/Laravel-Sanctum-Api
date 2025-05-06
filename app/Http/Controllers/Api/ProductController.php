<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);
    }

    public function update(Request $request , $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $product->update($data);
    }

    public function delete($id)
    {
        $delete = Product::destroy($id);

        if($delete)
        {
            return "Deleted Successfully";
        }
    }

    public function search($name)
    {
        return Product::where('name' , 'like' , '%'.$name.'%')->get();
    }
}

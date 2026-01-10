<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:products,email',
            'phone' => 'required|integer',
            'description' => 'required',
        ]);
        $c = Product::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);
        if($c) {
            return redirect()->route('show');
        }

    }

    public function show(){
        $products = Product::all();
        return view('show', compact('products'));
    }

    public function edit($id){
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:products,email',
            'phone' => 'required|integer',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->email = $request->email;
        $product->phone = $request->phone;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('show');
    }

    public function productDelete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}

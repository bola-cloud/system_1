<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;


class ProductsController extends Controller
{
    public $search;
    public function index()
    {
        $products=Products::paginate(10);
        $filtered_products = Products::where("product_name",'LIKE','%'.$this->search.'%')->get();
        return view('products.index',compact('products','filtered_products'));        //where like---> search 
    }
    public function store(Request $request)
    {
        Products::create($request->all());
        session()->flash('success', 'product was added seccessfully');
        return redirect()->back();
    }
    public function update(Request $request , Products $products,$id)
    {  
        $products=Products::where("id",$id)->first();
        $data=$request->all();
        
        $products->update($data);
        session()->flash('success', 'product is updated seccessfully');
        return redirect()->back();
    }
    public function destroy(Products $products, $id)
    {
        $products = Products::find($id);
        $products->delete();
        session()->flash('danger', 'product is deleted seccessfully');
        return redirect()->back();
    }
}

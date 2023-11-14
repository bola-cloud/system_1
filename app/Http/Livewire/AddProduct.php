<?php

namespace App\Http\Livewire;
use App\Products;
use App\Category;
use Livewire\Component;

class AddProduct extends Component
{
    public $product_name;
    public $product_id;
    public $description;
    public $price;
    public $cost;
    public $sale;
    public $sale_price;
    public $quantity_inshop;
    public $quantity_total;
    public $brand;
    public $product_code;
    public $category_id;

    public function render()
    {
        $categories=Category::all();
        return view('livewire.add-product',['categories'=>$categories])->layout('layouts.bars.navbar');
    }
    public function store()
    {
        $this->validate([
            'product_name'=> 'required|min:4',
            'description'=>'required',
            'price'=>'required|numeric',
            'cost'=>'required|numeric',
            'sale'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'quantity_inshop'=>'required|numeric',
            'quantity_total'=>'required|numeric',
            'brand'=>'required',
            'product_code'=>'required',
        ]);
        $products=new Products();
        $products->product_name=$this->product_name;
        $products->description=$this->description;
        $products->price=$this->price;
        $products->cost=$this->cost;
        $products->sale=$this->sale;
        $products->sale_price=$this->sale_price;
        $products->quantity_inshop=$this->quantity_inshop;
        $products->quantity_total=$this->quantity_total;
        $products->brand=$this->brand;
        $products->product_code=$this->product_code;
        $products->category_id=$this->category_id;
        $products->save();
        session()->flash('success', 'product was added seccessfully');
        return redirect()->route('products');;
    }

}

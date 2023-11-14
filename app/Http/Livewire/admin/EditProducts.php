<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Products;
use App\Category;

class EditProducts extends Component
{
    public $product_name;
    public $product_id;
    public $description;
    public $price;
    public $cost;
    public $quantity_inshop;
    public $quantity_total;
    public $brand;
    public $product_code;
    public $category_id;
    public $status;


    public function mount($prod_id)
    {
        $product=Products::find($prod_id);
        $this->product_name=$product->product_name;
        $this->product_id=$product->id;
        $this->description=$product->description;
        $this->price=$product->price;
        $this->cost=$product->cost;
        $this->quantity_inshop=$product->quantity_inshop;
        $this->quantity_total=$product->quantity_total;
        $this->brand=$product->brand;
        $this->product_code=$product->product_code;
        $this->category_id=$product->category_id;
        $this->status=$product->status;
        $category=Category::find($this->category_id);
        // dd($product);
    }

    protected $rules = [
        'product_name'=> 'required|min:4',
        'description'=>'required|min:4',
        'price'=>'required|numeric',
        'cost'=>'required|numeric',
        'quantity_inshop'=>'required|numeric',
        'quantity_total'=>'required|numeric',
        'brand'=>'required',
        'product_code'=>'required|min:4|unique',
        'category_id'=>'required',
    ];

    public function updateProd()
    {
        $this->validate();
        Products::where('id',$this->product_id)->update([
            'product_name'=>$this->product_name,
            'description'=>$this->description,
            'price'=>$this->price,
            'cost'=>$this->cost,
            'sale'=>$this->sale,
            'sale_price'=>$this->sale_price,
            'quantity_inshop'=>$this->quantity_inshop,
            'quantity_total'=>$this->quantity_total,
            'brand'=>$this->brand,
            'product_code'=>$this->product_code,
            'category_id'=>$this->category_id,
        ]);
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.edit-products',['categories'=>$categories])->layout('layouts.bars.navbar');
    }
}

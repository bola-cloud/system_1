<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Products;
use App\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    public $search;
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


    use WithPagination;

    public function render()
    {
        
        $categories=Category::all();
        $products=Products::where('product_name', 'like', '%'.$this->search.'%')->paginate(15);
        return view('livewire.product-component' ,compact('products','products'),['categories'=>$categories])->layout('layouts.bars.navbar');
    }

    public function store(Request $request)
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

    public function update()
    {  
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
        session()->flash('success', 'product is updated seccessfully');
        return redirect()->route('products');
    }

    public function edit(int $product_id)
    {
        $products = Products::find($product_id);
        if($product_id){
            $this->product_id=$products->id ;
            $this->product_name = $products->product_name;
            $this->description = $products->description;
            $this->price = $products->price;
            $this->cost = $products->cost;
            $this->sale = $products->sale;
            $this->sale_price = $products->sale_price;
            $this->quantity_inshop = $products->quantity_inshop;
            $this->quantity_total = $products->quantity_total;
            $this->brand = $products->brand;
            $this->product_code = $products->product_code;

        }else{
            return redirect()->route('products');
        }
    }

    public function delete(int $product_id)
    {
        $this->product_id=$product_id;
    }

    public function destroy()
    {
        Products::find($this->product_id)->delete();
        session()->flash('danger', 'product is deleted seccessfully');
        return redirect()->route('products');
    }
}

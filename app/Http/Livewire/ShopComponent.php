<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use cart;
use App\Products;
use App\Category;
use Illuminate\Support\Facades\Auth;



class ShopComponent extends Component
{
    public $category;
    public function store($product_id,$product_name,$product_price)
    {
        cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('success_message','item added to cart');
        return view('livewire.shop-component');  
    }
    public function orders()
    {
        
    }
    use WithPagination;
    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    public function render()
    {
        $products=Products::paginate(10);
        $categories=Category::all();
        return view('livewire.shop-component',['products'=>$products ,'categories'=> $categories])->layout('layouts.bars.navbar');
    }
    public function increaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty +1 ;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty - 1 ;
        Cart::update($rowId,$qty);
    }
    
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success message','Item has been removed');
    }
    public function destroyAll()
    {
        Cart::destroy();
    }
}

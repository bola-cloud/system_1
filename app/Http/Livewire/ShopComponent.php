<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Products;
use App\Category;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Session;
 


class ShopComponent extends Component
{
    public $search;
    public $product_id;
    public $product_name;
    public $product_price;
    public $quantity;
    public $category_id;
    public $prod_quantity;
    public $flag;
    public $flag2;


    public function store($product_id,$product_name,$product_price,$quantity)
    {
        $this->flag2=0;
        $this->product_id=$product_id;
        $this->product_name=$product_name;
        $this->product_price=$product_price;
        $this->quantity=$quantity;
        Cart::instance('cart');
        if(!Cart::instance('cart')->count()>0 && !$this->quantity <1)
        {
            Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Products');
            session()->flash('success_message','item added to cart');
            return view('livewire.shop-component');  
        }
        elseif(Cart::instance('cart')->count()>0)
        {
            $items=Cart::instance('cart')->content(); 
            foreach( $items as  $item)
            {
                if($this->product_id == $item->id && $this->quantity > 0 && $this->quantity >$item->qty )
                {
                    $item->qty +=1;
                    $this->flag2=1;
                }      
            }
            if($this->flag2==0 && $this->quantity > 0 && $this->quantity >$item->qty)
            {
                Cart::instance('cart')->add(
                    ['id' => $this->product_id, 'name' =>$this->product_name,
                    'qty' => 1, 'price' => $this->product_price]
                )->associate('App\Products');
                session()->flash('success_message','item added to cart');
                $this->flag=0;
            }
            $this->flag2=0;   
        }
        $this->product_id=null;
        $this->product_name=null;
        $this->product_price=null;
        $this->quantity=null;
        
    }
    use WithPagination;
    public function checkout()
    {
        if(Auth::check())
        {
           $product=[
            'discount'=>0,
            'tax'=>Cart::instance('cart')->tax(),
            'subtotal'=>Cart::instance('cart')->subtotal(),
            'total'=>Cart::instance('cart')->total(),
           ];
           Session::push('checkout',$product);
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    public function render()
    {
        $categories=Category::all();
        if($this->category_id!= null)
        {  
            $products=Products::where('product_name', 'like', '%'.$this->search.'%')
                                ->where('category_id',$this->category_id)
                                ->paginate(10);
        }
        else
        {
            $products=Products::where('product_name', 'like', '%'.$this->search.'%')->paginate(10);
        }                  
        return view('livewire.shop-component',['products'=>$products ,'categories'=> $categories])->layout('layouts.bars.navbar');
    }

    public function increaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $prod=Products::find($product->id);
        if($product->qty <  $prod->quantity_total)
        {
            $qty=$product->qty +1 ;
            Cart::instance('cart')->update($rowId,$qty);
        }
        else
        {
            session()->flash('warning','quantity isnt enough');
        }
    }
    public function decreaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty - 1 ;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success message','Item has been removed');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
    }
}

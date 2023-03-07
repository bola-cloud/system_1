<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Products;
use App\Category;
use App\OrderItems;
use App\Orders;
use Cart;
use Livewire\WithPagination;
use Session;

class EditOrder extends Component
{
    public $search;
    public $product_id;
    public $product_name;
    public $product_price;
    public $quantity;
    public $category_id;
    public $prod_quantity;
    public $orderItem;
    public $order_id;
    public $flag;
    public $flag2;


    public function mount($order_id)
    {
        $this->order_id=$order_id;
        $orderItem=OrderItems::where('order_id',$order_id)->with('products')->get();
        $this->orderItem=$orderItem;
        Cart::instance('cart')->destroy();
        foreach($orderItem as $items)
        {
            foreach($items->products as $products)
            {
                $added=Cart::instance('cart')->add($products->id,$products->product_name,$items->quantity,$products->price)->associate('App\Products');
                $added2=Cart::instance('cart2')->add($products->id,$products->product_name,$items->quantity,$products->price)->associate('App\Products');
            }
        }
    }

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
            else{
                session()->flash('warning','out of stock');
            }
            $this->flag2=0;
        }
        $this->product_id=null;
        $this->product_name=null;
        $this->product_price=null;
        $this->quantity=null;
    }
    use WithPagination;

    public function edit()
    {
        if(Auth::check())
        {          
            if(!Cart::instance('cart')->count()>0)
            {
                session()->flash('warning','cart is empty');
            }
            elseif(Cart::instance('cart')->count()>0)
            {
                $arr1=Cart::instance('cart')->content();
                $arr2=Cart::instance('cart2')->content();
                $diff= $arr1->diffKeys($arr2)->all();
                $diff2= $arr2->diffKeys($arr1)->all();
                if(!$diff && !$diff2)
                {
                    foreach(Cart::instance('cart')->content() as $edited_items)
                    {   
                        foreach($this->orderItem as $items)
                        {
                            if($items->product_id == $edited_items->id)
                            {
                                if($items->quantity != $edited_items->qty)
                                {                               
                                    $target_item=OrderItems::find($items->id);
                                    $target_item->quantity =$edited_items->qty;
                                    $target_item->save();
                                }
                                elseif($items->quantity == $edited_items->qty)
                                {
                                    continue;
                                }
                            }                         
                        }                     
                    }
                }
                elseif($diff)
                {
                    foreach($diff as $items)
                    {
                        $product=Products::find($items->id);
                        $quant=$product->quantity_inshop - $items->qty ;
                        $product->quantity_inshop =$quant;
                        $product->save();
                        $orderItem= new OrderItems();
                        $orderItem->product_id=$items->id;
                        $orderItem->price=$items->price;
                        $orderItem->order_id=$this->order_id;
                        $orderItem->quantity=$items->qty;
                        $orderItem->save();
                        $findProducts=Products::find($items->id);
                        $findProducts->orderItems()->attach([
                            $orderItem->id =>[
                                'created_at'=>now()
                            ]
                        ]);
                    }                   
                    
                   
                }
                elseif($diff2)
                {
                    foreach($diff2 as $target)
                    {
                        $items=OrderItems::where('order_id',$this->order_id)->where('product_id',$target->id)->delete();
                    }
                }

            }
            $order=Orders::find($this->order_id);
            $subtotal=Cart::instance('cart')->subtotal();
            $total=Cart::instance('cart')->total();
            $intsubtotal=(float)str_replace(',', '', $subtotal);
            $inttotal=(float)str_replace(',', '', $total);
            $order->subtotal=$intsubtotal;
            $order->total=$inttotal;
            $order->save();
            Cart::instance('cart')->destroy();
            session()->flash('success','order is updated');
            return redirect()->route('admin_orders');
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
        return view('livewire.admin.edit-order',['products'=>$products ,'categories'=> $categories])->layout('layouts.bars.navbar');
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

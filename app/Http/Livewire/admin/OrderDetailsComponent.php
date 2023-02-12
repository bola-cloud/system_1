<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Orders;  
use App\OrderItems;       
use App\Products;  
use App\OrderProduct;


class OrderDetailsComponent extends Component
{
    public $newId;
    public $cust_name;
    public $phone;
    public $addres;
    public $user_name;
    public $subtotal;
    public $total;
    public $discound;
    public $delivery;


    public function mount($id)
    {
        $target_order=Orders::find($id);
        $this->newId=$target_order->id;
        $this->cust_name=$target_order->cust_name;
        $this->phone=$target_order->phone;
        $this->addres=$target_order->addres;
        $this->user_name=$target_order->user->name;
        $this->subtotal=$target_order->subtotal;
        $this->total=$target_order->total;
        $this->discound=$target_order->discound;
        $this->delivery=$target_order->delivery;
        

    }

    public function updateOrder()
    {
        $target_order=Orders::find($this->newId);
        $target_order->cust_name=$this->cust_name;
        $target_order->phone=$this->phone;
        $target_order->address=$this->addres;
        $target_order->user->name=$this->user_name;
        $target_order->subtotal=$this->subtotal;
        $target_order->total=$this->total;
        $target_order->discount=$this->discound;
        $target_order->delivery=$this->delivery;
        $target_order->save();
    }

    public function render()
    {
       
        $target_order=Orders::where('id',$this->newId)->get();
        $orderItem=OrderItems::where('order_id',$this->newId)->with('products')->get();
        return view('livewire.admin.order-details-component',[
            'target_order'=>$target_order,
            'orderItem'=>$orderItem,
            // 'products'=>$products
        ])->layout('layouts.admin-layouts.dashboard');
    }
}

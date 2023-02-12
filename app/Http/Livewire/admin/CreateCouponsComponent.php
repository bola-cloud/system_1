<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Coupon;

class CreateCouponsComponent extends Component
{
    public $code; 
    public $type; 
    public $value; 
    public $cart_value; 

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'=> 'required|min:4|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
        ]);
    }

    public function storeCoupon()
    {
        $this->validate([
            'code'=> 'required|min:4|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
        ]);
        $coupons= new Coupon();
        $coupons->code=$this->code;
        $coupons->type=$this->type;
        $coupons->value=$this->value;
        $coupons->cart_value=$this->cart_value;
        $coupons->save();
        $this->code=null;
        $this->code=null;
        $this->value=null;
        $this->cart_value=null;
        session()->flash('message','Coupon created');
    }
    public function render()
    {
        return view('livewire.admin.create-coupons-component')->layout('layouts.admin-layouts.dashboard');
    }
}

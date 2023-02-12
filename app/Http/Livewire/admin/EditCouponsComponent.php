<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Coupon;

class EditCouponsComponent extends Component
{
    public $code; 
    public $type; 
    public $value; 
    public $cart_value; 
    public $coupon_id;

    
    public function mount($coupon_id)
    {
        $coupons=Coupon::find($coupon_id);
        $this->coupon_id=$coupons->id;
        $this->code=$coupons->code;
        $this->type=$coupons->type;
        $this->value=$coupons->value;
        $this->cart_value=$coupons->cart_value;
    }

    public function updated($fields)    
    {
        $this->validateOnly($fields,[
            'code'=> 'required|min:4|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([
            'code'=> 'required|min:4|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
        ]);
        $coupons=Coupon::find($this->coupon_id);
        $coupons->code=$this->code;
        $coupons->type=$this->type;
        $coupons->value=$this->value;
        $coupons->cart_value=$this->cart_value;
        $coupons->save();
        session()->flash('message','Coupon updated');
    }
    public function render()
    {
        return view('livewire.admin.edit-coupons-component')->layout('layouts.admin-layouts.dashboard');
    }
}

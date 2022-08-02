<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public $Phone_number;
    public $first_name;
    public $Address;
    public $shipping_fee;

    public function placeOrder()
    {
        $this->validate([
            'first_name' => 'required|min:4|string',
            'Phone_number' => 'required|numeric'
        ]);
    }

    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.bars.navbar');
    }
}

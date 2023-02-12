<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DeleteCoupon extends Component
{
    public $coupon_id;
    public function render()
    {
        return view('livewire.admin.delete-coupon')->layout('layouts.admin-layouts.dashboard');
    }
    public function delete(int $coupon_id)
    {
        $this->coupon_id=$coupon_id;
    }
    public function destroy()
    {  
        Coupon::find($this->coupon_id)->delete();
        session()->flash('danger','coupon has deleted');
        return redirect()->route('show_coupon');
    }
}

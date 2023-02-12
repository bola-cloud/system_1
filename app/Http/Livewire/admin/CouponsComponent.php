<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Coupon;
use Livewire\WithPagination;


class CouponsComponent extends Component
{
    public $coupon_id;
    public $search ;

    use WithPagination;
    public function render()
    {
        $coupons=Coupon::where('code', 'like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.admin.coupons-component',['coupons'=>$coupons])->layout('layouts.admin-layouts.dashboard');
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

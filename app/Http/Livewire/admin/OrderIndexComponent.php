<?php

namespace App\Http\Livewire\Admin;
use Illuminate\Support\Arr;
use Livewire\Component;
use App\Orders;
use App\OrderItems;
use App\OrderProduct;
use Livewire\WithPagination;
 

class OrderIndexComponent extends Component
{
    public $search;
    public $startDate;
    public $endDate;
    public $order_id;


    use WithPagination;
    public function render()
    {

       if($this->startDate !=null|| $this->endDate!=null)
       {
            $orders=Orders::where('cust_name', 'like', '%'.$this->search.'%')
                            ->whereBetween('created_at',[$this->startDate, $this->endDate])
                            ->paginate(10);
        }
        else
        {
            $orders=Orders::where('cust_name', 'like', '%'.$this->search.'%')->paginate(10);
        }
        return view('livewire.admin.order-index-component',['orders'=>$orders])->layout('layouts.admin-layouts.dashboard');
    }
    public function delete($order_id)
    {
        $this->order_id=$order_id;
    }
    public function destroy()
    {
        $order=Orders::find($this->order_id);
        $order->delete();
        $items=OrderItems::where('order_id',$this->order_id)->get()->toArray();
        $itemDeleted=OrderItems::where('order_id',$this->order_id)->delete();
        $itemId=data_get($items, '*.id');
        foreach($itemId as $items)
        {
            $pivot_table=OrderProduct::where('order_item_id',$items)->delete();
        }
        session()->flash('message','order has delered');
        return redirect()->route('admin_orders');
    }
}

<?php

namespace App\Http\Livewire\admin;

use Livewire\Component;
use App\Orders;
use App\OrderItems;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardComponent extends Component
{
    public $startDate;
    public $endDate;

    
    public $chartData;

    public function mount()
    {
        $this->refreshChart();
    }

    public function refreshChart()
    {
        $data = OrderItems::selectRaw('DATE(created_at) as date, SUM(quantity) as total_quantity')
            ->groupBy('date')
            ->pluck('total_quantity', 'date');

        $this->chartData = collect([]);

        foreach ($data as $date => $quantity) {
            $this->chartData->push([
                'date' => $date,
                'quantity' => $quantity,
            ]);
        }

        $this->emit('chartDataUpdated', $this->chartData->toArray());
    }

    
    public function render()
    {  
        // dd($this->chartData);    
        $orders=Orders::count();
        $total=Orders::sum('total');
        $prod_sold=OrderItems::sum('quantity');
        // $data = DB::table('order_items')
        //             ->select(DB::raw('COUNT(*) as count'), 'quantity')
        //             ->groupBy('created_at')
        //             ->get();
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'total'=>$total,
            'prod_sold'=>$prod_sold,
        ])->layout('layouts.admin-layouts.dashboard');
    }


}

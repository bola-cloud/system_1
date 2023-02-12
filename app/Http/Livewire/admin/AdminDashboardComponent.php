<?php

namespace App\Http\Livewire\admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.admin-layouts.dashboard');
    }
}

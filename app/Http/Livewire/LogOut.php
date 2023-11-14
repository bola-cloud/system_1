<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LogOut extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    
    public function render()
    {
        return view('livewire.log-out');
    }
}

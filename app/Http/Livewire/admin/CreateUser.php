<?php

namespace App\Http\Livewire\Admin;
use App\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CreateUser extends Component
{
    public $name;
    public $phone;
    public $category;
    public $user_id;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.admin.create-user')->layout('layouts.admin-layouts.dashboard');
    }

    public function store()
    {
        $this->validate([
            'name'=>'required|min:3',
            'phone' => 'required|min:10',
            'category' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password,The confirmation password does not match.',
        ]);
        $users=new User();
        $users->name =$this->name;
        $users->phone =$this->phone;
        $users->category =$this->category;
        $users->category =$this->category;
        $users->password = Hash::make($this->password);
        $users->save();
        session()->flash('message','user has created');
        return redirect()->route('admin_user');
    }
}

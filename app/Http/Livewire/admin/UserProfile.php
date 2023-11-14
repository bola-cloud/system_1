<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;
use App\Orders;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{
    public $name;
    public $phone;
    public $category;
    public $password;
    public $old_password;
    public $new_password;
    public $password_confirmation;
    public $Total_orders;  
    public $Total_income;
    public $Last_login;


    public function mount($user_id)
    {
        $user=User::find($user_id);
        $this->user_id= $user->id;
        $this->name=$user->name;
        $this->phone=$user->phone;
        $this->category=$user->category;
        $this->password=$user->password;
        $this->Last_login=$user->last_login_at;
        $this->Total_orders=Orders::where('user_id',$this->user_id)->count();
        $this->Total_income=Orders::where('user_id',$this->user_id)->sum('total');
    }
    public function update()
    {
        $user=User::find($this->user_id);
        $this->validate([
            'name'=>'required|min:3',
            'phone' => 'required|min:10',
            'category' => 'required',
        ]);
        if($this->new_password||$this->old_password )
        {
            if(Hash::check($this->old_password, $this->password))
            {
                $this->validate([
                    'old_password'=>'required|min:8',
                    'new_password' => 'required|min:8',
                    'password_confirmation' => 'required|same:new_password,The confirmation password does not match.',
                ]);
                $user->password=Hash::make($this->new_password);
                $user->name=$this->name;
                $user->phone=$this->phone;
                $user->category=$this->category;
                $user->save();
                session()->flash('message','User updated');
            }
            else{
                session()->flash('warning','old password is wrong');
            }
            
        }
        else
        {
            $user->name=$this->name;
            $user->phone=$this->phone;
            $user->category=$this->category;
            $user->save();
            session()->flash('message','User updated');
        }    
        
    }
    public function render()
    {
        return view('livewire.admin.user-profile',[
            'Total_orders'=>$this->Total_orders,
            'Total_orders'=>$this->Total_income,
        ])->layout('layouts.admin-layouts.dashboard');
    }
    
}

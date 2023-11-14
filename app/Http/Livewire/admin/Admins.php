<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;
use App\Orders;
class Admins extends Component
{
    public $name;
    public $phone;
    public $category;
    public $user_id;
    public $password;
    public $password_confirmation;
    public $search;

    public function render()
    {
        $admins=User::where('category','admin')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.admins',['admins' =>$admins])->layout('layouts.admin-layouts.dashboard');
    }
    
    public function edit(int $user_id)
    {
        $target_user = User::find($user_id);
        if($user_id){
            $this->user_id=$target_user->id ;
            $this->name = $target_user->name;
            $this->phone=$target_user->phone;
            $this->category=$target_user->category;
        }else{
            return redirect()->route('admin_user');
        }
    }
    public function update()
    {
        User::where('id',$this->user_id)->update([
            'name'=>$this->name,
            'category'=>$this->category,

        ]);
        session()->flash('message','category has updated');
        return redirect()->route('admin_user');
    }
    public function delete(int $user_id)
    {
        $this->user_id=$user_id;
    }
    public function destroy()
    {
        User::find($this->user_id)->delete();
        session()->flash('message','category has deleted');
        return redirect()->route('admin_user');
    }
}

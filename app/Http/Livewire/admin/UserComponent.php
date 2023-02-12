<?php

namespace App\Http\Livewire\Admin;
use App\User;
use App\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;


class UserComponent extends Component
{
    public $name;
    public $phone;
    public $category;
    public $user_id;
    public $search='';

    use WithPagination;
    
    public function render()
    {
        $users=User::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        
        return view('livewire.admin.user-component',['users' =>$users])->layout('layouts.admin-layouts.dashboard');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function store()
    {
        $users=new User();
        $users->name =$this->name;
        $users->phone =$this->phone;
        $users->category =$this->category;
        $users->save();
        session()->flash('message','user has created');
        return redirect()->route('admin_user');
    }
    public function edit(int $user_id)
    {
        $target_user = User::find($user_id);
        if($user_id){
            $this->user_id=$target_user->id ;
            $this->name = $target_user->name;
        }else{
            return redirect()->route('admin_user');
        }
    }
    public function update()
    {
        User::where('id',$this->user_id)->update([
            'name'=>$this->name
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

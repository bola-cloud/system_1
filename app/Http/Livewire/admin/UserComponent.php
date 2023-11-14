<?php

namespace App\Http\Livewire\Admin;
use App\User;
use App\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserComponent extends Component
{
    public $name;
    public $phone;
    public $category;
    public $user_id;
    public $password;
    public $password_confirmation;
    public $search;

    use WithPagination;

    public function render()
    {
        $users=User::where('category','user')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.user-component',['users' =>$users])->layout('layouts.admin-layouts.dashboard');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
  
    // protected $rules = [
    //     'name'=>'required|min:4',
    //     'phone' => 'required|min:10',
    //     'category' => 'required',
    //     'password' => 'min:8',
    // ];
    
    
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
    // public function updated($fields)
    // {
    //     $this->validateOnly($fields,[
    //         'name'=>'required|min:4',
    //         'phone' => 'required|min:10',
    //         'category' => 'required',
    //         'password' => 'min:8',
    //     ]);
    // }
    public function update()
    {
        $this->validate([
            'name'=>'required|min:4',
            'phone' => 'required|min:10',
            'category' => 'required',
            'password' => 'min:8',
        ]);
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

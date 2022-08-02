<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users= User::paginate(4);
        return view('admin.cashers',compact('users'));
    }
    public function store(Request $request)
    {
        $users= User::create($request->all());
        $users->name=$request->name;
        $users->phone=$request->phone;
        $users->password=md5($request->name);
        $users->category=$request->category;
        $users->save();
        $request->validate([
            'name' => 'required|max:15',
            'phone' => 'required|min:11',
            'password'=>'required|confirmed',
        ]); 
        if($users){
            return redirect()->back()->with('User created');
        }
        return redirect()->back()->with('User isnot created');
    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if(isset($data['password'])){
            $data['password']=bcrypt($data['password']);
        }
        $users=User::find($id);
        if(!$users){
            return back()->with('error','user not found');
        }
        $users->update($request->all());
        return back()->with('success','user updated');
    }

    public function destroy($id)
    {
        $users=User::find($id);
        if(!$users){
            return back()->with('error','user not found');
        }
        $users->delete();
        return back()->with('success','user updated');
    }

}


// $products=Products::paginate(10);
// $products=Products::where("category",'hp')->get();
// $products=Products::where("category",'LIKE','%'.$this->search.'%')->get();
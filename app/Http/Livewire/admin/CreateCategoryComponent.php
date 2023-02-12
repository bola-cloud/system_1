<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Category;

class CreateCategoryComponent extends Component
{
    public $name ;

    public function render()
    {
        return view('livewire.admin.create-category-component')->layout('layouts.admin-layouts.dashboard');
    }
    public function store()
    {
        $categories=new Category();
        $categories->category_name =$this->name;
        $categories->save();
        session()->flash('message','category has created');
        return redirect()->route('admin_category');
    }
    
}

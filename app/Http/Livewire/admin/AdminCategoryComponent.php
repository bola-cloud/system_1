<?php
namespace App\Http\Livewire\Admin;

use App\Products;
use Livewire\WithPagination;
use App\Category;
use Livewire\Component;
use Illuminate\Http\Request;


class AdminCategoryComponent extends Component
{
    public $name;
    public $search = '';
    public $category_id;
    use WithPagination;
    
    public function render()
    {
        $categories=Category::where('category_name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.admin-layouts.dashboard');
    }

   
    public function edit(int $category_id)
    {
        $target_category = Category::find($category_id);
        if($category_id){
            $this->category_id=$target_category->id ;
            $this->name = $target_category->category_name;
        }else{
            return redirect()->route('admin_category');
        }
    }
    public function update()
    {
        Category::where('id',$this->category_id)->update([
            'category_name'=>$this->name
        ]);
        Products::update([
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','category has updated');
        return redirect()->route('admin_category');
    }
    
    public function delete(int $category_id)
    {
        $this->category_id=$category_id;
    }
    public function destroy()
    {
        Category::find($this->category_id)->delete();
        session()->flash('message','category has deleted');
        return redirect()->route('admin_category');
    }
}

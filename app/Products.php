<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['product_name', 'quantity_total',
    'description','quantity_inshop','category_id','brand'
    ,'price','cost','sale_price','sale','product_code'];

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function orderItems()
    {
        return $this->belongsToMany(OrderItems::class, 'order_products','product_id','order_item_id');
    }
   
}

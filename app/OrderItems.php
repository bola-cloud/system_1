<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderItems extends Model
{
    use HasFactory;

    protected $fillable= ['order_id','product_id','price','quantity'];
    
    public function order()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }
    public function products()
    {
        return $this->belongsToMany(Products::class,'order_products','order_item_id','product_id');
    }

}

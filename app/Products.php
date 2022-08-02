<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['product_name', 'quantity_total',
    'description','quantity_inshop','category_id','brand'
    ,'price','cost','sale_price','sale','product_code'];
    
    public function products_main () {
        return $this->hasMany(Products_main::class, 'category_id');
    }
}

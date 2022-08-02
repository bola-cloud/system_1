<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_damaged extends Model
{
    
    protected $fillable = ['product_id', 'quantity_damaged','category_id'];

    // public function category () {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
    // public function products_inshop () {
    //     return $this->belongsTo(Products_inshop::class, 'product_id');
    // }
}

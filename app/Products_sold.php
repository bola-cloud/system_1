<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_sold extends Model
{
    protected $fillable = ['product_id', 'client_id', 'quantity_sold',
    'total_cost','net_price','category_id'];

    // public function total_returns () {
    //     return $this->belongsTo(Clients::class, 'product_bought');
    // }
    // public function product_sold () {
    //     return $this->belongsToMany(Products_inshop::class, 'product_id');
    // }
    // public function category () {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
}


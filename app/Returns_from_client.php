<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returns_from_client extends Model
{
    protected $fillable = ['product_id', 'client_id', 'quantity',
    'total_cost','net_price','category_id'];

    // public function category () {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
    // public function total_returns () {
    //     return $this->belongsTo(Products_main::class, 'product_id');
    // }
}

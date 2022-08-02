<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_price', 'category_type'];

    // public function products_main () {
    //     return $this->hasMany(Products_main::class, 'category_id');
    // }

    // public function products_instore () {
    //     return $this->hasMany(Products_instore::class, 'category_id');
    // }

    // public function products_inshop () {
    //     return $this->hasMany(Products_inshop::class, 'category_id');
    // }

    // public function products_sold () {
    //     return $this->hasMany(Products_sold::class, 'category_id');
    // }

    // public function products_damaged () {
    //     return $this->hasMany(Products_damaged::class, 'category_id');
    // }
    // public function returns_from_client () {
    //     return $this->hasMany(Returns_from_client::class, 'category_id');
    // }
    // public function total_returns () {
    //     return $this->hasMany(Total_returns::class, 'category_id');
    // }
}

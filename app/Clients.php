<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['client_name', 'client_phone','product_bought'];

    // public function products_sold () {
    //     return $this->hasMany(Products_sold::class, 'client_id');
    // }
    // public function returns_from_client () {
    //     return $this->hasMany(Returns_from_client::class, 'client_id');
    // }
    // public function client_invoice () {
    //     return $this->hasMany(Client_invoice::class, 'client_id');
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_invoice extends Model
{
    protected $fillable = ['client_id', 'total_price','total_paid','total_remain','product_sold_id','date'];

    // public function returns_from_client () {
    //     return $this->belongsTo(Clients::class, 'client_id');
    // }  
    // public function product_sold () {
    //     return $this->belongsTo(Products_sold::class, 'product_sold_id');
    // }  
}

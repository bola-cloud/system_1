<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total_returns extends Model
{
    protected $fillable = ['product_id', 'quantity',
    'total_cost','net_price','category_id'];

    // public function total_returns () {
    //     return $this->belongsTo(Product_inshop::class, 'product_id');
    // }
    // public function category () {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
}

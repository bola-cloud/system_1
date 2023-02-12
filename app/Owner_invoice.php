<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner_invoice extends Model
{
    protected $fillable = ['total_unpaid', 'total_price','total_paid',
    'total_remain','total_cost','profit'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table='transactions';

    public function order()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable= ['user_id','cust_name','phone',
    'subtotal','discount','delivery','total','address','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class,'order_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transactions::class,'order_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'order_code',

        'customer_name',

        'table_number',

        'notes',

        'payment_method',

        'subtotal',

        'service_fee',

        'total',

        'status'

    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
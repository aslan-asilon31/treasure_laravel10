<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_code',
        'name',
        'price',
        'quantity',
        'amount',
        'total_price',
        'payment_method',
        'slug',
    ];

}

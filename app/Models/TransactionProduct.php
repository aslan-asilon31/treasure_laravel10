<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'prod_name',
        'prod_code',
        'prod_price',
        'prod_amount',
        'prod_images',
        'total_price',
        'slug',
    ];
}

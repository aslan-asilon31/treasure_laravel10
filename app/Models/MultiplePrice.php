<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiplePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'discount',
        'total_price',
        'slug',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

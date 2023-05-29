<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sold',
        'shipping',
        'size',
        'rating',
        'wishlist',
        'description',
        'slug',
        
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

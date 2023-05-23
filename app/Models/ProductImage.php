<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
        'title',
        'description',
        'slug',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

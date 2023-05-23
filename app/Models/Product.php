<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $table = 'products';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'price',
        'size',
        'color',
        'status',
        'description',
        
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }
}

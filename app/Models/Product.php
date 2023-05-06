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
        'product_description',
        'price',
        'available_sizes',
        'color_options',
        'image_url',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

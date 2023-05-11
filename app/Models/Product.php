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
        'price',
        // 'size',
        // 'color',
        // 'status',
        'description',
        'image',
        
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    
    protected $table = 'galleries';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'image',
        'title',
        'description',
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

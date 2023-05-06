<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    
    protected $table = 'reviews';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'rating',
        'comments',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

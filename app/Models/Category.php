<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'retro_model',
        'collaboration',
        'limited_edition',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

    public function categorydetails()
    {
        return $this->hasMany(CategoryDetail::class);
    }
}

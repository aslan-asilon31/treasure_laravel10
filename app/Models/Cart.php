<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    
    protected $table = 'carts';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'quantity',
        'total_cost',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

}

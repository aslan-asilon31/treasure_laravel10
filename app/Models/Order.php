<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $table = 'orders';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'number',
        'total_price',
        'payment_status',
        'snap_token',
        'slug',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

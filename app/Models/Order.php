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
        'order_number',
        'customer_name',
        'order_date',
        'shipping_address',
        'order_status',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

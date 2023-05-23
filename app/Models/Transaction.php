<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    
    protected $table = 'transactions';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'prod_transactions_id',
        'barcode',
        'invoice_code',
        'cust_name',
        'cust_email',
        'cust_phone',
        'cust_address',
        'cust_type',
        'total_price',
        'payment_method',
        'slug',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

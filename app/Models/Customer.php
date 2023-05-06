<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'shipping_address',
        'billing_address',
        'billing_card_number',
        'billing_card_exp_month',
        'billing_card_exp_year',
        'billing_card_cvv',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

}

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
        'amount',
        'payment',
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiplePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'price',
        'qty',
        'discount',
        'slug',
    ];
}

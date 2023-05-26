<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'category_id',
        'customer_id',
        'order_id',
        'product_id',
        'review_id',
        'transaction_id',
        'gallery_id',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

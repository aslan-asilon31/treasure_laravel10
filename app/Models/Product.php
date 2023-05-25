<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use LogsActivity;
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'products';
    protected static $logOnlyDirty = true;

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'size',
        'color',
        'status',
        'description',
        
    ];

    public function productpivots()
    {
        return $this->hasMany(ProductPivot::class);
    }

    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }


    // Log Activity
    protected static $logFillable = true;

    // Log Activity 
    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     return $this->name . " {$eventName} By: " . Auth::user()->name;
    // }
    public function getActivitylogOptions(): LogOptions
    {
                // return $this->name . " {$eventName} By: " . Auth::user()->name;
            return LogOptions::defaults();
    }

    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->type = "product";
    // }
}

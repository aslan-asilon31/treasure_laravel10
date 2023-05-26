<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $table = 'activity_log';


    protected $fillable = [
        'log_name',
        'description',
        'subject',
        'causer',
        'properties',
        'log_name',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }


    

}

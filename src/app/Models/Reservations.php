<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurants_id',
        'date',
        'time',
        'number',
    ];

    public function restaurants() {
        return $this->belongsTo('App\Models\Restaurants');
    }

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}

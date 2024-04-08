<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
    ];

    public function restaurants() {
        return $this->belongsTo('App\Models\Restaurants');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

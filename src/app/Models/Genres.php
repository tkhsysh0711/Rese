<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_name',
    ];

    public function restaurants() {
        $this->hasMany('App\Models\Restaurants');
    }
}

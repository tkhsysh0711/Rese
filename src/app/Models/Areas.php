<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_name',
    ];

    public function restaurants() {
        $this->hasMany('App\Models\Restaurants');
    }
}

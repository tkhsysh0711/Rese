<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'area_id',
        'genre_id',
        'description',
        'image',
    ];

    public function reservations()
    {
        $limit_time = date('Y-m-d H:i', strtotime('-1 hour'));
        return $this->hasMany('App\Models\Reservations')->orderBy('start_at', 'asc')->where('start_at', '>=', $limit_time);
    }
    public function favorites()
    {
        return $this->hasMany('App\Models\favorites');
    }

    public function areas() {
        return $this->belongsTo('App\Models\Areas');
    }

    public function genres() {
        return $this->belongsTo('App\Models\Genres');
    }

    public function users() {
        return $this->belongsTo('App\Models\User');
    }


    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $FAV_group = array();
        
        foreach($this->likes as $favorites) {
            array_push($FAV_group, $favorites->user_id);
        }

        if(in_array($id, $FAV_group)) {
            return true;
        } else {
            return false;
        }
    }
}

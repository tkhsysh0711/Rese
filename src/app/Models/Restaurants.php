<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Restaurants extends Model
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
        return $this->hasMany('App\Models\Favorites');
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

        $likers = array();
        
        foreach($this->favorites as $favorite) {
            array_push($likers, $favorite->user_id);
        }

        if(in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}

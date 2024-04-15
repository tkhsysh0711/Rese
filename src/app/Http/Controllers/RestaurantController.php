<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Areas;
use App\Models\Genres;
use App\Models\Reservations;
use App\Models\Favorites;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $items = Restaurants::all();
        $areaLists = Areas::all();
        $genreLists = Genres::all();
        if( Auth::check() ){
            $favorites = Favorites::where('user_id', Auth::id())->get();
            return view('index',compact('items', 'areaLists', 'genreLists', 'favorites'));
        }
        else{
            return view('index',compact('items', 'areaLists', 'genreLists'));
        }
    }

    public function search(Request $request)
    {
        $searchArea = $request->input('searchArea');
        $searchGenre = $request->input('searchGenre');
        $searchKeyWord = $request->input('searchKeyWord');

        $query = Restaurants::select('restaurants.id', 'restaurants.name', 'restaurants.description', 'restaurants.image', 'restaurants.area_id', 'restaurants.genre_id');
        $query->join('areas', 'restaurants.area_id', '=', 'areas.id')
            ->join('genres', 'restaurants.genre_id', '=', 'genres.id');

        if(!empty($searchArea)) {
            $items = $query->where('area_id', '=', $searchArea)->get();
        }
        if(!empty($searchGenre)) {
            $items = $query->where('genre_id', '=', $searchGenre)->get();
        }
        if(!empty($searchKeyWord)) {
            $items = $query->where('restaurants.name', 'LIKE', '%'.$searchKeyWord.'%')->get();
        }

        $areaLists = Areas::all();
        $genreLists = Genre::all();

        return view('shop', compact('items', 'areaLists', 'genreLists'));
    }

    public function detail($restaurants_id)
    {
        $shop = Restaurants::find($restaurants_id);

        $items = Reservations::where('restaurants_id', $restaurants_id)->get();
        return view('detail', compact('shop', 'items'));
    }
}

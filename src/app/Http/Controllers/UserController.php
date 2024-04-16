<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservations;
use App\Models\Favorites;
use App\Models\Restaurants;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use App\Http\Requests\ReservationRequest;

class UserController extends Controller
{
    public function mypage()
    {
        $items = Reservations::where('user_id', Auth::id())->get();
        $favorites = Favorites::where('user_id', Auth::id())->get();

        return view('mypage', compact('items','favorites'));
    }

    public function registerReservation(ReservationRequest $request)
    {
        Reservations::create([
            'number' => $request->number,
            'date' => $request->date,
            'time' => $request->time,
            'restaurants_id' => $request->restaurants_id,
            'user_id' => Auth::id()
        ]);

        return redirect('/done');
    }

    public function done()
    {
        return view('done');
    }

    public function registerFavorite(Request $request)
    {
        Favorites::create([
            "user_id" => Auth::id(),
            "restaurants_id" => $request->restaurants_id,
        ]);

        return redirect()->back();
    }

    public function deleteFavorite($id)
    {
        $delete_item = Favorites::where('restaurants_id', $id)->where('user_id', Auth::id())->first();
        $delete_item->delete();

        return redirect()->back();
    }
}

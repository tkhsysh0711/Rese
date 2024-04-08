<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservations;
use App\Models\Favorites;
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
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id()
        ]);

        return view('done');
    }
}

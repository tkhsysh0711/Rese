@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="home">
    <h1>{{ Auth::user()->name }}さん</h1>
    <div class="home_cards">
        <div class="home_reservation">
            <h2>予約状況</h2>
                @foreach($items as $item)
                    <div class="home_reservation_card">
                        <div>
                            <form action="{{ route('reservation.show', $item->id) }}" method="GET">
                            @csrf
                                <button class="time"></button>
                            </form>
                            <h3>予約</h3>
                            <form action="{{ route('deleteReservation', $item->id) }}" method="POST">
                            @csrf
                                <button class="delete"></button>
                            </form>
                        </div>
                        <table>
                            <tr>
                                <td>Shop</td>
                                <td>{{ $item['shop']['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $item['date'] }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ substr($item['time'], 0, 5) }}</td>
                            </tr>
                            <tr>
                                <td>Number</td>
                                <td>{{ $item['number'] }}人</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
        </div>
        <div class="home_favorite">
            <h2>お気に入り店舗</h2>
            <div>
                @foreach ($favorites as $favorite)
                    <div class="home_favorite_card">
                        <img src="{{ $favorite['restaurants']['image'] }}" alt="店舗画像">
                        <div>
                            <h2>{{ $favorite['restaurants']['restaurant_name'] }}</h2>
                            <div class="home_favorite_card_tag">
                                <p>#{{ $favorite['area_name'] }}</p>
                                <p>#{{ $favorite['genre_name'] }}</p>
                            </div>
                            <a href="{{ route('detail', ['restaurants_id' => $favorite['restaurants']['id'] ]) }}">詳しく見る</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
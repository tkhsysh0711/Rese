@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css\detail.css') }}">
@endsection

@section('content')
<div class="detail_page">
    <div class="detail">
        <div>
            <a href="/"><</a>
            <h2>{{ $shop['restaurant_name'] }}</h2>
        </div>
        <img src="{{ $shop['image'] }}" alt="店舗画像">
        <div class="detail_tags">
            <p>#{{ $shop->areas->area_name }}</p>
            <p>#{{ $shop->genres->genre_name }}</p>
        </div>
        <div>
            <p>{{ $shop['description'] }}</p>
        </div>
    </div>

    <div class="reservation">
        <h2>予約</h2>
        <form action="{{ route('registerReservation',['restaurants_id' => $shop['id'] ]) }}" method="POST">
        @csrf
            <div>
                @if($errors->has('date'))
                    <p class="message">{{ $errors -> first('date') }}</p>
                @endif
                <input type="date" name="date">
                @if($errors->has('time'))
                    <p class="message">{{ $errors -> first('time') }}</p>
                @endif
                <select name="time" id="submit_time">
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                </select>
                @if($errors->has('number'))
                    <p class="message">{{ $errors -> first('number') }}</p>
                @endif
                <select name="number" id="submit_number">
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                    <option value="10">10人</option>
                </select>
            </div>

            @foreach($items as $item)
            <table class="reservation_table">
                <tr>
                    <td>Shop</td>
                    <td>{{ $item['restaurant_name'] }}</td>
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
            @endforeach
            <button type="submit">予約する</button>
        </form>
    </div>
</div>
@endsection
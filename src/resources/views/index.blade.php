@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="search">
    <form action="/search" onchange="submit(this.form)" method="GET" id="form">
        @csrf
            <select name="searchArea" id="submit_area">
                <option value="" selected>All area</option>
                @foreach ($areaLists as $areaList)
                    <option value="{{ $areaList['id'] }}">{{ $areaList['area_name'] }}</option>
                @endforeach
            </select>
            <select name="searchGenre" id="submit_genre">
                <option value="" selected>All genre</option>
                @foreach ($genreLists as $genreList)
                    <option value="{{ $genreList['id'] }}">{{ $genreList['genre_name'] }}</option>
                @endforeach
            </select>
            <input type="search" name="searchKeyWord" placeholder="Search...">
    </form>
</div>

<div class="index">
    @foreach ($items as $item)
        <div class="card">
            <img src="{{ $item['image'] }}" alt="店舗画像">
            <div class="card_content">
                <h2>{{ $item['restaurant_name'] }}</h2>
                <div class="card_tag">
                    <p>#{{ $item['area_name'] }}</p>
                    <p>#{{ $item['genre_name'] }}</p>
                </div>
                <div class="card_button">  
                <a href="{{ route('detail', ['restaurant_id' => $item->id]) }}">詳しく見る</a>
                @if($item->is_liked_by_auth_user())
                    @foreach($favorites as $favorite)
                        @if( $favorite['restaurant_id'] === $item['id'] )  
                            <form action="{{ route('deleteFavorite', ['restaurant_id' => $item['id']]) }}" method="POST">
                            @csrf
                                <input type="hidden" name="restaurant_id" value="{{ $item->id }}">
                                <button tupe="submit" class="heart"></button>
                            </form>
                        @endif
                    @endforeach
                @else
                    <form action="{{ route('registerFavorite', ['restaurant_id' => $item['id']]) }}" method="POST">
                    @csrf
                        <input type="hidden" name="restaurant_id" value="{{ $item->id }}">
                        <button tupe="submit" class="heart gray"></button>
                    </form>
                @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    $(function(){
        $("#submit_area").change(function(){
            $("#form").submit();
        });
        $("#submit_genre").change(function(){
            $("#form").submit();
        });
    });
</script>
@endsection
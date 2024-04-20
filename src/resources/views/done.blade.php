@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done">
    <div>
        <h2>ご予約ありがとうございます</h2>
        <button type="button"><a href="{{ route('index') }}">戻る</a></button>
    </div>
</div>
@endsection
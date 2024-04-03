@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ ('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <div>
        <h2>会員登録ありがとうございます</h2>
        <button><a href="/login">ログインする</a></button>
    </div>
</div>
@endsection
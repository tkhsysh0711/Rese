@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register">
    <h2>Registration</h2>
    <form action="/register" method="POST">
    @csrf
        @if($errors->has('name'))
            <p class="message">{{ $errors -> first('name') }}</p>
        @endif
        <div>
            <img src="/img/user.png" alt="ユーザーのアイコン">
            <input type="text" name="name">
        </div>
        @if($errors->has('email'))
            <p class="message">{{ $errors -> first('email') }}</p>
        @endif
        <div>
            <img src="/img/mail.png" alt="メールのアイコン">
            <input type="email" name="email">
        </div>
        @if($errors->has('password'))
            <p class="message">{{ $errors -> first('password') }}</p>
        @endif
        <div>
            <img src="/img/lock.png" alt="パスワードのアイコン">
            <input type="password" name="password" id="password" value=""  onKeyUp="copy()">
        </div>
        
        <button type="submit">登録</button>
    </form>
</div>
@endsection
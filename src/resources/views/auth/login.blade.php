@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <h2>Login</h2>
    @if (isset($login_error))
    <div id="error_explanation" class="text-danger">
        <ul>
            <li>メールアドレスまたはパスワードが一致しません。</li>
        </ul>
    </div>
    @endif

    <form action="/login" method="post">
    @csrf
        <div>
            <img src="/img/mail.png">
            <input type="email" name="email" />
        </div>
        <div>
        <img src="/img/lock.png">
            <input type="password" name="password" />
        </div>
        <button type="submit">ログイン</button>
    </form>
</div>
@endsection
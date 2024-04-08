<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if(app('env') == 'production')
    <link rel="stylesheet" href="{{ secure_asset('css\reset.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css\default.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css\reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css\default.css') }}">
    @endif
</head>
<body>
    <header class="header">
        <div class="header_title">
                <div class="menu__humbergar" id="menu__humbergar">
                    <span class="menu__humbergar__bar--top"></span>
                    <span class="menu__humbergar__bar--middle"></span>
                    <span class="menu__humbergar__bar--bottom"></span>
                </div>
            <h1 class="rese"><a href="/">Rese</a></h1>
        </div>
        <div class="mask" id="mask">
            <ul class="mask-menu__lists">
                <li><a href="/">Home</a></li>
                @if( !Auth::check() )
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
                @elseif( Auth::check() )
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="logout_button">Logout</button>
                    </form>
                </li>
                <li><a href="{{ route('home') }}">Mypage</a></li>
                @endif
            </ul>
        </div>
    </header>
    <main>
        @yield('contents')
    </main>
    <script>
        const menu = document.getElementById("menu__humbergar");
        const mask = document.getElementById("mask");
        menu.addEventListener('click',() => {
            menu.classList.toggle('active');
            mask.classList.toggle('active');
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}" />
        <script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <header>
            <div class="hamburger-menu">
                <input type="checkbox" id="menu-btn-check">
                <label for="menu-btn-check" class="menu-btn"><span></span></label>
                <!--ここからメニュー-->
                <div class="menu-content">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/register">Registration</a></li>
                        <li><a href="#">Mypage</a></li>
                    </ul>
                </div>
                <!--ここまでメニュー-->
            </div>
            <h1 class='header-title'>Rese</h1>
        </header>
        <div class="main__contents">
            <div class="login__contents">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

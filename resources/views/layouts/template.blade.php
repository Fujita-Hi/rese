<!DOCTYPE html>
<html lang="js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/template.css') }}" />
    <title>Rese</title>
    @yield('css')
</head>
<body>
    <header>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--メニュー-->
            <div class="menu-content">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="header__nav-item-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('logout') }}
                            </a>
                        </form>
                    </li>
                    <li><a href="/mypage">Mypage</a></li>
                    @can('admin')
                    <li><a href="/owneredit">管理者ページ</a></li>
                    @endcan
                    @canany(['owner','admin'])
                    <li><a href="/ownerdashboard">店舗管理</a></li>
                    @endcan
                </ul>
            </div>
        </div>
        <h1 class='header-title'>Rese</h1>
        @yield('menu')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
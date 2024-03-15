<!DOCTYPE html>
<html lang="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
    <script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Rese</title>
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
                </ul>
            </div>
        </div>
        <h1 class='header-title'>Rese</h1>
    </header>

    <main>
        <div class="restraunt">
            <div class="restraunt__title">
                <button type="button" onclick="history.back()" class="back__button"><</button>
                <h2 class="restraunt__name">{{$restaurant->name}}</h2>
            </div>
            <div class="restraunt__contents">
                <img src="{{ route('show.image', ['filename' => $restaurant->url]) }}" alt="Image" class='restaurant__img'>
                <div class="restaurant__tag">
                    <p class="">#{{$restaurant->area}}</p>
                    <p class="">#{{$restaurant->genre}}</p>
                </div>
                <p>{{$restaurant->summary}}</p>
            </div>
        </div>
        <div class="reservation">
            <div class="reservation__card">
                    <h2 class='reservation--title'>予約</h2>
                    <form action="/reservation_create" method="post">
                        @csrf
                        <div class='reservation--form'>
                            <input name='restaurant_id' type="hidden" value="{{$restaurant->id}}">
                            <input name='name' type="hidden" value="{{$restaurant->name}}">
                            <input name="date" type="date" id="select-date" required>
                            <label class="selectbox-time">
                                <select name="time" id="select-time" required>
                                    <option value="" selected>時間</option>
                                    <option value="00:00">0:00</option>
                                    <option value="00:30">0:30</option>
                                    <option value="01:00">1:00</option>
                                    <option value="01:30">1:30</option>
                                    <option value="02:00">2:00</option>
                                    <option value="02:30">2:30</option>
                                    <option value="03:00">3:00</option>
                                    <option value="03:30">3:30</option>
                                    <option value="04:00">4:00</option>
                                    <option value="04:30">4:30</option>
                                    <option value="05:00">5:00</option>
                                    <option value="05:30">5:30</option>
                                    <option value="06:00">6:00</option>
                                    <option value="06:30">6:30</option>
                                    <option value="07:00">7:00</option>
                                    <option value="07:30">7:30</option>
                                    <option value="08:00">8:00</option>
                                    <option value="08:30">8:30</option>
                                    <option value="09:00">9:00</option>
                                    <option value="09:30">9:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </label>
                            <label class="selectbox-nop">                    
                                <select name="nop" id="select-nop" required>
                                    <option value="" selected>人数</option>
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
                            </label>
                            <div class='confirmation__box'>
                                <table class="select__value">
                                    <tr>
                                        <td>Shop</td>
                                        <td>{{$restaurant->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td id="selecteddateValue"></td>
                                    </tr>
                                    <tr>
                                        <td>Time</td>
                                        <td id="selectedtimeValue"></td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td id="selectednopValue"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <button class="reserve-button" type="submit">予約する</button>
                    </form>
            </div>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        $('#select-date, #select-time, #select-nop').change(function() {
            var dateValue = $('#select-date').val();
            var timeValue = $('#select-time').val();
            var nopValue = $('#select-nop').val();
            $('#selecteddateValue').text(dateValue);
            $('#selectedtimeValue').text(timeValue);
            $('#selectednopValue').text(nopValue + '人');
        });
    });
</script>
</html>
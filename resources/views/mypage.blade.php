@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
<script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
@endsection

@section('menu')
@endsection
@section('content')
<div class="reservationlist" id="child1">
    <div class="reservation__header">
        <p class="reservation__header--ttl">予約状況</p>
    </div>

    @foreach ($evaluations as $evaluation)
    <div class="evaluation__card">
        <div evaluation__card--header>
            
            <form action="/reservation_delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$evaluation->id}}">
                <div class="test">
                    <p><i class="fa-regular fa-clock"></i> 評価{{ $loop->iteration }}</p>
                    <button class="batsu" type="submit"><i class="fa-regular fa-circle-xmark"></i></button>
                </div>
            </form>
        </div>
        <table class="evaluation__value">
            <form action="/reservation_delete" method="post">
            @csrf
            <tr>
                <td>Shop</td>
                <td>{{$evaluation->name}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{$evaluation->date}}</td>
            </tr>
            <tr>
                <td>Time</td>
                <td>{{\Carbon\Carbon::parse($evaluation->time)->format('H:i')}}</td>
            </tr>
            <tr>
                <td>Number</td>
                <td>{{$evaluation->nop}}人</td>
            </tr>
            <tr>
                <td>
                    <select name="evaluation" id="evaluation">
                        <option value="" selected>満足しましたか？</option>
                        <option value="00:00">1</option>
                        <option value="00:00">2</option>
                        <option value="00:00">3</option>
                        <option value="00:00">4</option>
                        <option value="00:00">5</option>
                    </select>
                </td>
                <td><button type="submit">評価</button></td>
            </tr>
            </form>
        </table>
    </div>
    @endforeach


    @foreach ($reservations as $reservation)
    <div class="reservation__card">
        <div reservation__card--header>
            
            <form action="/reservation_delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$reservation->id}}">
                <div class="test">
                    <p><i class="fa-regular fa-clock"></i> 予約{{ $loop->iteration }}</p>
                    <button class="batsu" type="submit"><i class="fa-regular fa-circle-xmark"></i></button>
                </div>
            </form>
        </div>
        <table class="reservation__value">
            <form action="reservation_edit" method="post">
            @csrf
            <tr>
                <td>Shop</td>
                <td><input type="text" name="name" value="{{$reservation->name}}"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="date" value="{{$reservation->date}}"></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><select name="time" id="select-time" required>
                            <option value="{{$reservation->time}}" selected>{{\Carbon\Carbon::parse($reservation->time)->format('H:i')}}</option>
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
                        </select></td>
            </tr>
            <tr>
                <td>Number</td>
                <td>
                    <select name="nop" id="select-nop" required>
                        <option value="{{$reservation->nop}}" selected>{{$reservation->nop}}人</option>
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
                </td>
            </tr>
            <tr>
                <td><button type="submit">変更</button></td>
                <td><a href="/qrcode/{{$reservation->id}}" class="qrcode">QRコード</a></td>
            </tr>
            </form>
        </table>
    </div>
    @endforeach
</div>
<div class="shop" id="child2">
    <div class="shop__header">
        <p class="shop__header--ttl">お気に入りの店舗</p>
    </div>
    <div class="shoplist">
        @foreach ($restaurants as $restaurant)
        <div class="card">
            <div class="card__img">
                <img src="{{ route('show.image', ['filename' => $restaurant->url]) }}" alt="Image" class='shop__img'>
            </div>
            <div class="card__content">
                <h2 class="card__content-ttl">
                {{$restaurant->name}}
                </h2>
                <div class="card__content-tag">
                    <p class="card__content-tag-item">#{{$restaurant->area}}</p>
                    <p class="card__content-tag-item card__content-tag-item--last">#{{$restaurant->genre}}</p>
                </div>
                <div class="card__content-footer">
                    <form action="/detail" method="get">
                        @csrf
                        <input name="id" type="hidden" value="{{$restaurant->id}}">
                        <button class="card__content-cat">詳しく見る</button>
                    </form>
                    <form action="/favorite_delete" method="post">
                        @csrf
                        <input name="restaurant_id" type="hidden" value="{{$restaurant->id}}">
                        <button class="good__button"><i class="fa-solid fa-heart" id="good__heart"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
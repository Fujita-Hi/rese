@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
<script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
@endsection

@section('menu')
<h1 class='header-title'>Rese</h1>
<div class="search-box">
    <form action="/search" class="search-form" method="get">
        @csrf
        <label class="selectbox-area">
            <select name='area'>
            <option value="" selected>All area</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長崎県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛知県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
            </select>
        </label>
        <label class="selectbox-genre">
            <select name='genre'>
            <option value="" selected>All genre</option>
            @foreach ($genres as $genre)
                <option value="{{$genre}}">{{$genre}}</option>
            @endforeach
            </select>
        </label>
        <button class="search-button" type="submit" aria-label="検索"><i class="fa-solid fa-magnifying-glass"></i></button>
        <label>
            <input name='text' type="text" class="search-text" placeholder="Search..." value="{{ old('text') }}">
        </label>
    </form>
</div>
@endsection

@section('content')
<div class='shoplist'>
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
                <p class="card__content-tag-item card__content-tag-item--last">
                    #{{$restaurant->genre}}
                </p>
            </div>
            <div class="card__content-footer">
                <form action="/detail" method="get">
                    @csrf
                    <input name='id' type="hidden" value="{{$restaurant->id}}">
                    <button class='card__content-cat'>詳しく見る</button>
                </form>
                @if ($favorites->contains($restaurant->id))
                    <form action="/favorite_delete" method="post">
                        @csrf
                        <input name='restaurant_id' type="hidden" value="{{$restaurant->id}}">
                        <button class='good__button'><i class="fa-solid fa-heart" id="good__heart"></i></button>
                    </form>
                @else
                    <form action="/favorite_create" method="post">
                        @csrf
                        <input name='restaurant_id' type="hidden" value="{{$restaurant->id}}">
                        <button class='good__button'><i class="fa-solid fa-heart"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
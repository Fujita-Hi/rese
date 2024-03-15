@extends('layouts.template')

@section('css')
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/ownerdashboard.css') }}" />
@endsection

@section('menu')
@endsection

@section('content')
<div class="dashboard__contents">
    <h2>店舗の追加</h2>
    <form action="/restaurant_create" method="post">
        @csrf
        <input type="text" name="name" placeholder="店舗名">
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
        <input type="text" name="genre" placeholder="ジャンル">
        <input type="text" name="summary" placeholder="概要">
        <input type="text" name="url" placeholder="画像パス">
        <button type="submit">追加</button>
    </form>

    <form action="{{ route('upload') }}" enctype="multipart/form-data" method="POST">
        @csrf 
        <input name="upload_file" type="file" /> 
        <input name="file_name" type="text" placeholder="ファイル名(拡張子を含む)"/> 
        <button>アップロード</button>
    </form>

    <h2>店舗情報の更新</h2>
    <table>
        <tr>
            <th>店舗名</th>
            <th>エリア</th>
            <th>ジャンル</th>
            <th>概要</th>
            <th>画像パス</th>
        </tr>

        @foreach($restaurants as $restaurant)
            <tr>
                <form action="/restaurant_edit" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$restaurant->id}}">
                <td><input type="text" name='name' value="{{$restaurant->name}}"></td>
                <td><input type="text" name='area' value="{{$restaurant->area}}"></td>
                <td><input type="text" name='genre' value="{{$restaurant->genre}}"></td>
                <td><input type="text" name='summary' value="{{$restaurant->summary}}"></td>
                <td><input type="text" name='url' value="{{$restaurant->url}}"></td>
                <td><button type="submit">更新</button></td>
                </form>
                <form action="/restaurant_delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$restaurant->id}}">
                <td><button type="submit">削除</button></td>
                </form>
            </tr>   
        
        @endforeach
    </table>
</div>
@endsection
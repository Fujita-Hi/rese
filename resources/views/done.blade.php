@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}" />
    <script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
@endsection
@section('menu')
@endsection

@section('content')
<div class="container">
    <div class="done__card">
        <p class="done__card--message">ご予約ありがとうございます</p>
        <button type="button" onclick="history.back()" class="back__button">戻る</button>
    </div>
</div>
@endsection
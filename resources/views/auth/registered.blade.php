@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/registered.css') }}" />
<script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
@endsection
@section('menu')
@endsection

@section('content')
<div class="container">
    <div class="done__card">
        <p class="done__card--message">会員登録ありがとうございます</p>
        <button type="button" onclick="window.location.href='/'" class="login__button">ログインする</button>
    </div>
</div>
@endsection
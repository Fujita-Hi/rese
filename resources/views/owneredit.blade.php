@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/owneredit.css') }}" />
@endsection

@section('menu')
@endsection

@section('content')
<table>
<tr>
    <th>Name</th>
    <th>role</th>
</tr>
    @foreach ($users as $edituser)
        <tr>
            <td>{{$edituser->name}}</td>
            @if ($edituser->role >= 1 && $edituser->role <= 10)
                <td>管理者</td>
            @elseif ($edituser->role > 10 && $edituser->role <= 100)
                <td>店舗代表者</td>
            @else
                <td>利用者</td>
            @endif
            <td>
                <form action="/roleedit" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$edituser->id}}">
                    <select name="role">
                        <option value="0">一般</option>
                        <option value="50">店舗代表者</option>
                        <option value="1">管理者</option>
                    </select>
                    <button type="submit">更新</button>
                </form>
            </td>
            <td><a href="mailto:{{$edituser->mail}}">メール送信</a></td>
        </tr>
    @endforeach
</table>
@endsection
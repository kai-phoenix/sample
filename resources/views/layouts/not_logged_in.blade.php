@extends('layouts.default')

@section('header')
<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('users.create') }}">
            サインアップ
          </a>
        </li>
        <li>
          <a href="{{ route('session.create') }}">
            ログイン
          </a>
        </li>
    </ul>
</header>
@endsection
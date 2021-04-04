@extends('layouts.default')

@section('header')
<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('posts.index') }}">
            投稿一覧
          </a>
        </li>
        <li>
          <a href="{{ route('posts.create') }}">
            新規投稿
          </a>
        </li>
        <li>
          <a href="{{ route('users.edit', $user->id) }}">
            プロフィール編集
          </a>
        </li>
        <li>
          <form method="post" action="{{ route('session.destroy') }}" >
            @method('delete')
            <input type="submit" value="ログアウト">
          </form>
        </li>
    </ul>
</header>
@endsection
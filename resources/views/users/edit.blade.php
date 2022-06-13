@extends('layouts.logged_in')

@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('users.update', $user) }}">
      @method('patch')
      <!--CSRF脆弱性の修正/11-->
      @csrf
      <div>
          <!--XSS脆弱性を防ぐためにエスケープ/11-->
          <label>
            {!! nl2br(e($user->name)) !!}のプロフィール:
            <!--XSS脆弱性を防ぐためにエスケープ/11-->
            <textarea name="description" cols="30" rows="5">{{!! nl2br(e($user->description)) !!}}</textarea>
          </label>
      </div>

      <input type="submit" value="更新">
  </form>
@endsection
@extends('layouts.logged_in')

@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('posts.update', $post) }}">
      @method('patch')
      <!--CSRF脆弱性の修正/11-->
      @csrf
      <div>
          <label>
            コメント:
            <!--XSS脆弱性を防ぐためにエスケープ/11-->
            <textarea name="comment" cols="30" rows="5">{{!!nl2br(e($post->comment))!!}}</textarea>
          </label>
      </div>

      <input type="submit" value="投稿">
  </form>
@endsection
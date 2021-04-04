@extends('layouts.logged_in')

@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('users.update', $user) }}">
      @method('patch')
      <div>
          <label>
            {!! $user->name !!}のプロフィール:
            <textarea name="description" cols="30" rows="5">{{ $user->description }}</textarea>
          </label>
      </div>

      <input type="submit" value="更新">
  </form>
@endsection
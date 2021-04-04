<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
      $posts = Post::all();
      return view('posts.index', [
        'title' => '投稿一覧',
        'posts' => $posts,
        'user' => $user
      ]);
    }
    
    public function create(){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
      return view('posts.create', [
        'title' => '新規投稿',
        'user' => $user
      ]);
    }
    
    public function store(PostRequest $request){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
      Post::create([
        'user_id' => $user->id,
        'comment' => $request->comment,
      ]);
      session()->flash('success', '投稿を追加しました');
      return redirect()->route('posts.index');
    }
    
    public function edit(Post $post){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
      return view('posts.edit', [
        'title' => '投稿編集',
        'post'  => $post,
        'user' => $user
      ]);
        
    }
    
    public function update(Post $post, PostRequest $request){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
      $sql = "
        UPDATE
          posts
        SET
          comment = '{$request->comment}'
        WHERE
          id = {$post->id}
      ";
      \DB::update($sql);
      session()->flash('success', '投稿を編集しました');
      return redirect()->route('posts.index');
    }
    
    public function destroy(){
      $user = $this->currentUser();
      if($user === null){
        return redirect()->route('session.create');
      }
    }
    
    private function currentUser(){
      $user_id = session()->get('user_id');
      if($user_id === null){
        return null;
      }
      return User::find($user_id);
    }
}

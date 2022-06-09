<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;
// Hash クラスを読み込み
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('users.create', [
          'title' => 'サインアップ',
        ]);
    }
    
    public function store(UserRequest $request){
        $user = User::create([
            'name'=>$request->name,
            //ハッシュ化
            'password'=>Hash::make($request->password),
            ]);
        session()->put('user_id', $user->id);
        return redirect()->route('posts.index');
    }
    
    public function edit(User $user){
        $login_user = $this->currentUser();
        if($login_user === null){
            return redirect()->route('session.create');
        }
        if($login_user->id !== $user->id){
            return redirect()->route('posts.index');
        }
        return view('users.edit', [
          'title' => 'プロフィール編集',
          'user' => $login_user
        ]);
    }
    
    public function update(User $user, Request $request){
        $login_user = $this->currentUser();
        if($login_user === null){
            return redirect()->route('session.create');
        }
        if($login_user->id !== $user->id){
            return redirect()->route('posts.index');
        }
        $user->update($request->all());
        session()->flash('success', 'プロフィールを編集しました');
        return redirect()->route('users.edit', $user);
    }
    
    private function currentUser(){
      $user_id = session()->get('user_id');
      if($user_id === null){
        return null;
      }
      return User::find($user_id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
//Hashクラスを読み込み
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function create(){
        return view('session.create', [
          'title' => 'ログイン',
        ]);
    }
    public function store(Request $request){
        $user = User::where('name', $request->name)->first();
        if(Hash::check($request->password,$user->password)===false){
            session()->flash('danger', 'ログインに失敗しました。');
            return redirect()->route('session.create');
        }
        session()->put('user_id', $user->id);
        return redirect()->route('posts.index');
    }
    public function destroy(){
        session()->flush();
        return redirect()->route('session.create');
    }
}

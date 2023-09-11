<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{
    //アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('posts.index');
    }

    public function post(Request $request)
    {
        // バリデーション
        $validator = $request->validate([
            'post' => ['required', 'string', 'min:0', 'max:150'] //入力必須、文字列、1文字以上150文字以内
        ]);
        Post::create([ //Postテーブルに保存する
            'user_id' => Auth::user()->id, //現在ログインしている人をuser_idカラムに保存する
            'post' => $request->post, //投稿内容をpostカラムに保存する
        ]);
        return back(); //topページに戻る
    }
}

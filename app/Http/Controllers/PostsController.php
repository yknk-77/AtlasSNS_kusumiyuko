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

    // 投稿機能
    public function post(Request $request)
    {
        // バリデーション
        $validator = $request->validate([
            'post' => ['required', 'string', 'min:0', 'max:150'] //入力必須、文字列、1文字以上150文字以内
        ]);
        Post::create([ //Postモデルを通じてpostsテーブルに保存する
            'user_id' => Auth::user()->id, //現在ログインしている人をuser_idカラムに保存する
            'post' => $request->post, //投稿内容をpostカラムに保存する
        ]);
        return back(); //topページに戻る
    }

    // タイムライン表示
    public function show()
    {
        $posts = Post::latest()->get();  //Postモデルを通じてpostsテーブルに保存された投稿を新着順で取得したものを$posts変数に格納する
        return view('posts.index', compact('posts'));   //$postsをビューに送りつつtopページを表示する
    }

    // 投稿編集機能
    public function update(Request $request)
    {
        $id = $request->input('id'); //更新する投稿のidを取得して$idに格納する(更新前)
        $up_post = $request->input('upPost'); //更新した投稿内容を$up_postに格納する(更新後)
        Post::query()
            ->where('id', $id)
            ->update(
                ['post' => $up_post] //$up_postをpostとして更新する
            );

        // トップ画面に戻る
        return redirect('/top');
    }
}

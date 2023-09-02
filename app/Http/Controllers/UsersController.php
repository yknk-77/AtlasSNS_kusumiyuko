<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Posts;
use App\Models\Follower;

class UsersController extends Controller
{
    //アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    // プロフィール画面
    public function profile()
    {
        return view('users.profile');
    }

    // 検索画面
    public function search()
    {
        return view('users.search');
    }

    // フォロー
    public function follow(User $user)
    {
        // 現在認証されているユーザー（フォロワー）を取得
        $follower = auth()->user();
        // 既にフォローしているかを判定
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) { // フォローしていなければ
            // フォローする
            $follower->follow($user->id);
            // 元の画面に戻る
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // 既にフォローしているかを判定
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) { // フォローしていれば
            // フォローを解除する
            $follower->unfollow($user->id);
            // 元の画面に戻る
            return back();
        }
    }
}

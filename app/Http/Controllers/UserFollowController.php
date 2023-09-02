<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\UserFollow;

class UserFollowController extends Controller
{
    //アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    //フォロー機能
    public function follow(User $user)
    {
        $follow = UserFollow::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
        $followCount = count(UserFollow::where('followed_user_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }

    public function unfollow(User $user)
    {
        $follow = UserFollow::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(UserFollow::where('followed_user_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}

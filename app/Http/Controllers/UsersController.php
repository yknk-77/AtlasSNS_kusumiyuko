<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Follower;

class UsersController extends Controller
{
    //アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    // プロフィール画面表示
    public function show()
    {
        // ユーザーを取得して画面を表示する
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    // プロフィール編集 （ユーザー名、メールアドレス、パスワード、パスワード確認、自己紹介文）
    public function profileUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:12', //必須、文字列、2文字以上12文字以内
            'mail' => ['required', 'string', 'email', 'min:5', 'max:40', Rule::unique('users')->ignore(Auth::id())], //必須、文字列、メールアドレス形式、5文字以上40文字以内、登録済みメールアドレス使用不可（自分のメールアドレスは除く）
            'password' => 'required|regex:/\A([a-zA-Z0-9]{8,20})+\z/u|confirmed', //必須、英数字のみ、8文字以上20文字以内
            'password_confirmation' => 'required|regex:/\A([a-zA-Z0-9]{8,20})+\z/u', //必須、英数字のみ、8文字以上20文字以内、パスワード欄と一致しているか
            'bio' => 'string|max:150', //文字列、150文字以内
        ]);

        try { //更新に成功した場合
            $user = Auth::user();
            // 受け取った情報をそれぞれにセットする
            $user->name = $request->input('name');
            $user->mail = $request->input('mail');
            $user->password = bcrypt($request->input('password')); //パスワードをハッシュ化
            $user->password_confirmation = bcrypt($request->input('password_confirmation')); //パスワードをハッシュ化
            $user->bio = $request->input('bio');
            $user->save(); //ユーザー情報の変更を保存する
        } catch (\Exception $e) { //更新に失敗した場合
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }

        // 更新に成功した場合、メッセージとともにプロフィール画面にリダイレクトする
        return redirect()->route('users.top')->with('msg_success', 'プロフィールの更新が完了しました');
    }

    // // 画像のアップロード
    // public function imagesUpdate(Request $request)
    // {
    //     //バリデーションは省略

    //     // リクエストデータ （全て）を取得し、$updateUserに代入
    //     $updateUser = $request->all();

    //     // プロフィール画像の変更があった場合
    //     if ($request->profile_image != null) {
    //         // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profilesに保存し、そのファイル名（ファイルパス）を$profileImagePathとして生成
    //         $profileImagePath = $request->profile_image->store('public/profiles');
    //         // $updateUserのprofile_imageカラムに$profileImagePath（ファイルパス）を保存
    //         $updateUser['profile_image'] = $profileImagePath;
    //     }

    //     // ログイン中のユーザの情報を取得し、$loginUserに代入
    //     $loginUser = Auth::user();
    //     // $updateUserのデータを受け取り、データベースへ保存
    //     $loginUser->fill($updateUser)->save();

    //     return redirect()->route('user.show', Auth::user());
    // }


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

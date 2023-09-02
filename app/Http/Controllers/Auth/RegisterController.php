<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');    }

    public function register(Request $request){
        if($request->isMethod('post')){

            //バリデーション設定
            $request->validate([
                'username' => 'required|min:2|max:12',
                'mail' => 'required|min:5|max:40|unique:users,mail|email',
                'password' => 'required|regex:/\A([a-zA-Z0-9]{8,20})+\z/u|confirmed',
                'password_confirmation' => 'required'
            ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

        // セッションでユーザー名を保存する
        $request->session()->put('username', $username);
        // セッションでユーザー名を取得する
        $request->session()->get('username');

            return redirect('added');

        }
        return view('auth.register');
    }

    public function added(){

        return view('auth.added');
    }
}

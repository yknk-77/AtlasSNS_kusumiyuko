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
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){

            //バリデーション設定
            $request->validate([
                'username' => 'required|min:2|max:12',
                'mail' => 'required|min:5|max:40|unique:users,mail|email',
                'password' => 'required|regex:/\A([a-zA-Z0-9]{8,20})+\z/u|confirmed',
                // 'password_confirmation' => 'required|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z\-]{8,20}$/|confirmed:password'
            ],
            [
                'username.required' => 'user nameは必須です。',
                'mail.required' => 'mail addressは必須です。',
                'password.required' => 'passwordは必須です。',
                'password_confirmation.required' => 'password confirmは必須です。',
                'mail.email' => 'メールアドレスの形式で入力してください。',
                'mail.unique' => 'このメールアドレスは既に使用されています。',
                'password.regex' => 'パスワードは８文字以上２０文字以内で入力してください。',
                'password.confirmed' => 'パスワードが一致しません。'
            ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);


            return redirect('added');

        }
        return view('auth.register');
    }

    public function added(Request $request){
        //セッションでユーザー名を保存する
        $request->session()->put('username');
        //セッションでユーザー名を取得する
        $request->session()->get('username');

        return view('auth.added');
    }
}

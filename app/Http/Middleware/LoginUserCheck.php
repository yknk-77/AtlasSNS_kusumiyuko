<?php

namespace App\Http\Middleware;

use Closure;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //
        if (!Auth::check()) { // 非ログインはログインページに飛ばす
            return redirect('/login');
        }
        return $next($request);
    }
}

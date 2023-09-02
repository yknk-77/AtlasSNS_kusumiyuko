<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        return view('posts.index');
    }
}

@extends('layouts.login')

@section('content')

<!-- 投稿フォーム -->
{!! Form::open(['url' => '/top']) !!}
<!-- 脆弱性対策 -->
@csrf

<div class="post-wrapper">
  <div class="post-form">
    <img class="icon" src="{{ asset('images/icon1.png') }}" alt="{{ Auth::user()->username }}さんのアイコン">
    {{ Form::textarea('post',null,['class' => 'post-text', 'rows' => '4', 'cols' => '100', 'placeholder' => '投稿内容を入力してください。']) }}
    {{ Form::image('/images/post.png', '投稿', ['name' => 'post_btn', 'class' => 'post-btn']) }}

    <!-- エラーメッセージ表示 -->
    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

  </div>
  </form>
</div>

{!! Form::close() !!}

@endsection

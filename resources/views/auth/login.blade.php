@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<!-- 脆弱性対策 -->
@csrf

<div class="form-group">

  <p class="title white">AtlasSNSへようこそ</p>

  <div class="form-title">
    {{ Form::label('mail address') }} <br>
  </div>
  <div class=" form-text">
    {{ Form::text('mail',null,['class' => 'input']) }} <br>
  </div>

  <div class="form-title">
    {{ Form::label('password') }} <br>
  </div>
  <div class="form-text">
    {{ Form::password('password',['class' => 'input']) }} <br>
  </div>

  <div class="btn">
    {{ Form::submit('LOGIN', [ 'class' => 'btn white']) }}
  </div>
  <p class="link"><a class="white" href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}

@endsection

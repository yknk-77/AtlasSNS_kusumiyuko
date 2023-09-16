@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="form-group">
  <!-- エラーメッセージ表示 -->
  @if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li class="message">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h2 class="title white">新規ユーザー登録</h2>

  <div class="form-title">
    {{ Form::label('user name') }} <br>
  </div>
  <div class="form-text">
    {{ Form::text('username',null,['class' => 'input', 'placeholder' => 'admin']) }} <br>
  </div>

  <div class="form-title">
    {{ Form::label('mail address') }} <br>
  </div>
  <div class=" form-text">
    {{ Form::text('mail',null,['class' => 'input', 'placeholder' => 'admin@atlas.com']) }} <br>
  </div>

  <div class="form-title">
    {{ Form::label('password') }} <br>
  </div>
  <div class="form-text">
    {{ Form::password('password',null,['class' => 'input']) }} <br>
  </div>

  <div class="form-title">
    {{ Form::label('password confirm') }} <br>
  </div>
  <div class="form-text">
    {{ Form::password('password_confirmation',null,['class' => 'input']) }} <br>
  </div>

  <div class="btn">
    {{ Form::submit('REGISTER', [ 'class' => 'btn white']) }}
  </div>

  <p class="link"><a class="white" href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>


@endsection

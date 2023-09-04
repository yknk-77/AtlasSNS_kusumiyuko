@extends('layouts.login')

@section('content')

<!-- プロフィール編集画面 -->
{!! Form::open(['url' => '/profile']) !!}

<div class="form-wrapper">

  <div class="form-group">
    <img class="icon" src="{{ asset('images/icon1.png') }}" alt="{{ Auth::user()->username }}さんのアイコン">
  </div>

  <div class="form-group">
    <div class="form-content">
      <div class="form-title">
        {{ Form::label('user name') }}
      </div>
      <div class=" form-text">
        {{ Form::text('mail',null,['class' => 'input']) }} <br>
      </div>
    </div>

    <div class="form-content">
      <div class="form-title">
        {{ Form::label('mail address') }} <br>
      </div>
      <div class=" form-text">
        {{ Form::text('mail',null,['class' => 'input']) }} <br>
      </div>
    </div>

    <div class="form-content">
      <div class="form-title">
        {{ Form::label('password') }} <br>
      </div>
      <div class="form-text">
        {{ Form::password('password',null,['class' => 'input']) }} <br>
      </div>
    </div>

    <div class="form-content">
      <div class="form-title">
        {{ Form::label('password confirm') }} <br>
      </div>
      <div class="form-text">
        {{ Form::password('password_confirmation',null,['class' => 'input']) }} <br>
      </div>
    </div>

    <div class="form-content">
      <div class="form-title">
        {{ Form::label('bio') }} <br>
      </div>
      <div class="form-text">
        {{ Form::password('password_confirmation',null,['class' => 'input']) }} <br>
      </div>
    </div>

    <div class="form-content">
      <div class="form-title">
        {{ Form::label('icon image') }} <br>
      </div>
      <div class="form-text">
        {{ Form::password('password_confirmation',null,['class' => 'input']) }} <br>
      </div>
    </div>
  </div>
</div>

<div class="form-wrapper">
  <div class="btn-red">
    {{ Form::submit('更新', [ 'class' => 'btn-red btn-text']) }}
  </div>
</div>


{!! Form::close() !!}

@endsection

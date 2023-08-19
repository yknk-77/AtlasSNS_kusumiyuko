@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/〇〇']) !!}

<p class="title white">AtlasSNSへようこそ</p>

<div class="form-title">
  {{ Form::label('mail address') }} <br>
</div>
{{ Form::text('mail',null,['class' => 'input']) }} <br>

<div class="form-title">
  {{ Form::label('password') }} <br>
</div>
{{ Form::password('password',['class' => 'input']) }} <br>

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection

@extends('layouts.login')

@section('content')

<!-- プロフィール編集画面 -->
{!! Form::open(['url' => '/profile', 'method' => 'PUT']) !!}
{!! Form::hidden('id',$user->id) !!}

<div class="form">
  <!-- icon -->
  <img class="icon" src="{{ asset('images/icon1.png') }}" alt="{{ Auth::user()->username }}さんのアイコン">
  <!-- user name -->
  <div class="form-item">
    {{ Form::label('name','user name', ['class' => 'form-item-label']) }}
    {{ Form::text('name', null, ['class' => 'form-item-input']) }}
    <span class="text-danger">{{$errors->first('name')}}</span>
  </div>
  <!-- mail address -->
  <div class="form-item">
    {{ Form::label('mail','mail address', ['class' => 'form-item-label']) }}
    {{ Form::email('mail', null, ['class' => 'form-item-input']) }}
    <span class="text-danger">{{$errors->first('email')}}</span>
  </div>
  <!-- password -->
  <div class="form-item">
    {{ Form::label('password','password', ['class' => 'form-item-label']) }}
    {{ Form::password('password', ['class' => 'form-item-input']) }}
  </div>
  <!-- password confirm -->
  <div class="form-item">
    {{ Form::label('password_confirmation','password confirm', ['class' => 'form-item-label']) }}
    {{ Form::password('password_confirmation', ['class' => 'form-item-input']) }}
  </div>
  <!-- bio -->
  <div class="form-item">
    <p class="form-item-label">bio</p>
    {{ Form::text('bio', null, ['class' => 'form-item-input']) }}
  </div>
  <!-- プロフィール画像 -->
  <div class="form-item">
    {{ Form::label('images','icon image',['class' => 'form-item-label']) }}
    {{ Form::file('images', ['class'=>'form-item-input','id'=>'fileImage', 'enctype'=>'multipart/form-data', 'accept' => 'image/png']) }}
  </div>

  {{ Form::submit('更新', ['class' => 'form-btn']) }}
</div>

{!! Form::close() !!}

@if ($errors->any())
<script src="{{ asset('js/script.js') }}"></script>
@endif

@endsection

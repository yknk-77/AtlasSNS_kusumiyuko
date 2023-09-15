@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/top']) !!}
<!-- 脆弱性対策 -->
@csrf

<!-- 投稿フォーム -->
<div class="post-wrapper">
  <div class="post-form">
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
    <img class="icon" src="{{ asset('images/icon1.png') }}" alt="{{ Auth::user()->username }}さんのアイコン">
    {{ Form::textarea('post',null,['class' => 'post-text', 'rows' => '4', 'cols' => '100', 'placeholder' => '投稿内容を入力してください。']) }}
    {{ Form::image('/images/post.png', '投稿', ['name' => 'post_btn', 'class' => 'btn-post']) }}
  </div>
  <!-- タイムラインのエラーメッセージ表示 -->
  <!-- @if($errors->first('posts'))
  <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">{{$errors->first('posts')}}</p>
  @endif -->
  </form>
</div>
<!-- タイムライン表示 -->
<div class="timeline-wrapper">
  @foreach($posts as $post)
  <div class="timeline-item">
    <tr>
      <td> <a href="{{$post->user_id}}/profile"><img class="image-circle" src="{{ asset('images/' . $post->images ) }}" alt="ユーザーアイコン"></a> </td>
      <td>{{ $post->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
      <!-- <div>{{ $post->post }}</div> -->
      @if(Auth::id()==$post->user_id)
      <td>
        <!-- モーダルウィンドウオープン時の外側部分 -->
        <div class="overlay" id="js-overlay"></div>

        <!-- モーダルウィンドウ部分 -->
        <div class="modal" id="js-modal">
          <div class="modal-close-wrap">
            <button class="modal-close" id="js-close">
              <span></span>
              <span></span>
            </button>
          </div>
          <p>コンテンツ・内容が入ります。</p>
        </div>

        <!-- 投稿編集ボタン -->
        <button type="button" class="btn-update" id="js-open" data-toggle="modal" data-target="#Modal" data-whatever="{{ $post->post }}" data-post-id="{{$post->id}}">
          <img src="{{ asset('images/edit.png') }}" alt="編集" width="25px" height="auto">
        </button>
      </td>
      <!-- 投稿削除ボタン -->
      <td>
        <a class="btn-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')">
          <img src="{{ asset('images/trash.png') }}" alt="削除" width="25px" height="auto">
        </a>
      </td>
      @endif
    </tr>
  </div>
  @endforeach
</div>


{!! Form::close() !!}

@endsection

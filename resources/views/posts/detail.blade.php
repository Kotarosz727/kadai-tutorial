@extends('layouts.app')

@section('title', '詳細')

@section('addcss')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="post-item-box">
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>
            カテゴリー；
            @foreach($post->category as $cate)
                {{ $cate->body }}
            @endforeach 
        </div>
        <div class="comment-input">
            @guest
                ログインしてコメントを記入
            @else
                <form action="/comments" method="post">
                @csrf
                    <input type="text"　name="content" placeholder="コメントを追加" required>
                    <button type="submit" class="btn btn-primary">コメントを追加</button>
                    <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                </form> 
            @endguest
        </div>
        <div>
            @foreach($post->comment as $comment)
                <div class="comment-line">
                    {{ $comment->content }}
                </div>
            @endforeach
        </div>           
    </div>
</div>
@endsection    
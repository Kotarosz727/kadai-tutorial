@extends('layouts.app')

@section('title', '掲示板　一覧')

@section('addcss')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @foreach($lists as $list)
            <div class="post-item-box">
                <h4><a href="/posts/{{ $list->post_id }}">{{ $list->title }}</a></h4>
                <p><a href="/posts/{{ $list->post_id }}">{{ $list->content }}</a></p>
                カテゴリー:
                @foreach($list->category as $cate)
                    {{ $cate->body }}
                @endforeach 
            </div>    
        @endforeach
    </div>
</div>
@endsection    
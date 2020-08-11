@extends('layouts.app')

@section('title', '検索結果')

@section('addcss')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @foreach($results as $res)
            <div class="post-item-box">
                <h5><a href="/posts/{{ $res->post_id }}">{{ $res->title }}</a></h5>
                <p><a href="/posts/{{ $res->post_id }}">{{ $res->content }}</a></p>
            </div>    
        @endforeach
    </div>
</div>
@endsection    
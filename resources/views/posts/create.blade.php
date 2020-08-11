@extends('layouts.app')

@section('title', '掲示板　新規作成')

@section('addcss')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<h4>投稿</h4>
<div class="col-md-8">
    <div class="row justify-content-center">
        <form action="{{ url('/posts/') }}" method='post'>
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>
                
                <div class="col-md-6">
                    <input name='title' type="text"　required style="width: 200%;">
                </div>

            </div>

            <div class="form-group row">
                <label for="category-check" class="col-md-4 col-form-label text-md-right">カテゴリー<br><small>複数選択可能</small></label>

                <div class="col-md-6 category-line">
                    @foreach($categories as $category)
                        <input type="checkbox" name="category[]" value="{{ $category->cate_id }}"> {{ $category->body }}
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-4 col-form-label text-md-right">本文</label>

                <div class="col-md-6">
                    <textarea name="content" cols="100" rows="20"　required></textarea><br>
                </div>
            </div>
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('作成') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>    
@endsection   
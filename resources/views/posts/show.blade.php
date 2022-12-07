@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ secure_asset('/css/show.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>食べログ</h1>
       {{$post->user->name}}<br>
       <h3><a href=''>{{$post->category->name}}</a></h3>
       <h3><a href=''>{{$post->area->name}}</a></h3>
       <div class='post'>
               <h2 class='shop_name'>{{$post->shop_name}}</h2>
               <h2>[<a href='/posts/{{$post->id}}/review'>レビューを書く</a>]</h2>
               <p class='comment'>{{$post->comment}}</p>
               <p class='updated_at'>{{$post->updated_at}}</p>
            </div>
            @if ($post->image_path)
            <!-- 画像を表示 -->
            <img src="{{ $post->image_path }}">
            @endif
            <p class='edit'>[<a href='/posts/{{$post->id}}/edit'>内容を編集する</a>]</p>
            <form action='/posts/{{$post->id}}' id='form_delete' method='POST'>
                @csrf
                @method('DELETE')
                <p class='delete'>[<span onclick='return deletePost(this);'>削除する</span>]</p>
                </form>
                <script>
                function deletePost(e){
                    'use_strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか?')){
                        document.getElementById('form_delete').submit();
                    }
                }
                </script>
                <p class='review'>{{$review->review}}</p>
                <div class='back'>[<a href='/'>トップページに戻る</a>]</div>
    </body>
</html>
@endsection
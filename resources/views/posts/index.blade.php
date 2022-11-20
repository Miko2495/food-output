@extends('layouts.app')

@section('content')
{{Auth::user()->name}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ secure_asset('/css/index.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>食べログ</h1>
       [<a href='/posts/create'>投稿する</a>]
       [<a href='/shops/create'>店の追加</a>]
       <div class='posts'>
       @foreach($posts as $post)
       <a href=''>{{ $post->user->name }}</a><br>
       <a href=''>{{ $post->category->name}}</a><br>
       <a href=''>{{ $post->area->name}}</a>
           <div class='post'>
               <h2 class='shop_name'>
                   <a href='/posts/{{$post->id}}'>{{$post->shop_name}}</a>
               </h2>
               <p class='comment'>{{$post->comment}}</p>
                @if ($post->image_path)
          <!-- 画像を表示 -->
          <img src="{{ $post->image_path }}">
        @endif
               </div>
        　 @endforeach
            </div>
            <div class='paginate'>
                {{$posts->links()}}
            </div>
    </body>
</html>
@endsection
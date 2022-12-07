@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ secure_asset('/css/edit.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>編集画面</h1>
       <form action='/posts/{{$post->id}}' method='POST'enctype='multipart/form-data'>
           @csrf
           @method('PUT')
           <div class='shop_name'>
               <h2>ShopName</h2>
               <input type='text' name='post[shop_name]' value='{{$post->shop_name}}'/>
           </div>
           <div class='comment'>
               <h2>Comment</h2>
               <textarea name='post[comment]'>{{$post->comment}}</textarea>
               </div>
            <!-- 画像を表示 -->
            <img src="{{ $post->image_path }}">
            <input type="file" name="image">
            {{ csrf_field() }}
           <input type='submit' value='更新'>
       </form>
    </body>
</html>
@endsection
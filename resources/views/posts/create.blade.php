@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ secure_asset('/css/create.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>食べログ</h1>
       <form action='/posts' method='POST' enctype='multipart/form-data'>
           @csrf
           <div class='shop_name'>
               <h2>ShopName</h2>
               <input type='text' name='post[shop_name]' placeholder='店名' value='{{old('post.shop_name')}}'/>
               <p class='shop_name_error' style='color:red'>{{$errors->first('post.shop_name')}}</p>
           </div>
           <div class='comment'>
               <h2>Comment</h2>
               <textarea name='post[comment]' placeholder='美味しかったです'>{{old('post.comment')}}</textarea>
               <p class='comment_error' style='color:red'>{{$errors->first('post.comment')}}</p>
           </div>
           <div class='category'>
               <h2>Category</h2>
               <select name='post[category_id]'>
                   @foreach($categories as $category)
                   <option value='{{$category->id}}'>{{$category->name}}</option>
                   @endforeach
                   </select>
           </div>
           <div class='area'>
               <h2>Area</h2>
               <select name='post[area_id]'>
                   @foreach($areas as $area)
                   <option value='{{$area->id}}'>{{$area->name}}</option>
                   @endforeach
                   </select>
           </div>
           <!-- アップロードフォームの作成 -->
           <input type="file" name="image">
           {{ csrf_field() }}
           <input type='submit' value='保存'/>
           </form>
           <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>
@endsection
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
         <link rel="stylesheet" href="{{ secure_asset('/css/review.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
  <body>
       <h1>食べログ</h1>
       <form action='/posts/{{$post->id}}' method='POST'>
           @csrf
           <div class='review'>
               <h2>Review</h2>
               <textarea name='review[review]' placeholder='美味しかったです'></textarea>
           </div>
           <a href=''>{{$post->shop_name}}</a><br>
           <div class='point'>
               <h2>Point<h2>
            　 <textarea name='review[points]' placeholder='3点'></textarea>
            </div>
           <input type='submit' value='保存'/>
           </form>
           <div class='back'>[<a href='/posts/{{$post->id}}'>back</a>]</div>
    </body>
</html>
@endsection
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
               <h2>[<a href='/posts/{{$post->id}}/review'>review</a>]</h2>
               <p class='comment'>{{$post->comment}}</p>
               <p class='updated_at'>{{$post->updated_at}}</p>
            </div>
            <p class='edit'>[<a href='/posts/{{$post->id}}/edit'>edit</a>]</p>
            <form action='/posts/{{$post->id}}' id='form_delete' method='POST'>
                @csrf
                @method('DELETE')
                <p class='delete'>[<span onclick='return deletePost(this);'>delete</span>]</p>
                </form>
                <script>
                function deletePost(e){
                    'use_strict';
                    if (confirm('削除すると復元できません。\n本当に削除しますか?')){
                        document.getElementById('form_delete').submit();
                    }
                }
                </script>
　　　　　 <div class='reviews'>
           <p class='review'>{{$review->review}}</p>
        　 </div>
                <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>
@endsection
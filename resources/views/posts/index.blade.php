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
       <div class='posts'>

           @foreach($posts as $post)
           <div class='post'>
               <h2 class='shop_name'>{{$post->shop_name}}</h2>
               <p class='comment'>{{$post->comment}}</p>
               </div>
        　 @endforeach
            </div>
            <div class='paginate'>
                {{$posts->links()}}
            </div>
    </body>
</html>

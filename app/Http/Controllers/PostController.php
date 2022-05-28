<?php

namespace App\Http\Controllers;

// Postモデルクラスのuse宣言
use App\Post;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    // index関数の定義
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=>$post->getPaginateByLimit()]);
        // Bladeファイルがどこの直下にあるか(今回はpostsフォルダの下)
        // withメソッドでビューと一緒に渡すデータを定義している(変数名=>値)
    }
    //
}

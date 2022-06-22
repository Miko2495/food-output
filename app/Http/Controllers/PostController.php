<?php

namespace App\Http\Controllers;

// Postモデルクラスのuse宣言
use App\Post;
use App\User;
use App\Category;
use App\Area;
use App\Shop;
use App\Review;
use Illuminate\Support\Facades\Auth;
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
    public function show(Post $post){
        return view('posts/show')->with(['post'=>$post]);
    }

    public function create(User $user,Category $category,Area $area){
        return view('posts/create')->with(['users'=>$user->get(),'categories'=>$category->get(),'areas'=>$area->get()]);

    }
      public function review(Post $post,Shop $shop,Review $review){
        return view('posts/review')->with(['post'=>$post,'shop'=>$shop->get()]);
    }

    public function store2(Request $request, Post $post, Review $review){
        $input = $request['review'];  //この行を追加
        $review->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }
    // public function store2(Request $request,Post $post,Review $review){
    //     return redirect('/posts/'.$shop->id);
    // }

    // public function store2(Request $request,Post $post, Review $review){
    //     $input=$request['review'];
    //     $input +=['shops'=>$shop->get()];
    //     $review->fill($input)->save();
    //     return redirect('/posts/'.$post->id);
    // }

    public function store(Request $request, Post $post,Review $review){
        $input=$request['post'];
        // $inputの定義を追加
        $input +=['user_id'=>Auth::user()->id];
        $post->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }

    public function edit(Post $post,User $user){
        return view('posts/edit')->with(['post'=>$post,'users'=>$user->get()]);
    }

    public function update(Request $request, Post $post){
        $input=$request['post'];
        $input +=['user_id'=>$request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }


}
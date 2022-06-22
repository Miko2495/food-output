<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function create(){
        return view('shops/create');

    }

    public function store(Request $request, Shop $shop){
        $input=$request['shop'];
        $shop->fill($input)->save();
        return redirect('/');
    }
}

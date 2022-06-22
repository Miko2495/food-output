<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable=[
    'shop_name',
    'comment',
    'user_id',
    'category_id',
    'area_id',
    ];
     //論理削除を行う定義
    use SoftDeletes;
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this::with('user','category','area')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    // Userに対するリレーション
    // 「1対多」の関係だから単数形に,一つの投稿に対してuserは一人
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function area(){
        return $this->belongsTo('App\Area');
    }
    public function shop(){
        return $this->belongsTo('App\Shop');
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
}

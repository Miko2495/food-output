<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable=[
    'shop_name',
    'comment'
    ];
     //論理削除を行う定義
    use SoftDeletes;
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}

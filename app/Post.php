<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   protected $fillable=[
    'shop_name',
    'comment'
    ];
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}

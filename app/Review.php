<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable=[
         'review',
         'shop_id'
         ];
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this::with('shop')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

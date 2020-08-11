<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function comment()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function category()
    {
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'cate_id');
    }


}

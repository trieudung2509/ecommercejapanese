<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_post extends Model
{
    protected $guarded = [];

    public function parent_categories($parent_id) {
        return $this->belongsTo('App\Models\Cate_post','parent_id')->where('id',$parent_id)->select('name')->first();
    }

    public function Post()
    {
        return $this->hasMany(Post::class, 'cate_post_id');
    }
}

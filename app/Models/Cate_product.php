<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_product extends Model
{
    protected $table = 'cate_products';
    protected $guarded = [];
    
    public function parent_categories($parent_id) {
        return $this->belongsTo('App\Models\Cate_product','parent_id')->where('id',$parent_id)->select('name')->first();
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'cate_product_id');
    }
}

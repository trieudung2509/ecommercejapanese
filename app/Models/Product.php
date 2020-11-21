<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
     protected $guarded = [];

    public function Cate_product()
    {
        return $this->belongsTo('App\Models\Cate_product', 'cate_product_id', 'id');
    }

}

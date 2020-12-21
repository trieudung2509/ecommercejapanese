<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cate_product_id',
        'origin',
        'vote',
        'price',
        'sale_price',
        'sale_start_date',
        'sale_end_date',
        'number',
        'position',
        'status',
        'is_home',
        'image',
        'title_seo',
        'meta_key',
        'meta_des',
        'user_create'
    ];

    public function Cate_product()
    {
        return $this->belongsTo('App\Models\Cate_product', 'cate_product_id', 'id');
    }

    /**
     * Get the user that created the product.
     */
    public function userCreate()
    {
        return $this->belongsTo(User::class, 'user_create');
    }

}

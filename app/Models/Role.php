<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = true;
    protected $fillable = ['id','name'];
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_role');
    }
}
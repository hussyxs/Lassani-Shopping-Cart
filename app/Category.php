<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    
    public function products() {
         
        return $this->hasMany('App\Product');
    }
    
    public function types() {
         
        return $this->hasManyThrough('App\Type', 'App\Product');
    }
}

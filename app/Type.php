<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'price'];
    
    public function types() {
         
        return $this->belongsToMany('App\Product');
    }
}

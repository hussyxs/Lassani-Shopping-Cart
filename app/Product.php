<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'description', 'price'];
    
     public function categories() {
         
        return $this->belongsTo('App\Category')->withDefault();
    }
    
    public function types() {
        
        return $this->belongsToMany('App\Type');
    }
    
}

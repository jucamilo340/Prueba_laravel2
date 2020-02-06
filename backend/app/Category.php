<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    //Relacion many to one
    public function CategoryP(){
        return $this->belongTo('App\CategoryP','categoryP_id');

    }

    public function products(){
        return $this->hasMany('App\Product','category_id');
    }
}

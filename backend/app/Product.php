<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    

    //Relacion One to Many
    public function Details(){
        return $this->hasMany('App\Detail'); 
    }
   

    //Relacion many to one
    public function Categoria(){
        return $this->belongsTo('App\Category','category_id');
    }
}

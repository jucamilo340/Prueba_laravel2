<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryP extends Model
{
    //
    protected $table='categories_padres';

    public function categories(){
        // return $this->hasMany('App\Category');
        return $this->hasMany('App\Category','categoryP_id');
    }
}

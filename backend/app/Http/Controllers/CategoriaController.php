<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryP;

class CategoriaController extends Controller
{
    //
    public function ListProducts($id){
        $categoryP=CategoryP::find($id);
        $categorias=$categoryP->categories;
        $products=array();
         foreach ($categorias as $c) {
             foreach($c->products as $product){
                array_push($products,$product);
             }
            
                // $products=( $c->products);
             
            
         }
         return $products;
        
        
    }
}

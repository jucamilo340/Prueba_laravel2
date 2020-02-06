<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //list all produts
    public function getAll(){
        $products=Product::all();
        return json_encode($products);
    }
    //create a product
    public function add(Request $request){
        
        $name=$request->input('name');
        $category_id=$request->input('category_id');
        $description=$request->input('description');
        $price=$request->input('price');
        $weight=$request->input('weight');
        $image_1=$request->file('image_1');
        $image_2=$request->file('image_2');
        $image_3=$request->file('image_3');

        $product=new Product();

        $categorias=Category::all();
        foreach($categorias as $c){
            if($c->name== $category_id){
                $product->category_id=$c->id;
            }
        }
        $product->name=$name;
        $product->description=$description;
        $product->price=$price;
        $product->weight=$weight;

        
        if($image_1){
            $image_1_name=time().$image_1->getClientOriginalName();
            Storage::disk('products')->put($image_1_name,File::get($image_1));
            $product->image_1=$image_1_name;

        }
        if($image_2){
            $image_2_name=time().$image_2->getClientOriginalName();
            Storage::disk('products')->put($image_2_name,File::get($image_2));
            $product->image_2=$image_2_name;

        }
        if($image_3){
            $image_3_name=time().$image_3->getClientOriginalName();
            Storage::disk('products')->put($image_3_name,File::get($image_3));
            $product->image_3=$image_3_name;

        }
        $product->save();  
        
        return $product;

    }
    //find a product with an id
    public function get($id){
        $product=Product::find($id);
        return $product;
    }
    public function getImage($filename)
  {
    $file=Storage::disk('products')->get($filename);
    return new response( $file,200);
  }
    public function delete($id){
        $product=$this->get($id);
        $product->delete();
        return $product;
      }

}

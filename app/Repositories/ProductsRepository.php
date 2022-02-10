<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsRepository{

    public function getPaginated($perPage = 20)
    {
         return (Auth::check())          //check login
         ? Product::where('user_id',Auth::user()->id)->paginate($perPage)  //user's products
         : Product::paginate($perPage);  //all products
    }

    public function getProductBySlug($slug=null)
    {
        return ($slug !== null && is_numeric($slug))? Product::where('slug',$slug)->first():null;
    }

    public function save(Request $request)
    {

        if(isset($request->product_ref)):
           $product = Product::find($request->product_ref);
        else:
           $product = new Product();
        endif;
        
        if(isset($request->image_id))
         $product->image_id     = $request->image_id;

       $product->product_name = $request->name;
       $product->price        = $request->price;
       $product->product_description = $request->description;

       return (isset($request->product_ref))?$product->update():$product->save();

    }

    public function delete($slug)
    {
        return Product::where('slug',$slug)->delete();
    }

    
}

?>
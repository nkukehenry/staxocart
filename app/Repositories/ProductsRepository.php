<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsRepository{

    public function getPaginated($perPage = 20)
    {
        return Product::paginate($perPage);
    }

    public function getProductBySlug($slug=null)
    {
        return ($slug !== null && is_numeric($slug))? Product::where('slug',$slug)->first():null;
    }

    public function save(Request $request)
    {
        

    }

    
}

?>
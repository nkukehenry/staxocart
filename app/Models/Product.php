<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;


     /**
     * populate slug field on creating a product
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $product->setAttribute('slug',$product->createSlug($product->product_name));
            $product->setAttribute('user_id',Auth::user()->id); //set to current user's
        });
    }

    
    /** 
     * create product slug
     *
     * @return slug
     */
    private function createSlug($product_name)
    {
        if (static::whereSlug($slug = Str::slug($product_name))->exists())
           {
            $max = static::whereProductName($product_name)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
           }

        return Str::slug($product_name);
    }

    /*
    Retrieves user related to product
    */
    public function user()
    {
        return $this->belongsTo( User::class);
    }


     /*
      Retrieves image related to product
    */
    public function image()
    {
        return $this->hasOne(Image::class,'id','image_id');
    }


}
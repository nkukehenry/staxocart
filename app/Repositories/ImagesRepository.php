<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImagesRepository{

    
    /*
       Uploads the image to public/images
    */
    public function uploadImage(Request $request){

        
        $fileName = time().Str::random(3).'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $fileName);

        //To do: resize image here
        
        return $this->saveImagePathToDb($fileName);
    }

    /*
         Saves image filename / path to db
    */

    function saveImagePathToDb($fileName)
    {

       $image  = new  Image();
       $image->file_path = $fileName;
       $image->save();

       return $image->id;
    }
    
}

?>
<?php

use Illuminate\Support\Facades\Auth;

/*
 * Returns current logged in user
 */

if( !function_exists('get_user')){
    function get_user(){
        return Auth::user();
    }
}


?>
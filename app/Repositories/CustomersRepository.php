<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersRepository{


    public function save(Request $request){

        $customer = new Customer();
        $customer->email = $request->email;
        $customer->save();

        return $customer;
    }
    

    public function getCustomer($id){
        return Customer::find($id);
    }
    
}

?>
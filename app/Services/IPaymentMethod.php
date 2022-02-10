<?php
namespace App\Services;
use Illuminate\Http\Request;

interface IPaymentMethod {

    public function processPayment(Request $request,$order);

}


?>
<?php
namespace App\Services;
use Illuminate\Http\Request;

interface IPaymentMethod {

    public function processPayment(Object $request,$order,$splitPayment);

}


?>
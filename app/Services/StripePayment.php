<?php
namespace App\Services;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;

class StripePayment implements IPaymentMethod {

    public function processPayment(Request $request,$order){

        $stripe = new Stripe();
        $stripe->setApiKey(env('STRIPE_SECRET'));

        $response = $stripe->charges()->create([
            "source" => $request->stripeToken,
            'currency' => 'USD',
            'amount'   => $order->order_total,
            'description' => 'Staxo Cart Product Payment',
            'receipt_email'=>'henricsanyu@gmail.com',
            'statement_descriptor_suffix'=>'STAXO',
            'metadata'=>['order_id'=>'878989898']
        ]);

        return $response;
    }

}


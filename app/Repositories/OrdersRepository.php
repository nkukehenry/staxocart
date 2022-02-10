<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrdersRepository{

    protected $paymentService;
    public function __construct()
    {

    }
    

    public function save(Request $request,$product)
    {
    
       $order   =  new Order();
       $order->customer_id  = 1;
       $order->order_total  = $product->price * $request->quantity;
       $order->amount_paid  = 0;
       $order->pment_method = 'Stripe';
       $order->payment_reference = '';
       $order->save();

       $this->saveOrderLines( $request, $order,$product);
       return  $order;
    }

    public function saveOrderLines(Request $request,$order,$product){

        $oderLine = new OrderLine();
        
        $oderLine->product_id     = $product->id;
        $oderLine->order_quantity = $request->quantity;
        $oderLine->order_at_price = $product->price;
        $oderLine->order_id       = $order->id;

        $oderLine->save();

    }
}

?>
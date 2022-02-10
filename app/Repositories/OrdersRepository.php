<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersRepository{

    protected $paymentService;
    protected $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    

    public function save(Request $request)
    {
    
      $product = $this->productsRepository->getProductBySlug($request->slug);

       $order   =  new Order();
       $order->customer_id  = 1;
       $order->order_total  = $product->price * $request->quantity;
       $order->amount_paid  = 0;
       $order->pment_method = 'Stripe';
       $order->save();

       $this->saveOrderLines( $order);
    }

    public function saveOrderLines($order){

    }
}

?>
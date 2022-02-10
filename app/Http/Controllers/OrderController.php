<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductsRepository;
use App\Services\IPaymentMethod;


class OrderController extends Controller
{
    
    protected $ordersRepo;
    protected $productsRepo;
    protected $paymentMethod;
    
    public function __construct(OrdersRepository $ordersRepo
          ,ProductsRepository $productsRepo ,IPaymentMethod $paymentMethod)
    {
        $this->ordersRepo    = $ordersRepo;
        $this->productsRepo  = $productsRepo;
        $this->paymentMethod = $paymentMethod;
    }
    
    /**
     * Show the orders page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

     
    }

     /**
     * Show the backend product creation page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function show($slug)
    {

    }

    /**
     * Show the backend order creation page---not in use
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function create()
    {
        //return view('vendor.products.create');
    }

    /**
     * Creates a new order entry
     *  Redirects 'products'
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug'  => 'required',
            'quantity'  => 'required|min:1',
            'email' => 'required'
        ]);
        
        $product = $this->productsRepo->getProductBySlug($request->slug);

        $order = $this->ordersRepo->save($request,$product); 

        return redirect(route('orders.payment', $order->id) );
    }

     /**
     *  Updates a  order entry
     *  Redirects home'
     */
    public function payment($orderId)
    {
        $data['order'] = $this->ordersRepo->getOrderById($orderId);
        return view('catalogue.payment',$data);
    }

    /**
     *  Updates a  order entry
     *  Redirects home'
     */
    public function update(Request $request)
    {

        
    }

    /**
     *  Presents Feedback
     */
    public function pay(Request $request)
    {
        $request->validate([
            'stripeToken'=>'required',
            'order'=>'required'
        ]);
        
        $order   = $this->ordersRepo->getOrderById($request->order);
        $payment = $this->paymentMethod->processPayment($request,$order);

        $data['order'] = $this->ordersRepo->updateOrder($order ,$payment);
    
        Session::flash('success', 'Payment successful!');
        return redirect(route('orders.feedback',$order->id) );
    }


    /**
     *  Presents Feedback
     */
    public function feedback(Request $request)
    {
        $data['order'] = $this->ordersRepo->getOrderById( $request->order_id);
        return view('catalogue.feedback');
    }

}

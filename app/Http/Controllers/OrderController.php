<?php

namespace App\Http\Controllers;

use App\Jobs\PaymentCompletion;
use App\Jobs\SendOrderEmail;
use App\Mails\OrderReceived;
use App\Models\Customer;
use App\Models\Order;
use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductsRepository;
use App\Services\IPaymentMethod;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    
    protected $ordersRepo;
    protected $productsRepo;
    protected $paymentMethod;
    protected $customersRepo;
    
    public function __construct(OrdersRepository $ordersRepo
          ,ProductsRepository $productsRepo ,IPaymentMethod $paymentMethod
          ,CustomersRepository $customersRepo)
    {
        $this->ordersRepo    = $ordersRepo;
        $this->productsRepo  = $productsRepo;
        $this->paymentMethod = $paymentMethod;
        $this->customersRepo = $customersRepo;
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

        $customer = $this->customersRepo->save($request);

        $request['customer_id'] = $customer->id;

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
        
        $request  = (Object) $request->all();

        $order   = $this->ordersRepo->getOrderById($request->order);
        //pay
        $payment = $this->paymentMethod->processPayment($request,$order,false);
        $data['order'] = $this->ordersRepo->updateOrder($order ,$payment);
        $customer = $this->customersRepo->getCustomer($data['order']->customer_id);

        $this->sendEmail($order, $customer);

        Session::flash('success', 'Payment successful!');
        return redirect(route('orders.feedback',$order->id) );
    }


    /**
     *  Split payment Feedback
     */
    public function splitpay(Request $request)
    {
        $request->validate([
            'stripeToken'=>'required',
            'order'=>'required'
        ]);
        
        $request  = (Object) $request->all();
        
        $order   = $this->ordersRepo->getOrderById($request->order);
        $payment = $this->paymentMethod->processPayment($request,$order,true);

        $data['order'] = $this->ordersRepo->updateOrder($order ,$payment);

        $customer = $this->customersRepo->getCustomer($data['order']->customer_id);

        $this->sendEmail($order, $customer);


        $deferPaymentJob =(new PaymentCompletion($request,$this->paymentMethod, $order,$customer)) 
        ->delay(Carbon::now()->addMinutes(5))
        ->onQueue('mails');
        
        dispatch($deferPaymentJob);

        Session::flash('success', 'Payment successful!');
        return redirect(route('orders.feedback',$order->id) );
    }



    private function sendEmail($order, $customer){

        $mailJob =(new SendOrderEmail( $order,$customer)) 
        //->delay(Carbon::now()->addMinutes(5))
        ->onQueue('mails');
        
        dispatch($mailJob);
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

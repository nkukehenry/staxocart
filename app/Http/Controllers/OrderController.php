<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductsRepository;

class OrderController extends Controller
{
    
    protected $ordersRepo;
    protected $productsRepo;
    
    public function __construct(OrdersRepository $ordersRepo,ProductsRepository $productsRepo)
    {
        $this->ordersRepo = $ordersRepo;
        $this->productsRepo = $productsRepo;
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

        $this->ordersRepo->save($request,$product); 
        return redirect(route('orders.feedback') );
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
    public function feedback(Request $request)
    {
        return view('catalogue.feedback');
    }

}

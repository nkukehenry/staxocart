<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;

class HomeController extends Controller
{
    
    protected $productsRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductsRepository $productsRepo)
    {
        $this->middleware('auth');
        $this->productsRepo = $productsRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = $this->productsRepo->getPaginated(15);
        $data['title']    = __('messages.welcome_message');

        return view('catalogue.home',$data);
    }
}
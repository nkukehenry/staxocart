<?php

namespace App\Http\Controllers;

use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productsRepo;
    
    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepo = $productsRepo;
    }
    
    /**
     * Show the frontend products page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {

        $data['products'] = $this->productsRepo->getPaginated(5);
        $data['title']    = trans_choice('product.product', 5);;

        return view('catalogue.home',$data);
    }

     /**
     * Show the backend product creation page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function show($slug)
    {
        $data['product'] = $this->productsRepo->getPaginated(5);
        return view('vendor.products.create',$data);
    }

    /**
     * Show the backend product creation page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function create()
    {
        return view('vendor.products.create');
    }

    /**
     * Creates a new product entry
     *  Redirects 'products'
     */
    public function store(Request $request)
    {
        
    }

    /**
     *  Updates a  product entry
     *  Redirects 'products'
     */
    public function update(Request $request)
    {
        
    }

    /**
     *  Deletes a  product entry
     *  Redirects 'products'
     */
    public function destroy(Request $request)
    {
        
    }
    
    
}
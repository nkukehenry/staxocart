<?php

namespace App\Http\Controllers;

use App\Repositories\ImagesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productsRepo;
    protected $imagesRepo;
    
    public function __construct(ImagesRepository $imagesRepo,ProductsRepository $productsRepo)
    {
        $this->productsRepo = $productsRepo;
        $this->imagesRepo   = $imagesRepo;
    }
    
    /**
     * Show the frontend products page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {

        $data['products'] = $this->productsRepo->getPaginated(10);
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
        $product = $this->productsRepo->getProductBySlug($slug);
        $data['product']  = $product;
        $data['title']    = $product->product_name;
        return view('catalogue.show',$data);
    }

    /**
     * Show the backend product creation page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function create()
    {
        //return view('vendor.products.create');
    }

    /**
     * Creates a new product entry
     *  Redirects 'products'
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1048',
            'name'  => 'required|max:50',
            'price' => 'required',
            'description' => 'required'
        ]);
        
        $request['image_id'] = $this->imagesRepo->uploadImage($request);

        $this->productsRepo->save($request);

        Session::flash('message', __('messages.product_added')); 
        return redirect('vendor');
    }


    /**
     *  Updates a  product entry
     *  Redirects 'products'
     */
    public function update(Request $request)
    {

        $request->validate([
            'name'  => 'required|max:50',
            'price' => 'required',
            'description' => 'required'
        ]);
        
        if($request->image)
         $request['image_id'] = $this->imagesRepo->uploadImage($request);

        $this->productsRepo->save($request);

        Session::flash('message', __('messages.product_updated')); 
        return redirect('vendor');
        
    }

    /**
     *  Deletes a  product entry
     *  Redirects 'products'
     */
    public function destroy($slug)
    {
        $this->productsRepo->delete($slug);
        Session::flash('message', __('messages.product_deleted')); 
        return redirect('vendor');
    
    }
    
    
}
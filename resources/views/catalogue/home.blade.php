@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

    @foreach($products as $prod)
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-card">
       <a href="{{ route('products.show',$prod->slug) }}" class="product-link"> 
        <div class="card">
            <div class="card-img-top" style="background-image:url( {{ asset('images/'.$prod->image->file_path) }} );"  alt="..." >
                
        </div>
            <div class="card-body">
                <h5 class="card-title">{{ $prod->product_name }}</h5>
                <h6 class="text-primary">{{ __('gen.currency_symbol') }} {{ number_format($prod->price) }}</h6>
                <p class="card-text">{{ $prod->product_description }}</p>
                <a href="" class="btn btn-primary buy-btn mt-2">{{ __('product.buy_now') }}</a>
            </div>
        </div>
        </a>
    </div>
    
    @endforeach
    </div>

    {{ $products->links() }}

@endsection

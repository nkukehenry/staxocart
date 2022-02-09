@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

    @foreach($products as $prod)
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-card">
        <div class="card">
                <img class="card-img-top" src="{{ asset('images/'.$prod->image->file_path) }}"  alt="..." >
            <div class="card-body">
                <h5 class="card-title">{{ $prod->product_name }}</h5>
                <h6 class="text-primary">{{ __('gen.currency_symbol') }} {{ number_format($prod->price) }}</h6>
                <p class="card-text">{{ $prod->product_description }}</p>
                <a href="" class="btn btn-primary buy-btn">{{ __('product.buy_now') }}</a>
            </div>
        </div>
    </div>
    
    @endforeach
    </div>

    {{ $products->links() }}

@endsection

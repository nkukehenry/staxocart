@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
            <div class="card mt-2 mb-2 p-4" style="display: flex; flex-direction:row;">
            <div class="col-4">
                <img class="mt-2" width="300px" src="{{ asset('images/'.$product->image->file_path) }}"  alt="..." />
            </div>

            <div class="col-8">
                <h3 class="text-primary">{{ $product->product_name }}</h3>
                <h6 class="text-primary">{{ __('gen.currency_symbol') }} {{ number_format($product->price) }}</h6>
                <p>{{ $product->product_description }}</p>
                <div class=" col-lg-4 col-12">
                  <a href="" class="btn btn-primary buy-btn mt-2">{{ __('product.buy_now') }}</a>
                </div>
            </div>
            </div>
    </div>

@endsection

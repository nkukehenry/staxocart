@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

    @for($i=0; $i < 12; $i++)
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-card">
        <div class="card">
                <img class="card-img-top" src="https://picsum.photos/50/50"  alt="..." >
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="" class="btn btn-primary buy-btn">{{ __('product.buy_now') }}</a>
            </div>
        </div>
    </div>
    @endfor
       

    </div>
@endsection

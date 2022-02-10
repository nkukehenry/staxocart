@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
            <div class="card col-5 mt-2 mb-2 p-4"> 
                
                <div class="col-12">
                    <h5 class="text-success text-center ">Payment successful, We've sent you a confirmation email</h5>
                    
                    <ul class="list-group mt-5">
                        <li class="list-group-item">Amount: 45000 </li>
                        <li class="list-group-item">Payment Method: Stripe</li>
                        <li class="list-group-item">Payment Date: Today </li>
                    </ul>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 mt-4">
                    <a href="{{ route('home') }}" class="btn btn-primary buy-btn mt-2 col-6">{{ __('gen.back_home') }}</a>
                    </div>
                </div>
            </div>
            </div>

@endsection

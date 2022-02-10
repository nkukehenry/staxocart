@extends('layouts.mail')

@section('content')

    <div class="row justify-content-center">
            <div class="card mt-2 mb-2 p-4" style="display: flex; flex-direction:row;">
            <div class="col-8">
                <h2 class="text-primary">Order Received Successfully</h2>
                <h3 class="text-dark">{{ $reference }}</h3>
                <h6 class="text-primary">{{ __('gen.currency_symbol') }} {{ number_format($amount) }}</h6>
            </div>
            </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')

@include('catalogue.partials.add_product_modal')


<div class="row mb-3">
  <div class="col-lg-4 col-12">
     <a href="#add_product" data-bs-toggle="modal" class="btn btn-primary">{{ __('menus.add_product') }}</a>
  </div>
</div>

  <div class="row">
    @foreach($products as $prod)

    @include('catalogue.partials.edit_product_modal')

      <div class="col-lg-6 col-md-12 col-sm-12 col-12  mb-2">
        <div class="card product-list-card">
         <div class="row">
            <div class="col-3 flexed">
                <img class="img img-thumbnail" src="{{ asset('images/'.$prod->image->file_path) }}"  alt="..." >
             </div>
            <div class="col-6 v-flex">
                <h5 class="mt-3">{{ $prod->product_name }}</h5>
                <h6 class="text-bold">{{ __('gen.currency_symbol') }} {{ number_format($prod->price) }}</h6>
                <p>{{ $prod->product_description }}</p>
              </div>
            <div class="col-3">
                <a href="#edit_product{{$prod->slug}}" data-bs-toggle="modal" class="btn btn-link">{{ __('gen.edit') }}</a>
                <a href="" class="btn btn-link text-danger">{{ __('gen.delete') }}</a>
            </div>
        </div>
        </div>
        </div>
    @endforeach
    
</div>

{{ $products->links() }}

@endsection

@extends('layouts.app')

@section('content')

<div class="row">
    
    @for($i=0; $i < 12; $i++)
      <div class=" col-6  mb-2">
        <div class="card product-list-card">
         <div class="row">
            <div class="col-3 flexed ml-2">
                <img class="img img-thumbnail" src="https://picsum.photos/50/50"  alt="..." >
             </div>
            <div class="col-6 v-flex">
                <h5 class="mt-3">Card title</h5>
                <h6 class="text-bold">UGX 45,000</h6>
                <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            <div class="col-3">
                <a href="" class="btn btn-link">{{ __('gen.edit') }}</a>
                <a href="" class="btn btn-link text-danger">{{ __('gen.delete') }}</a>
            </div>
        </div>
        </div>
        </div>
    @endfor
    
</div>

@endsection

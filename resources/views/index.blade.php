@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @for($i=0; $i < 10; $i++) <div class="card product-card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div>
    @endfor


</div>
</div>
@endsection
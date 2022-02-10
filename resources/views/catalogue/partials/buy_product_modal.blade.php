
<div class="modal" id="buy_product{{$prod->slug}}">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-body">
                <form class="row" enctype="multipart/form-data"   method="POST" action="{{ route('orders.checkout') }}">
                        <div class="col-12">    
                        @csrf
                         <h4>{{ __('gen.buying') }} <br> <strong>{{ $prod->product_name }}</strong></h4>
                         <h6 class="text-primary">{{ __('gen.currency_symbol') }} {{ number_format($prod->price) }}</h6>
                
                        <div class="form-group col-6 mt-2">
                            <label for="email" class="col-form-label text-md-end">{{ __('gen.email') }}</label>
                            <input id="email" type="email" placeholder="{{ __('gen.email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                            <input type="hidden" name="slug" value="{{$prod->slug}}" />
                        </div>

                        <div class="form-group col-6 mt-2">
                            <label for="quantity" class="col-form-label text-md-end">{{ __('gen.quantity') }}</label>
                            <input id="quantity" type="number" placeholder="{{ __('gen.quantity') }}" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ ( !empty(old('quantity')))?old('quantity'):1 }}" maxlength="3"  required >
                        </div>

                        </div>

                        <div class="row justify-content-center mt-5">
                            <button type="reset" class="btn btn-dark col-5 m-1" data-bs-dismiss="modal">
                            {{ __('gen.cancel') }}
                        </button>

                        <button type="submit" class="btn btn-success col-5 m-1">
                            {{ __('gen.checkout') }}
                        </button>
                    </div>
                </form>
                    </div>
          </div>
      </div>
  </div>

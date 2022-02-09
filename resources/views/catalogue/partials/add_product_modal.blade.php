
<div class="modal" id="add_product">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">{{ __('menus.add_product')}}</h4>
              <a href="#"  class="btn close" data-bs-dismiss="modal" aria-label="Close">
                <h4>&times;</h4>
               </a>
          </div>
          <div class="modal-body">

                 <form class="row" enctype="multipart/form-data"   method="POST" action="{{ route('products.add') }}">
                    <div class="col-6">    
                        @csrf
                        <div class="form-group col-12 mt-2">
                            <label for="name" class="col-form-label text-md-end">{{ __('product.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('product.name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="price" class="col-form-label text-md-end">{{ __('product.price') }}</label>
                            <input id="price" type="number" placeholder="{{ __('product.price') }}" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price"  required autocomplete="price" autofocus>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="description" class="col-form-label text-md-end">{{ __('gen.description') }}</label>
                            <textarea id="description"  class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('gen.description') }}" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group col-12">
                        <label for="photo" class="col-form-label text-md-end">{{ __('product.image') }}</label>
                        <input id="photo" type="file" name="image">
                    </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                            <button type="reset" class="btn btn-dark col-5 m-1" data-bs-dismiss="modal">
                            {{ __('gen.cancel') }}
                        </button>

                        <button type="submit" class="btn btn-success col-5 m-1">
                            {{ __('gen.submit') }}
                        </button>
                    </div>
                    </form>
          </div>
      </div>
  </div>
               
</div>



<div class="modal" id="add_product">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">

          <form method="POST" action="{{ route('product.add') }}">
                        @csrf
                            <div class="form-group col-12 mt-5">
                                <label for="name" class="col-form-label text-md-end">{{ __('product.name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mt-5">
                                <label for="price" class="col-form-label text-md-end">{{ __('product.price') }}</label>
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"  required autocomplete="price" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="description" class="col-form-label text-md-end">{{ __('gen.description') }}</label>
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" required>value="{{ old('description') }}"</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row justify-content-center mt-5">
                                <button type="submit" class="btn btn-dark col-6">
                                    {{ __('gen.submit') }}
                                </button>
                            </div>
                    </form>

          </div>
      </div>
  </div>
               
</div>


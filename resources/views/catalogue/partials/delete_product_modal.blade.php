
<div class="modal" id="delete_product{{$prod->slug}}">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-body">
                        <h5 class="text-danger">{{ __('product.delete_product')}}</h5>
                          <p>{{ $prod->product_name }}</p>
                        <h4>Are you sure?</h4>

                       <div class="row justify-content-center mt-5">
                            <button type="reset" class="btn btn-dark col-5 m-1" data-bs-dismiss="modal">
                            {{ __('gen.cancel') }}
                        </button>

                        <a href="{{ route('products.delete',$prod->slug) }}"  class="btn btn-danger col-5 m-1">
                            {{ __('gen.yes') }}
                        </a>
                    </div>
          </div>
      </div>
  </div>
               
</div>


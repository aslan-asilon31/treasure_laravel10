
<section class="new-product-outer">
    <div
      class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 gx-4"
    >
    @foreach ($products as $product)
      @foreach ($product->multipleprices as $pmp)
          
    <div class="col-lg">
      <div
        class="media new-product d-flex"
        data-aos="flip-left"
        data-aos-easing="ease-out-cubic"
        data-aos-duration="500"
      >
        <div class="new-product-img-outer bg-pink position-relative">
          <img
            class="new-product-img hover-image position-absolute"
            src="{{ Storage::url('public/products/').$product->image }}"
            alt="" style="transform: rotate(-45deg);width:200px;margin-right:20px;margin-bottom:50px;"
          />
        </div>
        <div class="media-body" style="margin-left:12px;">
          <h5 class="new-product-name text-uppercase mb-1">
            {{ $product->name }}
          </h5>
          <div class="product-rating d-flex">
            <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
            <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
            <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
            <img src="{{asset('frontend/img/star.svg')}}" alt="" />
          </div>
          <div class="d-flex">
            <p class="new-product-price">Rp <s>{{ number_format($pmp->price) }}</s> </p> &nbsp;&nbsp;
            <h5 class="new-product-price" style="color:red">Rp <b>{{ number_format($pmp->total_price) }}</b> </h5>&nbsp;
            <p class="new-product-price" style="background-color:green;color:white;">{{ number_format($pmp->discount) }} % OFF </p>

          </div>
          <p class="new-product-text">Basketball Shoes</p>

            <div class="row" >
              {{-- @foreach ($cartItems as $item) --}}
              @if(Cart::get($product->id) == false)
              <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->name }}" name="name">
                <input type="hidden" value="{{ $pmp->price }}" name="price">
                <input type="hidden" value="{{ $pmp->discount }}" name="discount">
                <input type="hidden" value="{{ $pmp->total_price }}" name="total_price">
                <input type="hidden" value="{{ $product->image }}"  name="image">
                <input type="hidden" value="1" name="quantity">
                <button class="" style="background-color:#483285;color:white;"><i class="fa fa-shopping-cart"></i> Add</button> | 
                <a class="btn-link mb-0" href="{{ route('products.show', $product->id) }}" title="Add to Cart"
                  > <i class="fa fa-eye"></i> Details</a> | 
                <a class="wishlist-product">
                    <i class="far fa-heart"></i> Wishlist</a> | 
                <a class="btn-link mb-0" href="" title="Comments"
                  > <i class="fa fa-comment"></i> Comments (12)</a> 
              </form>
              @else
              <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <button class="" style="background-color:red;color:white;"><i class="fa fa-shopping-cart"></i>delete</button>
                <a class="btn-link mb-0" href="{{ route('products.show', $product->id) }}" title="Add to Cart"
                  > <i class="fa fa-eye"></i> Details</a> | 
                <a class="wishlist-product">
                    <i class="far fa-heart"></i> Wishlist</a> | 
                <a class="btn-link mb-0" href="" title="Comments"
                  > <i class="fa fa-comment"></i> Comments (12)</a>
              </form>
              @endif
                  
              {{-- @endforeach --}}

            </div>

        </div>
      </div>
    </div>
      @endforeach
    @endforeach



    </div>
  </section>
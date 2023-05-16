
<section class="new-product-outer">
    <div
      class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 gx-4"
    >
    @foreach ($products as $product)
    <div class="col-lg">
      <div
        class="media new-product d-flex"
        data-aos="flip-left"
        data-aos-easing="ease-out-cubic"
        data-aos-duration="500"
      >
        <div class="new-product-img-outer bg-pink position-relative">
          <img
            class="new-product-img position-absolute"
            src="{{ Storage::url('public/products/').$product->image }}"
            alt="" style="width:126px;height:126px;margin-right:20px;margin-bottom:50px;"
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
          <p class="new-product-price">Rp {{ number_format($product->price) }}</p>
          <p class="new-product-text">Basketball Shoes</p>

            <div class="row" >
              <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->name }}" name="name">
                <input type="hidden" value="{{ $product->price }}" name="price">
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

            </div>

        </div>
      </div>
    </div>
    @endforeach



    </div>
  </section>
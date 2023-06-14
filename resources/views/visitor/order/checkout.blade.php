@extends('./layouts/frontend/frontend')


@push('css')
<style>
    #cart {
  max-width: 1440px;
  padding-top: 60px;
  margin: auto;
}
.form div {
  margin-bottom: 0.4em;
}
.cartItem {
  --bs-gutter-x: 1.5rem;
}
.cartItemQuantity,
.proceed {
  background: #f4f4f4;
}
.items {
  padding-right: 30px;
}
#btn-checkout {
  min-width: 100%;
}

/* stasysiia.com */
@import url("https://fonts.googleapis.com/css2?family=Exo&display=swap");
body {
  background-color: #fff;
  font-family: "Exo", sans-serif;
  font-size: 22px;
  margin: 0;
  padding: 0;
  color: #111111;
  justify-content: center;
  align-items: center;
}
a {
  color: #0e1111;
  text-decoration: none;
}
.btn-check:focus + .btn-primary,
.btn-primary:focus {
  color: #fff;
  background-color: #111;
  border-color: transparent;
  box-shadow: 0 0 0 0.25rem rgb(49 132 253 / 50%);
}
button:hover,
.btn:hover {
  box-shadow: 5px 5px 7px #c8c8c8, -5px -5px 7px white;
}
button:active {
  box-shadow: 2px 2px 2px #c8c8c8, -2px -2px 2px white;
}

/*PREVENT BROWSER SELECTION*/
a:focus,
button:focus,
input:focus,
textarea:focus {
  outline: none;
}
/*main*/
main:before {
  content: "";
  display: block;
  height: 88px;
}
h1 {
  font-size: 2.4em;
  font-weight: 600;
  letter-spacing: 0.15rem;
  text-align: center;
  margin: 30px 6px;
}
h2 {
  color: rgb(37, 44, 54);
  font-weight: 700;
  font-size: 2.5em;
}
h3 {
  border-bottom: solid 2px #000;
}
h5 {
  padding: 0;
  font-weight: bold;
  color: #92afcc;
}
p {
  color: #333;
  font-family: "Roboto", sans-serif;
  margin: 0.6em 0;
}
h1,
h2,
h4 {
  text-align: center;
  padding-top: 16px;
}
/* yukito bloody */
.back {
  position: relative;
  top: -30px;
  font-size: 16px;
  margin: 10px 10px 3px 15px;
}
.inline {
  display: inline-block;
}

.shopnow,
.contact {
  background-color: #000;
  padding: 10px 20px;
  font-size: 30px;
  color: white;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.5s;
  cursor: pointer;
}
.shopnow:hover {
  text-decoration: none;
  color: white;
  background-color: #c41505;
}
/* for button animation*/
.shopnow span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: all 0.5s;
}
.shopnow span:after {
  content: url("https://badux.co/smc/codepen/caticon.png");
  position: absolute;
  font-size: 30px;
  opacity: 0;
  top: 2px;
  right: -6px;
  transition: all 0.5s;
}
.shopnow:hover span {
  padding-right: 25px;
}
.shopnow:hover span:after {
  opacity: 1;
  top: 2px;
  right: -6px;
}
.ma {
  margin: auto;
}
.price {
  color: slategrey;
  font-size: 2em;
}
#mycart {
  min-width: 90px;
}
#cartItems {
  font-size: 17px;
}
#product .container .row .pr4 {
  padding-right: 15px;
}
#product .container .row .pl4 {
  padding-left: 15px;
}

</style>
@endpush

@section('content')

<div class="wrapper d-flex flex-column">
    <!-- Start Header -->
    <header class="header position-sticky">
      <!-- Start Header Top Part -->
      <div class="header-top-part py-2 d-none d-lg-block">
        <div class="container-xxl">
          <div
            class="row align-items-center justify-content-center justify-content-lg-between"
          >
            <div class="col-auto">
              <ul class="sub-navigation">
                <li><a href="#" title="Guides">Guides</a></li>
                <li><a href="#" title="Terms of Sale">Terms of Sale</a></li>
                <li><a href="#" title="Terms of Use">Terms of Use</a></li>
                <li>
                  <a href="#" title="Privacy & Policy">Privacy & Policy</a>
                </li>
              </ul>
            </div>
            <div class="col-auto">
              <h6>Complimentary Standard Shipping Indonesia Wide</h6>
            </div>
            <div class="col-auto">
              <ul class="sub-navigation">
                <li>
                  <a href="#" title="Login / Register">Login / Register</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End Header Top Part -->
      <!-- Start Navbar Part -->
      <nav class="navbar navbar-expand-lg p-0">
        <div class="container-xxl ">
          <a class="navbar-brand" href="/" title="Aradan "
            ><img class="animate__animated animate__heartBeat animate__infinite	infinite animate__slow" src="{{asset('frontend/img/logo.svg')}}" alt="Aradan "
          /></a>

          <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel"
          >
            <div class="offcanvas-header primary-gradient py-2">
              <a
                class="navbar-brand"
                href="#"
                title="Aradan "
                ><img
                  src="{{asset ('frontend/img/logo.svg') }}"
                  alt="Aradan "
              /></a>
              <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body p-0 ms-lg-auto">
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                  <span class="badge rounded-pill bg-danger"> 20% </span>
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="collection.html"
                    title="Men"
                    >Men</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="src/collection.html" title="Women"
                    >Women</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="src/collection.html" title="Kids"
                    >Kids</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" title="Customise">Customise</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" title="Sale">Sale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" title="Shipping">Shipping</a>
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link" href="#" title="Guides">Guides</a>
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link" href="#" title="Terms of Sale"
                    >Terms of Sale</a
                  >
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link" href="#" title="Terms of Use"
                    >Terms of Use</a
                  >
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link" href="#" title="Privacy & Policy"
                    >Privacy & Policy</a
                  >
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link" href="#" title="Login / Register"
                    >Login / Register</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="d-flex">
            <button class="btn btn-transparent">
              <svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9.58342 1.66675C13.9584 1.66675 17.5001 5.20842 17.5001 9.58342C17.5001 13.9584 13.9584 17.5001 9.58342 17.5001C5.20842 17.5001 1.66675 13.9584 1.66675 9.58342C1.66675 6.50008 3.42508 3.83341 6.00008 2.52508"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18.3334 18.3334L16.6667 16.6667"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              
            </button>
            <a href="{{ route('cart.list') }}" class="btn btn-transparent">
              <svg
                width="24"
                height="20"
                viewBox="0 0 24 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M7.5 6.39167V5.58334C7.5 3.70834 9.31 1.86667 11.56 1.69167C14.24 1.47501 16.5 3.23334 16.5 5.42501V6.57501"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M3.81007 13.8001L4.04007 15.3584C4.26007 16.9917 4.98007 18.3334 9.00007 18.3334H15.0001C19.0201 18.3334 19.7401 16.9917 19.9501 15.3584L20.7001 10.3584C20.9701 8.32508 20.2701 6.66675 16.0001 6.66675H8.00007C3.73007 6.66675 3.03007 8.32508 3.30007 10.3584"
                  stroke="white"
                  stroke-width="1.5"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M15.4955 9.99992H15.5045"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M8.49451 9.99992H8.50349"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span class="text-white" style="font-weight:bolder;">{{ Cart::getTotalQuantity()}}</span> 
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample"
            >
            
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </nav>
      <!-- End Navbar Part -->
    </header>
    <!-- End Header -->

    <!-- Main Content -->
    <main class="main-content flex-grow-1">
      <div class="container-xxl">

        <!-- Start Cart -->


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <main id="cart" style="max-width:960px; margin-top:-200px;">
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
        @endif
        <div class="back" style="margin-bottom:0px;"><a href="/">&#11178; shop</a></div>
        
        <div class="container-fluid">
          <h4 class="bg-red">Your Cart</h4>

            @foreach ($cartItems as $item)
              <div class="row align-items-start">
              <div class="col-12 col-sm-8 items">
                  <!--1-->
                  @foreach ($productdetails as $pd)
                  @if($item->id == $pd->product_id)
                    
                  <div class="cartItem row align-items-start">
                  <div class="col-3 mb-2">
                      <img src="{{ Storage::url('public/products/').$item->attributes->image }}" class=" rounded" alt="Thumbnail" style="width: 100px">
                  </div>
                  <div class="col-5 mb-2">
                      {{-- <h6 class=""> </b> </h6> --}}
                      <b> <input type="text" name="item_name" value="{{ $item->name }}" style="outline: :none; border: 1px solid #fff;" readonly> </b>
                  </div>
                  <div class="col-2 " style="background-color:indigo;color:white;">
                    {{ round($pd->discount * 100) }}% OFF 

                  </div>
                    @foreach ($multipleprices as $pp)
                      @if($item->id == $pp->product_id)
                      <input type="text" style="display: none" value="{{ $pp->product_id }}" name="item_id">
                      <div class="col-lg-12 mb-0 d-flex">
                        {{-- <h6>Price </h6> &nbsp; Rp {{ $pp->price }} &nbsp;&nbsp;  --}}
                        Rp <input type="number" name="price" value="{{ $pp->price }}">
                        <span class="" style=""> X</span>&nbsp;&nbsp; 
                        <p class="cartItemQuantity p-1 text-center ">{{number_format($item->quantity, 0, ',', '.') }}</p> &nbsp;&nbsp; 
                        = &nbsp; Rp <s> {{ $amounts = number_format($item->price*$item->quantity) }}</s> &nbsp; 
                        <h6 class="" >  <b style="color:red;"> 
                              {{-- Rp --}}
                              Rp1 <input type="number" name="total_price" value="{{ $pp->total_price }} ">
                              {{-- Rp222 {{number_format($amounts - $total_discounts) }}  </h6>  --}}
                            </div>
                      @endif
                          
                    @endforeach
                    <div class="col-lg-12 mt-0 d-flex">
                        <h6>description </h6>  &nbsp;
                            
                            <input type="text" name="description" value="{{ $pd->description }}" >
                      @endif
                    @endforeach  
                    </div>

                    <div class="d-flex">
                      <form class="mb-0" action="{{ route('cart.update') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" class="" style="width:5px;" value="{{ $item->id}}" >
                          <input type="text" name="quantity" value="{{ $item->quantity }}" 
                          class=" text-center h-6 text-gray-800 outline-none rounded border border-blue-600" style="width:50px;"/>
                          <button class="" style="background-color:indigo;color:white;">Update</button>
                      </form>
                      <form action="{{ route('cart.remove') }}" method="POST">
                          @csrf
                          <input type="hidden" value="{{ $item->id }}" name="id">
                          <button class="" style="background-color:red;color:white;">delete</button>
                      </form>

                    </div>
                  </div>
                  <hr>
                  <!--1-->
                  <hr>
              </div>
            @endforeach

            <div class="col-12 col-sm-4 p-3 proceed form">
                <div class="row m-0">
                  <div class="col-sm-8 p-0 ">
                      <h6>Total Price</h6>
                  </div>
                  <div class="col-sm-4 p-0">
                    Rp <input id="tax" name="price_total" value="{{Cart::getTotal() }} ">
                  </div>
                </div>
                <div class="row m-0">
                  <div class="col-sm-8 p-0 ">
                      <h6>PPN 1,1%</h6>
                  </div>
                  <div class="col-sm-4 p-0">
                    Rp <input id="tax" name="ppn" value="{{number_format($taxRate = Cart::getTotal() * 0.011, 0, ',', '.') }}">
                  </div>
                </div>
                <hr>
                <div class="row mx-0 mb-2">
                <div class="col-sm-8 p-0 d-inline">
                    <h5>Payment Total</h5>
                </div>
                <div class="col-sm-4 p-0">
                  Rp <input type="number" id="total" name="payment_total" value="{{number_format(Cart::getTotal() - $taxRate, 0, ',', '.')  }}" >
                </div>

                </div>

                {{-- <a href="/orders/checkout"><button class="shopnow" style="background-color:green;color:white;font-size:15px;"><span>Checkout</span> </button></a> --}}
              </div>
              
            </div>
            <button class="mt-3 btn btn-success" id="pay-button">Pay Now</button>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="px-2 py-1 text-sm  ="style="background-color:red;color:white;">Clear Carts</button>
            </form>
        </div>
        </div>
        </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
{{-- Midtrans Payment --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("waiting your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>
{{-- End Midtrans Payment --}}   



      <!--  End Cart-->
    </main>
    <!-- End Main Content -->

  </div>

@endsection

@push('scripts')


@endpush
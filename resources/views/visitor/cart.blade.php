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

        @foreach ($cartItems as $item)

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <main id="cart" style="max-width:960px; margin-top:-200px;">
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
        @endif
        <div class="back"><a href="/">&#11178; shop</a></div>
        <h1>Your Cart</h1>
        <div class="container-fluid">
            <div class="row align-items-start">
            <div class="col-12 col-sm-8 items">
                <!--1-->
                <div class="cartItem row align-items-start">
                <div class="col-3 mb-2">
                    <img src="{{ Storage::url('public/products/').$item->attributes->image }}" class=" rounded" alt="Thumbnail" style="width: 200px; height 200px;">
                </div>
                <div class="col-5 mb-2">
                    <h6 class="">{{ $item->name }}</h6>
                    <p class="pl-1 mb-0">20 x 24</p>
                    <p class="pl-1 mb-0">Matte Print</p>
                </div>
                <div class="col-2">
                    <p class="cartItemQuantity p-1 text-center">1</p>
                </div>
                <div class="col-2">
                    <p id="cartItem1Price">Rp {{ $item->price }}</p>
                </div>
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id}}" >
                    <input type="text" name="quantity" value="{{ $item->quantity }}" 
                    class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                    <button class="" style="background-color:indigo;color:white;">Update</button>
                    </form>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x</button>
                     </form>
                </div>
                <hr>
                <!--1-->
                <hr>
            </div>
            <div class="col-12 col-sm-4 p-3 proceed form">
                <div class="row m-0">
                <div class="col-sm-8 p-0">
                    <h6>Subtotal</h6>
                </div>
                <div class="col-sm-4 p-0">
                    <p id="subtotal">RP {{ Cart::getTotal() }}</p>
                </div>
                </div>
                <div class="row m-0">
                <div class="col-sm-8 p-0 ">
                    <h6>Tax</h6>
                </div>
                <div class="col-sm-4 p-0">
                    <p id="tax">Rp 10%</p>
                </div>
                </div>
                <hr>
                <div class="row mx-0 mb-2">
                <div class="col-sm-8 p-0 d-inline">
                    <h5>Total</h5>
                </div>
                <div class="col-sm-4 p-0">
                    <p id="total">Rp {{ Cart::getTotal() }}</p>
                </div>
                </div>
                <a href="#"><button id="btn-checkout" class="shopnow" style="background-color:indigo;color:white;"><span>Checkout</span></button></a>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="px-6 py-2 text-sm  ="style="background-color:indigo;color:white;">Clear Carts</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        </main>

        @endforeach

<footer class="container">
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
      
      <!--  End Cart-->
    </main>
    <!-- End Main Content -->

    <!-- Start Footer -->
    <footer class="footer">
      <!-- Start Footer Top Part -->
      <div class="footer-top-part py-3">
        <div class="container-xxl">
          <ul class="footer-top-part-listing">
            <li
              data-aos="fade-right"
              data-aos-anchor-placement="center-bottom"
            >
              <img src="{{asset('frontend/img/ic-check.svg')}}" alt="" />Duties and Taxes
              Guaranteed
            </li>
            <li
              data-aos="fade-right"
              data-aos-anchor-placement="center-bottom"
              data-aos-delay="200"
            >
              <img src="{{asset('frontend/img/ic-check.svg')}}" alt="" />Free Express
              Shipping
            </li>
            <li
              data-aos="fade-right"
              data-aos-anchor-placement="center-bottom"
              data-aos-delay="400"
            >
              <img src="{{asset('frontend/img/ic-check.svg')}}" alt="" />Customer Love
            </li>
            <li
              data-aos="fade-right"
              data-aos-anchor-placement="center-bottom"
              data-aos-delay="400"
            >
              <img src="{{asset('frontend/img/ic-check.svg')}}" alt="" />Easy Returns
            </li>
          </ul>
        </div>
      </div>
      <!-- End Footer Top Part -->

      <!-- Start Footer Bottom Part -->
      <div class="footer-bottom-part primary-gradient">
        <div class="container-xxl">
          <div class="row justify-content-between">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="footer-logo-outer mb-3 mb-lg-5">
                <a
                  href="#"
                  class="footer-logo"
                  title="Aradan "
                  data-aos="zoom-in-left"
                >
                  <img
                    src="{{asset('frontend/img/logo-footer.svg')}}"
                    alt="Aradan "
                  />
                </a>
              </div>
              <h5 class="mb-3 mb-lg-5" data-aos="fade-up">
                Complete your style with awesome clothes from us.
              </h5>
              <ul class="social-icons">
                <li
                  data-aos="zoom-in-up"
                  data-aos-anchor-placement="center-bottom"
                >
                  <a href="#" title="Facebook"
                    ><img src="{{asset('frontend/img/ic-facebook.svg')}}" alt="Facebook"
                  /></a>
                </li>
                <li
                  data-aos="zoom-in-up"
                  data-aos-anchor-placement="center-bottom"
                  data-aos-delay="100"
                >
                  <a href="#" title="Instagram"
                    ><img src="{{asset('frontend/img/ic-instagram.svg')}}" alt="Instagram"
                  /></a>
                </li>
                <li
                  data-aos="zoom-in-up"
                  data-aos-anchor-placement="center-bottom"
                  data-aos-delay="200"
                >
                  <a href="#" title="Twitter"
                    ><img src="{{asset('frontend/img/ic-twitter.svg')}}" alt="Twitter"
                  /></a>
                </li>
                <li
                  data-aos="zoom-in-up"
                  data-aos-anchor-placement="center-bottom"
                  data-aos-delay="300"
                >
                  <a href="#" title="LinkedIn"
                    ><img src="{{asset('frontend/img/ic-linkedin.svg')}}" alt="LinkedIn"
                  /></a>
                </li>
              </ul>
            </div>
            <div class="col-lg-8 col-xl-6">
              <div class="row justify-content-between">
                <div
                  class="col-6 col-sm-auto mb-5 mb-md-0"
                  data-aos="fade-left"
                >
                  <h5 class="mb-3 mb-md-4">Company</h5>
                  <ul class="footer-links">
                    <li>
                      <a href="#" title="About">About</a>
                    </li>
                    <li>
                      <a href="#" title="Contact us">Contact us</a>
                    </li>
                    <li>
                      <a href="#" title="Support">Support</a>
                    </li>
                    <li>
                      <a href="#" title="Careers">Careers</a>
                    </li>
                  </ul>
                </div>
                <div
                  class="col-6 col-sm-auto mb-5 mb-md-0"
                  data-aos="fade-left"
                  data-aos-delay="200"
                >
                  <h5 class="mb-3 mb-md-4">Quick Link</h5>
                  <ul class="footer-links">
                    <li>
                      <a href="#" title="Share Location">Share Location</a>
                    </li>
                    <li>
                      <a href="#" title="Orders Tracking">Orders Tracking</a>
                    </li>
                    <li>
                      <a href="#" title="Size Guide">Size Guide</a>
                    </li>
                    <li>
                      <a href="#" title="FAQs">FAQs</a>
                    </li>
                  </ul>
                </div>
                <div
                  class="col-6 col-sm-auto mb-5 mb-md-0"
                  data-aos="fade-left"
                  data-aos-delay="400"
                >
                  <h5 class="mb-3 mb-md-4">Legal</h5>
                  <ul class="footer-links">
                    <li>
                      <a href="#" title="Terms & conditions"
                        >Terms & conditions</a
                      >
                    </li>
                    <li>
                      <a href="#" title="Privacy Policy">Privacy Policy</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Bottom Part -->
    </footer>
    <!-- End Footer -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="video-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
          <div class="modal-video-outer">
            <iframe
              id="video"
              src="https://www.youtube.com/embed/wWY_clozJlU"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>

</script>

@endpush
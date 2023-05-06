@extends('./layouts/frontend/frontend')


@push('css')

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
            <button class="btn btn-transparent">
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
            </button>
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
        <!-- Start main Banner -->
        <section class="main-banner position-relative">
          <h2 class="banner-border-text" data-aos="zoom-in-up">
            THE NEW 2023
          </h2>
          <h1 class="banner-title animate__animated animate__flash animate__infinite infinite animate__slow" data-aos="flip-up" data-aos-delay="500">
            AIR JORDAN
          </h1>
          <figure
            class="figure d-block main-banner-figure mb-0"
            data-aos="fade-up"
          >
            <img
              class="figure-img img-fluid d-block mx-auto mb-0 animate__animated animate__bounce animate__infinite infinite animate__slow"
              src="{{asset('frontend/img/banner-img-lg.png')}}"
              alt=""
            />
          </figure>
          <p class="banner-text" data-aos="fade-up" data-aos-delay="200">
            We know how large objects will act,
          </p>
          <a
            href="src/product.html"
            class="btn btn-primary rounded-0 text-uppercase"
            data-aos="flip-left"
          >
            <span class="text-white">Shop now</span>
          </a>
          <!-- Button trigger modal -->
          <button
            type="button"
            class="btn btn-primary rounded-0 text-uppercase modal-btn"
            data-bs-toggle="modal"
            data-bs-target="#video-modal"
          >
            <img  src="{{ ('frontend/img/ic-play.svg') }}" alt="">
          </button>
        </section>
        <!-- End main Banner -->

        <!-- Start New Product -->
        {{-- @foreach ($products['data'] as $product) --}}
        {{-- <tr> --}}
            {{-- <td>{{ $product['name'] }}</td> --}}
            {{-- <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ implode(', ', $product->sizes) }}</td>
            <td>{{ implode(', ', $product->colors) }}</td>
            <td><img src="{{ $product->image }}" alt="{{ $product->name }}"></td> --}}
        {{-- </tr> --}}

        {{-- {{ $products }} --}}

        {{-- @foreach($products as $p)
        {{ $p->name }} 
    @endforeach --}}
    {{-- @endforeach --}}

        <section class="new-product-outer">
          <div
            class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 gx-4"
          >
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
                    src="{{asset('frontend/img/product-sm-01.png')}}"
                    alt=""
                  />
                </div>
                <div class="media-body">
                  <h5 class="new-product-name text-uppercase mb-1">
                    Air Max pegasus 37
                  </h5>
                  <div class="product-rating d-flex">
                    <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                    <img src="{{asset('frontend/img/star.svg')}}" alt="" />
                  </div>
                  <p class="new-product-price">$189</p>
                  <p class="new-product-text">Women’s Running shoe</p>
                  <a class="btn-link mb-0" href="#" title="Add to Cart"
                    >Add to Cart</a
                  >
                </div>
              </div>
            </div>
            <div class="col-lg">
              <div
                class="media new-product d-flex"
                data-aos="flip-left"
                data-aos-easing="ease-out-cubic"
                data-aos-duration="500"
                data-aos-delay="200"
              >
                <div
                  class="new-product-img-outer bg-indigo position-relative"
                >
                  <img
                    class="new-product-img position-absolute"
                    src="{{asset('frontend/img/product-sm-02.png')}}"
                    alt=""
                  />
                </div>
                <div class="media-body">
                  <h5 class="new-product-name text-uppercase mb-1">
                    Air Max pegasus 37
                  </h5>
                  <div class="product-rating d-flex">
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star.svg') }}" alt="" />
                  </div>
                  <p class="new-product-price">$189</p>
                  <p class="new-product-text">Women’s Running shoe</p>
                  <a class="btn-link mb-0" href="#" title="Add to Cart"
                    >Add to Cart</a
                  >
                </div>
              </div>
            </div>
            <div class="col-lg">
              <div
                class="media new-product d-flex"
                data-aos="flip-left"
                data-aos-easing="ease-out-cubic"
                data-aos-duration="500"
                data-aos-delay="400"
              >
                <div class="new-product-img-outer bg-green position-relative">
                  <img
                    class="new-product-img position-absolute"
                    src="{{asset('frontend/img/product-sm-03.pn') }}g"
                    alt=""
                  />
                </div>
                <div class="media-body">
                  <h5 class="new-product-name text-uppercase mb-1">
                    Air Max pegasus 37
                  </h5>
                  <div class="product-rating d-flex">
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star.svg') }}" alt="" />
                  </div>
                  <p class="new-product-price">$189</p>
                  <p class="new-product-text">Women’s Running shoe</p>
                  <a class="btn-link mb-0" href="#" title="Add to Cart"
                    >Add to Cart</a
                  >
                </div>
              </div>
            </div>
            <div class="col-lg">
              <div
                class="media new-product d-flex"
                data-aos="flip-left"
                data-aos-easing="ease-out-cubic"
                data-aos-duration="500"
                data-aos-delay="600"
              >
                <div
                  class="new-product-img-outer bg-dark-blue position-relative"
                >
                  <img
                    class="new-product-img position-absolute"
                    src="{{asset('frontend/img/product-sm-04.png') }}"
                    alt=""
                  />
                </div>
                <div class="media-body">
                  <h5 class="new-product-name text-uppercase mb-1">
                    Air Max pegasus 37
                  </h5>
                  <div class="product-rating d-flex">
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star-a.svg') }}" alt="" />
                    <img src="{{asset('frontend/img/star.svg') }}" alt="" />
                  </div>
                  <p class="new-product-price">$189</p>
                  <p class="new-product-text">Women’s Running shoe</p>
                  <a class="btn-link mb-0" href="#" title="Add to Cart"
                    >Add to Cart</a
                  >
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End New Product -->

        <!-- Start Popular Picks -->
        @include('./visitor/partials/popular')
        <!--  End Popular Picks -->

        <!-- Start About the Brand-->
        @include('./visitor/partials/about')
        <!--  End About the Brand-->
      </div>

      <!-- Start Payday sale now-->
      @include('./visitor/partials/payday')        
      <!-- End Payday sale now -->

      <!-- Start Explore more categories-->
      @include('./visitor/partials/category')        
      <!--  End Explore more categories-->

      <!-- Start Review-->
      @include('./visitor/partials/review')        
      <!--  End Review-->

      <!-- Start Quick Questions to ask-->
      @include('./visitor/partials/question')        
      <!--  End Quick Questions to ask-->

      <!-- Start Follow products on Instagram-->
      @include('./visitor/partials/follow')        
      <!--  End Follow products on Instagram-->
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
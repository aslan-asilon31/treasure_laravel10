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
                <li><a href="#" title="Guides">Terms</a></li>
              </ul>
            </div>
            <div class="col position-relative overflow-hidden d-flex justify-content-center">
              <h6>
                See latest <a href="#" title="Discounts">Discounts</a> - Up to 40%OFF
              </h6>
            </div>
            <div class="col-auto">
              <ul class="sub-navigation justify-content-end">
                <li>
                  <a href="/sign-in.html" title="Login / Register">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End Header Top Part -->
      <!-- Start Navbar Part -->
      <nav class="navbar navbar-expand-lg p-0">
        <div class="container-xxl">
          <a class="navbar-brand" href="/" title="Fashion Template by AppSeed"
            ><img src="{{ asset('frontend/img/logo.svg') }}" alt="Fashion Template by AppSeed"
          /></a>
    
          <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel"
          >
            <div class="offcanvas-header primary-gradient py-2">
              <a class="navbar-brand" href="#" title="Fashion Template by AppSeed"
                ><img src="{{asset('frontend/img/logo.svg')}}" alt="Fashion Template by AppSeed"
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
                  <a class="nav-link" href="collection.html" title="Women">Women</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="collection.html" title="Kids">Kids</a>
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
                  <a class="nav-link" href="#" title="Terms of Use">Terms of Use</a>
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
              <section class="pdp-banner position-relative">
                <div class="swiper one-item-slider">
                  <div class="swiper-wrapper">

                    @foreach ($product->galleries()->get() as $pg)
                    <div class="swiper-slide text-center">
                      <img
                        src="{{ Storage::url('public/galleries/').$pg->image }}"
                        class="text-center" alt="Banner image" style="width:530px;height:530px;"
                      />
                    </div>
                    @endforeach

                  </div>
    
                  <div
                    class="d-inline-flex align-content-center swiper-button-outer"
                  >
                    <div class="swiper-button-prev me-2">
                      <svg
                        width="26"
                        height="22"
                        viewBox="0 0 26 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M25.96 10.6587C25.96 11.2561 25.516 11.7498 24.9401 11.8279L24.78 11.8387L4.03713 11.8378L11.5309 19.3009C11.9927 19.7607 11.9943 20.5079 11.5345 20.9697C11.1165 21.3895 10.461 21.429 9.99831 21.0873L9.86572 20.9733L0.347049 11.4955C0.286175 11.4349 0.233302 11.3693 0.188428 11.3C0.175753 11.2792 0.162851 11.2579 0.150619 11.2361C0.139369 11.2174 0.129202 11.1981 0.119611 11.1785C0.10629 11.15 0.0932743 11.1206 0.0814576 11.0905C0.0718559 11.0674 0.0638389 11.0448 0.0565262 11.0221C0.0478324 10.994 0.0393856 10.964 0.0321199 10.9335C0.0267183 10.9123 0.0224404 10.8918 0.0187089 10.8712C0.0134615 10.8407 0.00899498 10.809 0.00580804 10.777C0.00305628 10.7526 0.00139997 10.7284 0.000484449 10.7042C0.00024782 10.6895 -4.97103e-05 10.6741 -4.97103e-05 10.6587L0.000541466 10.613C0.00144598 10.5898 0.00302769 10.5667 0.00528888 10.5436L-4.97103e-05 10.6587C-4.97103e-05 10.5842 0.00684762 10.5114 0.0200383 10.4408C0.0230973 10.4239 0.0267424 10.4066 0.0307785 10.3893C0.0391608 10.3538 0.0488475 10.3196 0.0600012 10.2861C0.0654758 10.2694 0.0718533 10.2516 0.0786698 10.2339C0.0924591 10.1984 0.107447 10.1646 0.123935 10.1316C0.131595 10.1161 0.140174 10.0999 0.149158 10.0838C0.163904 10.0576 0.179095 10.0327 0.195159 10.0084C0.206492 9.99123 0.219042 9.97334 0.232148 9.95574L0.24236 9.94214C0.274151 9.90061 0.308639 9.86125 0.345564 9.82432L0.34698 9.82323L9.86565 0.343888C10.3274 -0.115975 11.0746 -0.114428 11.5344 0.347343C11.9525 0.767136 11.9892 1.42276 11.6455 1.884L11.531 2.01611L4.04027 9.47776L24.78 9.47871C25.4317 9.47871 25.96 10.007 25.96 10.6587Z"
                          fill="#113869"
                        />
                      </svg>
                    </div>
                    <div class="swiper-button-next">
                      <svg
                        width="26"
                        height="22"
                        viewBox="0 0 26 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M0 10.6587C0 11.2561 0.443922 11.7498 1.01988 11.8279L1.18 11.8387L21.9228 11.8378L14.4291 19.3009C13.9673 19.7607 13.9656 20.5079 14.4255 20.9697C14.8435 21.3895 15.499 21.429 15.9616 21.0873L16.0942 20.9733L25.6129 11.4955C25.6738 11.4349 25.7267 11.3693 25.7715 11.3C25.7842 11.2792 25.7971 11.2579 25.8093 11.2361C25.8206 11.2174 25.8308 11.1981 25.8403 11.1785C25.8537 11.15 25.8667 11.1206 25.8785 11.0905C25.8881 11.0674 25.8961 11.0448 25.9034 11.0221C25.9121 10.994 25.9206 10.964 25.9278 10.9335C25.9332 10.9123 25.9375 10.8918 25.9413 10.8712C25.9465 10.8407 25.951 10.809 25.9542 10.777C25.9569 10.7526 25.9586 10.7284 25.9595 10.7042C25.9597 10.6895 25.96 10.6741 25.96 10.6587L25.9594 10.613C25.9585 10.5898 25.9569 10.5667 25.9547 10.5436L25.96 10.6587C25.96 10.5842 25.9531 10.5114 25.9399 10.4408C25.9369 10.4239 25.9332 10.4066 25.9292 10.3893C25.9208 10.3538 25.9111 10.3196 25.9 10.2861C25.8945 10.2694 25.8881 10.2516 25.8813 10.2339C25.8675 10.1984 25.8525 10.1646 25.836 10.1316C25.8284 10.1161 25.8198 10.0999 25.8108 10.0838C25.7961 10.0576 25.7809 10.0327 25.7648 10.0084C25.7535 9.99123 25.7409 9.97334 25.7278 9.95574L25.7176 9.94214C25.6858 9.90061 25.6513 9.86125 25.6144 9.82432L25.613 9.82323L16.0943 0.343888C15.6325 -0.115975 14.8854 -0.114428 14.4255 0.347343C14.0075 0.767136 13.9708 1.42276 14.3145 1.884L14.429 2.01611L21.9197 9.47776L1.18 9.47871C0.528304 9.47871 0 10.007 0 10.6587Z"
                          fill="#113869"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </section>
              <!-- End main Banner -->
    
              <!-- Start AIR MAX APOCLYPSE 2018 -->
              <section class="max-apoclypse">
                <div
                  class="d-flex justify-content-between max-apoclypse-heading-outer align-items-center"
                >
                  <div class="max-apoclypse-heading">
                    @foreach ($product as $p)
                    <h2 class="max-apoclypse-heading-title" data-aos="fade-down">
                      {{ $product->name }}
                    </h2>
                    @endforeach
                    <p
                      class="max-apoclypse-heading-text d-flex align-items-center"
                      data-aos="fade-down"
                      data-aos-delay="200"
                    >
                      Soft, Comfortable, high end smooth New addition of 2018
                      <span class="badge bg-success ms-4">OPEN</span>
                    </p>
                  </div>
                  <a
                    href="#"
                    class="like-btn"
                    data-aos="zoom-in"
                    data-aos-delay="400"
                  >
                    <img src="{{asset('frontend/img/ic-like.svg')}}" alt="" class="normal-img" />
                    <img src="{{asset('frontend/img/ic-like-a.svg')}}" alt="" class="active-img" />
                  </a>
                </div>
                <div
                  class="product-details"
                  data-aos="zoom-out"
                  data-aos-delay="200"
                >
                  <div
                    class="d-lg-flex align-items-center justify-content-lg-between"
                  >
                    <div
                      class="star-rating d-flex mb-4 mb-lg-0 justify-content-md-start justify-content-center"
                    >
                      <div class="product-rating d-flex me-2">
                        <img class="me-1" src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                        <img class="me-1" src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                        <img class="me-1" src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                        <img class="me-1" src="{{asset('frontend/img/star-a.svg')}}" alt="" />
                        <img src="{{asset('frontend/img/star-h.svg')}}" alt="" />
                      </div>
                      <p class="star-rating-text mb-0">
                        4.6 star rating <span> |</span> See 7 Reviews
                      </p>
                    </div>
    
                    <div class="d-md-flex">
                      <div
                        class="d-flex justify-content-center justify-content-lg-start"
                      >
                        <select
                          class="form-select me-2 rounded-0"
                          aria-label="Default select example"
                        >
                          <option selected>M</option>
                          <option value="1">S</option>
                          <option value="2">M</option>
                          <option value="2">L</option>
                          <option value="3">Xl</option>
                          <option value="3">XXL</option>
                        </select>
                        <div
                          class="number-of-item d-flex align-items-center position-relative"
                        >
                          <a
                            href="#"
                            title=""
                            class="number-btn minus position-relative text-decoration-none"
                            onclick="minusNo()"
                          >
                            -
                          </a>
                          <input
                            class="form-control text-center bg-transparent rounded-0 px-1"
                            id="quantity"
                            type="text"
                            name="number"
                            value="1"
                          />
                          <a
                            href="#"
                            title=""
                            class="number-btn position-relative plus border-0 text-decoration-none"
                            onclick="plusNo()"
                          >
                            +
                          </a>
                        </div>
                        <span class="price">$7,852.00</span>
                      </div>
                      <a
                        href="#"
                        title="Add to cart"
                        role="button"
                        class="btn btn-primary d-block d-inline-md-flex cart-btn rounded-0 mt-4 mt-md-0"
                        data-aos="flip-left"
                      >
                        <span class="text-uppercase text-nowrap">Add to cart</span>
                      </a>
                    </div>
                  </div>
                </div>
    
                <ul class="nav nav-tabs product-future-list justify-content-md-end" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a
                      href="#descripton-tab-pane"
                      title="description"
                      class="product-future-item position-relative text-decoration-none active"
                      data-aos="fade-left"
                      data-bs-toggle="tab"
                    >
                      <img src="{{asset('frontend/img/ic-description.svg')}}" alt="" />
                      <p class="product-future-text text-uppercase">
                        Description
                      </p>
                      <img
                        class="icon position-absolute"
                        src="{{asset('frontend/img/ic-up-arrow.svg')}}"
                        alt=""
                      />
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      href="#specification-tab-pane"
                      title="Product Specifications"
                      class="product-future-item position-relative text-decoration-none"
                      data-aos="fade-left"
                      data-aos-delay="200"
                      data-bs-toggle="tab"
                    >
                      <img src="{{asset('frontend/img/ic-specifications.svg')}}" alt="" />
                      <p class="product-future-text text-uppercase">
                        Specifications
                      </p>
                      <img
                        class="icon position-absolute"
                        src="{{asset('frontend/img/ic-up-arrow.svg')}}')}}"
                        alt=""
                      />
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      href="#reviews-tab-pane"
                      title="Reviews"
                      class="product-future-item position-relative text-decoration-none"
                      data-aos="fade-left"
                      data-aos-delay="400"
                      data-bs-toggle="tab"
                    >
                      <img src="{{asset('frontend/img/ic-reviews.svg')}}" alt="" />
                      <p class="product-future-text text-uppercase">Reviews</p>
                      <img
                        class="icon position-absolute"
                        src="{{asset('frontend/img/ic-up-arrow.svg')}}"
                        alt=""
                      />
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      href="#delivery-tab-pane"
                      title="Delivery Charges & Returns"
                      class="product-future-item position-relative text-decoration-none"
                      data-aos="fade-left"
                      data-aos-delay="600"
                      data-bs-toggle="tab"
                    >
                      <img src="{{asset('frontend/img/ic-delivery.svg')}}" alt="" />
                      <p class="product-future-text text-uppercase">
                        Delivery
                      </p>
                      <img
                        class="icon position-absolute"
                        src="{{asset('frontend/img/ic-up-arrow.svg')}}"
                        alt=""
                      />
                    </a>
                  </li>
                </ul>
                <div class="tab-content pb-4 pb-md-5" id="myTabContent">
                  <div class="tab-pane fade show active" id="descripton-tab-pane" role="tabpanel" aria-labelledby="descripton-tab" tabindex="0">
                    <h5>Description</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, accusantium laudantium ad doloremque tenetur voluptates voluptas quidem sed labore earum, ex autem doloribus dignissimos. Vitae quis alias at voluptas nulla error quaerat doloribus ex sunt? Nobis sit, hic non earum similique consectetur accusamus deleniti ducimus voluptates quam amet suscipit quo veritatis pariatur ratione, aliquam, ab minus? Totam ex obcaecati fuga, doloribus architecto molestiae ut rerum nihil numquam quas? Corporis, laudantium iure cupiditate ipsam rerum iusto aliquid quis tempora reprehenderit nemo aut praesentium repellat quos esse fuga assumenda! Illo veniam ipsam sit, similique nesciunt deleniti soluta quae natus eos ex aliquid!</p>
                  </div>
                  <div class="tab-pane fade" id="specification-tab-pane" role="tabpanel" aria-labelledby="specification-tab" tabindex="0">
                    <h5>Specifications</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, accusantium laudantium ad doloremque tenetur voluptates voluptas quidem sed labore earum, ex autem doloribus dignissimos. Vitae quis alias at voluptas nulla error quaerat doloribus ex sunt? Nobis sit, hic non earum similique consectetur accusamus deleniti ducimus voluptates quam amet suscipit quo veritatis pariatur ratione, aliquam, ab minus? Totam ex obcaecati fuga, doloribus architecto molestiae ut rerum nihil numquam quas? Corporis, laudantium iure cupiditate ipsam rerum iusto aliquid quis tempora reprehenderit nemo aut praesentium repellat quos esse fuga assumenda! Illo veniam ipsam sit, similique nesciunt deleniti soluta quae natus eos ex aliquid!</p>
                  </div>
                  <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                    <h5>Reviews</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, accusantium laudantium ad doloremque tenetur voluptates voluptas quidem sed labore earum, ex autem doloribus dignissimos. Vitae quis alias at voluptas nulla error quaerat doloribus ex sunt? Nobis sit, hic non earum similique consectetur accusamus deleniti ducimus voluptates quam amet suscipit quo veritatis pariatur ratione, aliquam, ab minus? Totam ex obcaecati fuga, doloribus architecto molestiae ut rerum nihil numquam quas? Corporis, laudantium iure cupiditate ipsam rerum iusto aliquid quis tempora reprehenderit nemo aut praesentium repellat quos esse fuga assumenda! Illo veniam ipsam sit, similique nesciunt deleniti soluta quae natus eos ex aliquid!</p>
                  </div>
                  <div class="tab-pane fade" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab" tabindex="0">
                    <h5>Delivery</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, accusantium laudantium ad doloremque tenetur voluptates voluptas quidem sed labore earum, ex autem doloribus dignissimos. Vitae quis alias at voluptas nulla error quaerat doloribus ex sunt? Nobis sit, hic non earum similique consectetur accusamus deleniti ducimus voluptates quam amet suscipit quo veritatis pariatur ratione, aliquam, ab minus? Totam ex obcaecati fuga, doloribus architecto molestiae ut rerum nihil numquam quas? Corporis, laudantium iure cupiditate ipsam rerum iusto aliquid quis tempora reprehenderit nemo aut praesentium repellat quos esse fuga assumenda! Illo veniam ipsam sit, similique nesciunt deleniti soluta quae natus eos ex aliquid!</p>
                  </div>
                </div>
              </section>
              <!-- End AIR MAX APOCLYPSE 2018 -->
            </div>
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
                        title="Fashion Template by AppSeed"
                        data-aos="zoom-in-left"
                      >
                        <img
                          src="{{asset('frontend/img/logo-footer.svg')}}"
                          alt="Fashion Template by AppSeed"
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
@endsection

@push('scripts')
<script>

</script>

@endpush
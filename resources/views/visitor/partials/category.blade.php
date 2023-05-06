<section class="explore-categories">
    <div class="container-xxl">
      <h2
        class="explore-categories-title text-center text-generator"
        data-aos="fade-up"
      >
        Explore more categories
      </h2>
    </div>
    <div class="swiper auto-width-slider">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->

        @foreach ($categories as $category)
        <div
          class="swiper-slide"
          data-aos="zoom-in-down"
          data-aos-duration="1000"
          data-aos-delay="200">
          <div class="explore-categories-card">
            <img
              class="explore-categories-card-img"
              src="{{ Storage::url('public/categories/').$category->image }}"
              alt="" style="width:260px; height:411px"
            />
            <a
              class="categories-card-body position-relative d-block"
              href="#"
              title="Hoodies & Sweetshirt"
            >
              <span class="categories-card-body-title d-block"
                >{{ $category->name }}</span
              >
              <span class="categories-card-body-text d-block"
                >Explore Now!</span
              >
            </a>
          </div>
        </div>
        @endforeach


        
      </div>
    </div>
  </section>
@extends('adminlte::page')

@section('title', 'Product Detail')

@section('content')
@include('sweetalert::alert')

{{-- @foreach ($products->productdetails()->get() as $pg) --}}
{{-- {{ dd($pg->name) }} --}}
{{-- @endforeach --}}
  <!-- Default box -->
  <div class="card card-solid " style="background: linear-gradient(to right, #6366F1, #3B82F6, #EC4899);">
    <div class="card-body">
      <div class="" style="display:flex;">
        <div class="row" style="display: block;">
          <div class="col-12">
            <h4 class="d-inline-block d-sm-none ">aaa</h4>
            <div class="col-6">
              <img style="width: 250px;" src="{{ Storage::url('public/products/').$products->image }}" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs ">
              {{-- <div class="product-image-thumb active"><img src="{{ asset('backend/dist/img/prod-1.jpg') }}" style="" alt="Product Image"></div> --}}
              @foreach ($products->productimages()->get() as $ppi)
              <div class="product-image-thumb" ><img src="{{ Storage::url('public/productimages/').$ppi->image }}" class="rounded" style="width: 70px"></div>
              @endforeach
              {{-- <div class="product-image-thumb" ><img src="{{ Storage::url('public/products/').$products->image }}" class="rounded" style="width: 70px"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-2.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-3.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-4.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-5.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-5.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-5.jpg') }}" style="" alt="Product Image"></div> --}}
              {{-- <div class="product-image-thumb" ><img src="{{ asset('backend/dist/img/prod-5.jpg') }}" style="" alt="Product Image"></div> --}}
            </div>
          </div>

        </div>
        <div class="col-12 col-sm-6">
          <h5 class="my-1 text-white">{{ $products->name }}</h5>
          <p class=" text-white">
            4.5 
            <i class="fa fa-star text-white">
            </i> &nbsp;&nbsp;&nbsp; <u>comments(340)</u> &nbsp;&nbsp;&nbsp; 
          </p>
          <span style="color:white;" class="mt-0 my-0 ">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</span>

          <hr>
          <div class="row" style="color:white;">
              <div class="col-sm-3" style="">
                <h6> <b>Colors :</b> </h6>
                <div class="">
                  <select class="form-control" id="location">
                    <option value="" > <b>Green</b></option>
                    <option value="">Red</option>
                    <option value="">Blue</option>
                    <option value="">yellow</option>
                  </select>
                </div>
              </div>
              &nbsp;&nbsp;&nbsp;
              <div class="col-sm-4" style="">
                <h6 class="mt-0"> <b>Size</b> </h6>
                <div class="">
                  <select class="form-control" id="location">
                    <option value="" > <b>45</b> &nbsp;&nbsp;&nbsp;</option>
                    <option value="">45</option>
                    <option value="">44</option>
                    <option value="">43</option>
                    <option value="">42</option>
                    <option value="">41</option>
                    <option value="">40</option>
                    <option value="">39</option>
                    <option value="">38</option>
                    <option value="">37</option>
                    <option value="">36</option>
                    <option value="">35</option>
                  </select>
                </div> 
              </div> 

              <div class="col-sm-4" >
                <div class=" d-flex text-sm">Shipping :</div>
                <div class=""><img src="{{ asset('shipping-car.png') }}" style="width:50px;height:30px" alt=""> <small>Free Shipping</small></div>
                  <select class="form-control" id="location">
                    <option value="" style="font-size:small;">Select location</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="bandung">Bandung</option>
                    <option value="sumatra">Sumatra</option>
                  </select>
                  <select class="form-control" id="location">
                    <option value="" style="font-size:small;">Shipping fee</option>
                    <option value="">regular (Rp 15.000) : will be received on 28th May-30th June </option>
                    <option value="">instant (Rp 25.000) - 2 hours : will be received on 28th May-29th May</option>
                    <option value="">next day (Rp 20.000): will be received on 28th May-29th May</option>
                  </select>
              </div>
          </div>


          <div class="bg-indigo py-1 px-2 mt-4">
            <p class="d-block mb-0">
              <span style="font-size:12px;"><s>Rp 1.000.000</s> </span> <span style="font-size:16px;color:red; font-weight:bolder">Rp {{ $products->price }}</span> <small class="bg-red">75% OFF </small>
            </p>
          </div>

          <div class=" row ml-0 mt-2 " style="">
            <div class="btn bg-indigo btn-sm btn-flat" style="width: 150px;">
              <i class="fas fa-cart-plus fa-sm mr-2"></i>
              Add to Cart
            </div>

            <div class="btn ml-2 bg-indigo btn-sm btn-flat" style="width: 150px;">
              <i class="fas fa-heart fa-sm mr-2"></i>
              Add to Wishlist
            </div>

            <div style="display:flex;width:150px;">
              <a href="#" class="ml-1 text-indigo" >
                <i class="fab fa-facebook-square " style="font-size: 2rem;"></i>
              </a>
              <a href="#" class="ml-1 text-indigo" >
                <i class="fab fa-twitter-square" style="font-size: 2rem;"></i>
              </a>
              <a href="#" class="ml-1 text-indigo" >
                <i class="fab fa-whatsapp-square" style="font-size: 2rem;"></i>
              </a>
              <a href="#" class="ml-1 text-indigo" >
                <i class="fab fa-instagram-square" style="font-size: 2rem;"></i>
              </a>
              <a href="#" class="ml-1 text-indigo" >
                <i class="fas fa-share-square" style="font-size: 2rem;"></i>
              </a>

            </div>


          </div>



        </div>
      </div>
      <div class="row mt-0">
        <nav class="w-100" >
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active  text-bold" style="color:white" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
            <a class="nav-item nav-link  text-bold" style="color:white" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
            <a class="nav-item nav-link  text-bold" style="color:white" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent" style="color:white;">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
          <div class="tab-pane text-black fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
          <div class="tab-pane text-black fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


@stop

@section('css')
<style>
    /* modal activity log */
    .activity-feed {
  padding: 15px;
  list-style: none;

  .feed-item {
    position: relative;
    padding-bottom: 20px;
    padding-left: 30px;
    border-left: 2px solid #e4e8eb;

    &:last-child {
      border-color: transparent;
    }

    &::after {
      content: "";
      display: block;
      position: absolute;
      top: 0;
      left: -6px;
      width: 10px;
      height: 10px;
      border-radius: 6px;
      background: #fff;
      border: 1px solid @brand-secondary;
    }

    .date {
      display: block;
      position: relative;
      top: -5px;
      color: #8c96a3;
      text-transform: uppercase;
      font-size: 13px;
    }
    .text {
      position: relative;
      top: -3px;
    }
  }
}
</style>
<style>
    /*left right modal*/
.modal.left_modal, .modal.right_modal{
  position: fixed;
  z-index: 99999;
}
.modal.left_modal .modal-dialog,
.modal.right_modal .modal-dialog {
  position: fixed;
  margin: auto;
  width: 32%;
  height: 100%;
  -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
       -o-transform: translate3d(0%, 0, 0);
          transform: translate3d(0%, 0, 0);
}

.modal-dialog {
    /* max-width: 100%; */
    margin: 1.75rem auto;
}
@media (min-width: 576px)
{
.left_modal .modal-dialog {
    max-width: 100%;
}

.right_modal .modal-dialog {
    max-width: 100%;
}
}
.modal.left_modal .modal-content,
.modal.right_modal .modal-content {
  /*overflow-y: auto;
    overflow-x: hidden;*/
    height: 100vh !important;
}

.modal.left_modal .modal-body,
.modal.right_modal .modal-body {
  padding: 15px 15px 30px;
}

/*.modal.left_modal  {
    pointer-events: none;
    background: transparent;
}*/

.modal-backdrop {
    display: none;
}

/*Left*/
.modal.left_modal.fade .modal-dialog{
  left: -50%;
  -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
  -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
  -o-transition: opacity 0.3s linear, left 0.3s ease-out;
  transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.left_modal.fade.show .modal-dialog{
  left: 0;
  box-shadow: 0px 0px 19px rgba(0,0,0,.5);
}

/*Right*/
.modal.right_modal.fade .modal-dialog {
  right: -50%;
  -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
     -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
       -o-transition: opacity 0.3s linear, right 0.3s ease-out;
          transition: opacity 0.3s linear, right 0.3s ease-out;
}



.modal.right_modal.fade.show .modal-dialog {
  right: 0;
  box-shadow: 0px 0px 19px rgba(0,0,0,.5);
}

/* ----- MODAL STYLE ----- */
.modal-content {
  border-radius: 0;
  border: none;
}



.modal-header.left_modal, .modal-header.right_modal {

  padding: 10px 15px;
  border-bottom-color: #EEEEEE;
  background-color: #FAFAFA;
}

.modal_outer .modal-body {
    /*height:90%;*/
    overflow-y: auto;
    overflow-x: hidden;
    height: 91vh;
}
</style>

<style>


    /* right modal*/
 .modal.right_modal{
  position: fixed;
  z-index: 99999;
}
.modal.right_modal .modal-dialog {
  position: fixed;
  margin: auto;
  width: 22%;
  height: 100%;
  -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
       -o-transform: translate3d(0%, 0, 0);
          transform: translate3d(0%, 0, 0);
}

.modal-dialog {
    /* max-width: 100%; */
    margin: 1.75rem auto;
}
@media (min-width: 576px)
{


.right_modal .modal-dialog {
    max-width: 100%;
}
}
.modal.right_modal .modal-content {
  /*overflow-y: auto;
    overflow-x: hidden;*/
    height: 100vh !important;
}

.modal.right_modal .modal-body {
  padding: 15px 15px 30px;
}


.modal-backdrop {
    display: none;
}

.modal.right_modal.fade.show .modal-dialog {
  right: 0;
  box-shadow: 0px 0px 19px rgba(0,0,0,.5);
}

/* ----- MODAL STYLE ----- */
.modal-content {
  border-radius: 0;
  border: none;
}


 .modal-header.right_modal {

  padding: 10px 15px;
  border-bottom-color: #EEEEEE;
  background-color: #FAFAFA;
}

.modal_outer .modal-body {
    /*height:90%;*/
    overflow-y: auto;
    overflow-x: hidden;
    height: 91vh;
}
</style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@stop


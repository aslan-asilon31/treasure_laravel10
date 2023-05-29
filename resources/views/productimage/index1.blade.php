@extends('adminlte::page')

@section('title', 'Product')

@section('content')
@include('sweetalert::alert')
<div class="row ">


<h1> <b>Product Images</b> </h1>
    
    <div class="card" style="background: linear-gradient(to right, #6366F1, #3B82F6, #EC4899);">
        <div class="card-header">
            <h3> <b class="text-white">Jordan One Take 4 PF</b> </h3>


            <a href="{{ route('productimages.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            <a href="" class="btn btn-warning" style="color:white;"><i class="fa fa-file-excel"></i></a>
            <a href="" class="btn btn-danger"><i class="fa fa-file-pdf"></i></a>
            <a href="" class="btn btn-info"><i class="fa fa-file-csv"></i></a>
            <button type="button" style="background-color: indigo;color:white;" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-history"></i></button>
            <button class="btn" style="background-color: magenta;color:white;" id="modal_view_right" data-toggle="modal" data-target="#information_modal"><i class="fa fa-upload"></i></button>
            <a data-url="{{ url('myproductsDeleteAll') }}" class="btn delete_all" style="background-color: rgb(130, 0, 0);color:white;"><i class="fa fa-trash"></i> Delete All</a>
            <a href="{{ route('productimages.index') }}" class="btn bg-green"><i class="fa fa-image"></i>Product Images</a>
            <a  class="btn " href="{{ route('productdetails.index') }}" style="color:white;background-color:#EF4444;" ><i class="fa fa-shopping-cart text-white"></i>Product Details</a>
      
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <div class="btn-group w-100 mb-2">
                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                <button class="btn btn-info color-button" data-color="blue"  data-filter="1"> Color (Blue) </button>
                <button class="btn btn-info color-button" data-color="black"  data-filter="1"> Color (black) </button>
                <button class="btn btn-info color-button" data-color="yellow"  data-filter="1"> Color (Yellow) </button>
                <button class="btn btn-info color-button" data-color="white"  data-filter="1"> Color (White) </button>
                <button class="btn btn-info color-button" data-color="red"  data-filter="1"> Color (Red) </button>
                <button class="btn btn-info color-button" data-color="pink"  data-filter="1"> Color (Pink) </button>
            </div>

            <div class="mb-2">
                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                <div class="float-right">
                  <select class="custom-select" style="width: auto;" data-sortOrder>
                    <option value="index"> Sort by Position </option>
                    <option value="sortData"> Sort by Custom Data </option>
                  </select>
                  <div class="btn-group">
                    <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                    <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                  </div>
                </div>
            </div>
            <!-- Container to display shoe images -->
            
          </div>


            <div class="" data-category="1" data-sort="white sample"  >
            <a class="thumbnail">

                <div class="all-product">
                    @foreach ($productimages as $productimage)
                        <img src={{ Storage::url('public/productimages/').$productimage->image }} class="rounded img-fluid mb-2" style="width: 150px">
                    @endforeach
                </div>

                <div id="shoe-container" class="" style="display:inline-block;width:100%"></div>
            </a>
            </div>
      
      
    </div>






</div>




<div class="modal fade" id="image-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <div class="modal-title">Product Image</div>
        </div>
        <div class="modal-body">
          <img class="img-responsive"  style="width:300px;" src="" alt="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
  

@stop

@section('css')
<style>
    .modal-dialog{text-align:center;}
.modal-content{display:inline-block;}
.galeria > img{ width: 100px;}
.galeria:hover{cursor: pointer;}
#btn-download {float:left;}

.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
pointer-events: none;
cursor: not-allowed;
filter: alpha(opacity=65);
-webkit-box-shadow: none;
box-shadow: none;
opacity: .65;
}

.galeria > img, .modal-body, .modal-content, .modal{
-webkit-user-select: none;   
-moz-user-select: none; 
-ms-user-select: none; 
-o-user-select: none;
user-select: none;
  }

  .galeria > .modal-body{
   width:100px; 
  }

</style>
@stop

@section('js')
<script>
    $( ".galeria img" ).click(function() {
   $("#btn-anterior").prop('disabled', false);
   $("#btn-siguiente").prop('disabled', false);
  imagen = $(this).attr( "src");
  $( ".modal-body" ).html("<img src="+imagen+">");
  if ($('.galeria').has("img[src$='"+imagen+"']").find('img:first').attr( "src") == imagen) {
    $("#btn-anterior").prop('disabled', true);
  } 
  if ($('.galeria').has("img[src$='"+imagen+"']").find('img:last').attr( "src") == imagen) {
    $("#btn-siguiente").prop('disabled', true);
  }  
  $('#myModal').modal('show'); 
});


$("#btn-siguiente").click(function() {
  imagen = $("img[src$='"+imagen+"']").next().attr("src");
  $( ".modal-body" ).html("<img  src="+imagen+">"); 
  if ($('.galeria').has("img[src$='"+imagen+"']").find('img:last').attr( "src") == imagen) {
    $("#btn-siguiente").prop('disabled', true);
  }
  if ($('.galeria').has("img[src$='"+imagen+"']").has("img[src$='"+imagen+"']").find('img:first').attr( "src") != imagen) {
    $("#btn-anterior").prop('disabled', false);
  }
});

$("#btn-anterior").click(function() {
  imagen = $("img[src$='"+imagen+"']").prev().attr("src");
  $( ".modal-body" ).html("<img src="+imagen+">");
  if ($('.galeria').has("img[src$='"+imagen+"']").find('img:first').attr( "src") == imagen) {
    $("#btn-anterior").prop('disabled', true);
  }
  if ($('.galeria').has("img[src$='"+imagen+"']").find('img:last').attr( "src") != imagen) {
    $("#btn-siguiente").prop('disabled', false);
  }
});


$("#btn-download").click(function() {
  window.open(imagen);  
});


</script>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Ajax request to load shoe images based on selected color -->
<script>
$(document).ready(function() {
    $('.color-button').click(function() {
        var color = $(this).data('color');

        $.ajax({
            url: "{{ route('productColor') }}",
            type: "GET",
            data: {
                color: color
            },
            success: function(response) {
                // Clear previous shoe images
                $('#shoe-container').empty();
                $('.all-product').hide();
                response.forEach(function(product) {
                    var imageUrl = "{{ Storage::url('public/productimages/') }}" + product.image;
                    var imageElement = '<img src="' + imageUrl + '" class="rounded img-fluid mb-2" style="width: 150px">';
                    $('#shoe-container').append(imageElement);
                });

            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>



<script>
    // modal image
    // Добавьте следущий сценарий перед закрывающим тегом body
// После загрузки DOM-дерева (страницы)
$(function() {     
  //при нажатии на ссылку, содержащую Thumbnail
  $('a.thumbnail').click(function(e) {
    //отменить стандартное действие браузера
    e.preventDefault();
    //присвоить атрибуту scr элемента img модального окна
    //значение атрибута scr изображения, которое обёрнуто
    //вокруг элемента a, на который нажал пользователь
    $('#image-modal .modal-body img').attr('src', $(this).find('img').attr('src'));
    //открыть модальное окно
    $("#image-modal").modal('show');
  });
  //при нажатию на изображение внутри модального окна 
  //закрыть его (модальное окно)
  $('#image-modal .modal-body img').on('click', function() {
    $("#image-modal").modal('hide')
  });
});

</script>

@stop
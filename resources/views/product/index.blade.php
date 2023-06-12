@extends('adminlte::page')

@section('title', 'Product Management')

@section('content')
@include('sweetalert::alert')



<div class="card" style="background: linear-gradient(to right, #6366F1, #3B82F6, #EC4899);">

    @include('/product/partials/_import_form')
    @include('/product/partials/_search_form')
    @include('/product/partials/_activity_log')
    
    <div class="card-header">
      <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
      <a href="" class="btn btn-warning" style="color:white;"><i class="fa fa-file-excel"></i></a>
      <a href="" class="btn btn-danger"><i class="fa fa-file-pdf"></i></a>
      <a href="" class="btn btn-info"><i class="fa fa-file-csv"></i></a>
      <button type="button" style="background-color: indigo;color:white;" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-history"></i></button>
      <button class="btn" style="background-color: magenta;color:white;" id="modal_view_right" data-toggle="modal" data-target="#information_modal"><i class="fa fa-upload"></i></button>
      <a data-url="{{ url('myproductsDeleteAll') }}" class="btn delete_all" style="background-color: rgb(130, 0, 0);color:white;"><i class="fa fa-trash"></i> Delete All</a>
      <a href="{{ route('productimages.index') }}" class="btn bg-green"><i class="fa fa-image"></i>Product Images</a>
      <a  class="btn " href="{{ route('productdetails.index') }}" style="color:white;background-color:#EF4444;" ><i class="fa fa-shopping-cart text-white"></i>Product Details</a>
      <a  class="btn " href="{{ route('multipleprices.index') }}" style="color:white;background-color:#4463ef;" ><i class="fa fa-money-bill text-white"></i>Product Prices</a>



    </div>
    <!-- /.card-header -->



    <div class="card-body " style="background: linear-gradient(to right, #6366F1, #3B82F6, #EC4899);">
        <div style="overflow-x:auto;">
            <table id="" class="table table-bordered" >
              <thead class="text-white">
              <tr>
                <th width="25px"><input type="checkbox" id="master"></th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody class="text-white" style="">
                  @forelse ($products as $key=>$product)
                  <tr>
                    <td><input type="checkbox" class="sub_chk" data-id="{{$product->id}}"></td>
                    
                      <td class="text-center">
                          {{ $product->name }}
                      </td>
                      <td class="text-center">
                          <img src="{{ Storage::url('public/products/').$product->image }}" class="rounded" style="width: 70px">
                      </td>
                      </td>
                      <td class="text-center">
                            Rp 200.000,000;-
                      </td>
                      <td class="text-center">
                            25
                      </td>
                      <td class="text-center">
                        @if($product->status =='on-sale')
                            <span class="" style="background-color:#EF4444;color:white;">waiting for payment</span>         
                        @elseif($product->status == 'available')
                            <span class="" style="background-color:#F59E0B;color:white;">available</span>         
                        @elseif($product->status == 'sold-out')
                            <span class="" style="background-color:#10B981;color:white;">sold out</span>         
                        @elseif($product->status == 'pre-order')
                            <span class="" style="background-color:#3B82F6;color:white;">pre order</span>         
                        @elseif($product->status == 'limited-stock')
                            <span class="" style="background-color:#6366F1;color:white;">limited stock</span>         
                        @elseif($product->status == 'back-order')
                            <span class="" style="background-color:#8B5CF6;color:white;">back order</span>         
                        @elseif($product->status == 'clearance')
                            <span class="" style="background-color:#EC4899;color:white;">clearance</span>         
                        @endif
                      </td>
                      {{-- <td class="text-center" 
                          style="display: -webkit-box;max-width: 200px;max-height:300px;
                          -webkit-line-clamp: 4;-webkit-box-orient: vertical;
                          overflow: scroll;">
                          {{ $product->description }}
                      </td> --}}
                      <td class="text-center">
                          <form action="{{ route('products.destroy', $product) }}" method="POST" id="delete-form">
                          {{-- <form data-confirm-delete="true" action="{{ route('products.destroy', $product->id) }}" method="POST"> --}}
                              <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              <a data-url="{{ url('myproductsDeleteAll') }}" class="btn btn-sm delete_all" style="background-color: rgb(130, 0, 0);color:white;"><i class="fa fa-trash"></i></a>
                              
                              {{-- </form> --}}
                          </form>
                      </td>
                  </tr>
                  @empty
                    <div class="alert alert-danger">
                     There is no data
                    </div>
                  @endforelse
              </tfoot>
            </table>
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

{{-- Multiple Delete --}}
<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {

            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please check row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
<script>
    // Menggunakan class .delete-button sebagai selector tombol delete
    $('.delete-button').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        
        // Munculkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengklik tombol Yes
                form.submit();
            }
        });
    });
</script>
@stop
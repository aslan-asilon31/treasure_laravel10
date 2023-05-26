@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
@include('sweetalert::alert')



<div class="card">

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
      <a href="" class="btn " style="background-color: rgb(130, 0, 0);color:white;"><i class="fa fa-trash"></i> Delete Checked</a>



    </div>
    <!-- /.card-header -->



    <div class="card-body">
        <div style="overflow-x:auto;">
            <table id="" class="table table-bordered" >
              <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Size</th>
                <th>Color</th>
                <th>Status</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody style="">
                  @forelse ($products as $product)
                  <tr>
                      <td class="text-center">
                        <input type="checkbox" name="" id="">
                      </td>
                      <td class="text-center">
                          {{ $product->name }}
                      </td>
                      <td class="text-center">
                          <img src="{{ Storage::url('public/products/').$product->image }}" class="rounded" style="width: 70px">
                      </td>
                      <td class="text-center" style="background-color: rgb(129, 243, 129); color:black;">
                        <span style="background-color: white;width:10px; color:black;height:10px;"> Regular </span> : Rp 200<br> 
                        <span style="background-color: #C0C0C0;width:10px; color:black;height:10px;"> Silver </span> : Rp 175<br>
                        <span style="background-color: #ffd700;width:10px; color:black;height:10px;"> Gold </span> : Rp 160<br>
                        <span style="background-color: #E5E4E2;width:10px; color:black;height:10px;"> PLatinum </span> : Rp 155<br>
                        <span style="background-color: indigo;width:10px; color:white;height:10px;"> VIP </span> : Rp 150<br>
                          {{-- Rp {{ number_format($product->price) }} --}}
                      </td>
                      <td class="text-center" >
                          {{ $product->size }}
                      </td>
                      <td class="text-center">
                          {{ $product->color }}
                      </td>
                      <td class="text-center">
                        @if($product->status =='waiting')
                            <span class="badge badge-secondary">waiting for payment</span>         
                        @elseif($product->status == 'success')
                            <span class="badge badge-success">payment received</span>         
                        @endif
                      </td>
                      <td class="text-center" 
                          style="display: -webkit-box;max-width: 200px;max-height:300px;
                          -webkit-line-clamp: 4;-webkit-box-orient: vertical;
                          overflow: scroll;">
                          {{ $product->description }}
                      </td>
                      <td class="text-center">
                          {{-- <form data-confirm-delete="true" action="{{ route('products.destroy', $product->id) }}" method="POST"> --}}
                              <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" onclick="deleteProduct({{ $product->id }})"><i class="fa fa-trash"></i> </button>
                          {{-- </form> --}}
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    function deleteProduct(productID) {
        // console.log(productID)
        Swal.fire({
            title: 'Are you sure want to delete this product ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengirim permintaan DELETE ke route 'products.destroy'
                axios.delete('/products/' + productID)
                    .then(response => {
                        // Tampilkan SweetAlert2 sukses jika penghapusan berhasil
                        Swal.fire('Success!', 'Your Product Has Been Deleted.', 'success');
                        // Lakukan tindakan lain yang diinginkan, misalnya refresh halaman
                        location.reload();
                    })
                    .catch(error => {
                        // Tampilkan SweetAlert2 error jika penghapusan gagal
                        Swal.fire('Error!', 'Your Product Failed To Delete !.', 'error');
                    });
            }
        });
    }
</script>


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
@stop
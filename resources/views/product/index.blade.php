@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="card">
    <div class="card-header">
      <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> Add product</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div style="overflow-x:auto;">
            <table id="" class="table table-bordered" >
              <thead>
              <tr>
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
                          {{ $product->name }}
                      </td>
                      <td class="text-center">
                          <img src="{{ Storage::url('public/products/').$product->image }}" class="rounded" style="width: 150px">
                      </td>
                      <td class="text-center">
                          Rp {{ number_format($product->price) }}
                      </td>
                      <td class="text-center">
                          {{ $product->size }}
                      </td>
                      <td class="text-center">
                          {{ $product->color }}
                      </td>
                      <td class="text-center">
                          {{ $product->status }}
                      </td>
                      <td class="text-center" style="">
                          {{ $product->description }}
                      </td>
                      <td class="text-center">
                          {{-- <form data-confirm-delete="true" action="{{ route('products.destroy', $product->id) }}" method="POST"> --}}
                              <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" onclick="deleteItem({{ $product->id }})"><i class="fa fa-trash"></i> </button>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    function deleteProduct(productID) {
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
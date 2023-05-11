@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Product List</h3>
      <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">Add product</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Price</th>
          <th>Size</th>
          <th>Color</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="text-center">
                    {{ $product->name }}
                </td>
                <td class="text-center">
                    <img src="{{ Storage::url('public/products/').$product->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $product->price }}
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
                <td class="text-center">
                    {{ $product->description }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
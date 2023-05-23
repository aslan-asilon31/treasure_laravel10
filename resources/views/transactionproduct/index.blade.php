@extends('adminlte::page')

@section('title', 'Product Transaction ')

@section('content_header')
    <h1>Product Transaction</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Transaction Product  List</h3>
      <a href="{{ route('transactionproducts.create') }}" class="btn btn-md btn-success mb-3">Add transactionproduct</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Transaction ID</th>
          <th>Prod Name</th>
          <th>Prod Code</th>
          <th>Prod Price</th>
          <th>Prod Amount</th>
          <th>Prod Image</th>
          <th>Prod Price</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($transactionproducts as $transactionproduct)
            <tr>
                <td class="text-center">
                    {{ $transactionproduct->transaction_id }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->prod_name }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->prod_code }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->prod_price }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->prod_amount }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->prod_images }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->total_price }}
                </td>
                <td class="text-center">
                    {{ $transactionproduct->slug }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transactionproducts.destroy', $transactionproduct->id) }}" method="POST">
                        <a href="{{ route('transactionproducts.edit', $transactionproduct->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
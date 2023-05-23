@extends('adminlte::page')

@section('title', 'Transaction')

@section('content_header')
    <h1>Transaction</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Transaction List</h3>
      <a href="{{ route('transactions.create') }}" class="btn btn-md btn-success mb-3">Add transaction</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Product Transact ID</th>
          <th>Barcode</th>
          <th>Invoice code</th>
          <th>Cust Name</th>
          <th>Cust Email</th>
          <th>Cust Phone</th>
          <th>Cust Addres</th>
          <th>Cust Type</th>
          <th>Total</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="text-center">
                    {{ $transaction->prod_transactions_id }}
                </td>
                <td class="text-center">
                    {{ $transaction->barcode }}
                </td>
                <td class="text-center">
                    {{ $transaction->invoice_code }}
                </td>
                <td class="text-center">
                    {{ $transaction->cust_name }}
                </td>
                <td class="text-center">
                    {{ $transaction->cust_email }}
                </td>
                <td class="text-center">
                    {{ $transaction->cust_phone }}
                </td>
                <td class="text-center">
                    {{ $transaction->cust_address }}
                </td>
                <td class="text-center">
                    {{ $transaction->cust_type }}
                </td>
                <td class="text-center">
                    {{ $transaction->total_price }}
                </td>
                <td class="text-center">
                    {{ $transaction->payment_method }}
                </td>
                <td class="text-center">
                    {{ $transaction->slug }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
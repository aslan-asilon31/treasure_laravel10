@extends('adminlte::page')

@section('title', 'Transaction')

@section('content_header')
    <h1>Transaction</h1>
@stop

@section('content')
<div class="card"  style="color:black;">
    <div class="card-header">
        <a href="" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
        <a href="" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
        <a href="" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
        <a href="" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
        <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div style="overflow-x:auto;white-space: nowrap;">
            <table id="example1" class="table table-bordered table-striped data-table">
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
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@stop

@section('css')
    {{-- Yajra DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{-- End Yajra DataTable --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

{{-- Yajra Data Table --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    var table;

    $(function () {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('transactions.index') }}",
            columns: [
                {data: 'prod_transactions_id', name: 'prod_transactions_id'},
                {data: 'barcode', name: 'barcode'},
                {data: 'invoice_code', name: 'invoice_code'},
                {data: 'cust_name', name: 'cust_name'},
                {data: 'cust_email', name: 'cust_email'},
                {data: 'cust_phone', name: 'cust_phone'},
                {data: 'cust_address', name: 'cust_address'},
                {data: 'cust_type', name: 'cust_type'},
                {data: 'total_price', name: 'total_price'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'slug', name: 'slug'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });



</script>


{{-- End Yajra Data Table --}}

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
@stop
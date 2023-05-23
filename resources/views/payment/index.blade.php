@extends('adminlte::page')

@section('title', 'Payment')

@section('content_header')
    <h1>Payment</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="card">
    <div class="card-header">
        <a href="{{ route('payments.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
        <a href="" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
        <a href="" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
        <a href="" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
        <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <div style="overflow-x:auto;white-space: nowrap;">
            <table id="" class="table table-bordered" >
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody style="">
                  @forelse ($payments as $payment)
                  <tr>
                      <td class="text-center">
                          {{ $payment->order_id }}
                      </td>
                      <td class="text-center">
                          {{ $payment->payment_method }}
                      </td>
                      <td class="text-center">
                          {{ $payment->amount }}
                      </td>
                      <td class="text-center">
                          {{ $payment->slug }}
                      </td>
                      <td class="text-center">
                          {{-- <form data-confirm-delete="true" action="{{ route('payments.destroy', $payment->id) }}" method="POST"> --}}
                              <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" onclick="deleteItem({{ $payment->id }})"><i class="fa fa-trash"></i> </button>
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

    function deletepayment(paymentID) {
        Swal.fire({
            title: 'Are you sure want to delete this payment ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengirim permintaan DELETE ke route 'payments.destroy'
                axios.delete('/payments/' + paymentID)
                    .then(response => {
                        // Tampilkan SweetAlert2 sukses jika penghapusan berhasil
                        Swal.fire('Success!', 'Your payment Has Been Deleted.', 'success');
                        // Lakukan tindakan lain yang diinginkan, misalnya refresh halaman
                        location.reload();
                    })
                    .catch(error => {
                        // Tampilkan SweetAlert2 error jika penghapusan gagal
                        Swal.fire('Error!', 'Your payment Failed To Delete !.', 'error');
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
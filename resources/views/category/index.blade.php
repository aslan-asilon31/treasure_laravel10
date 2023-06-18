@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
<div class="card" style=" outline: 2px solid black; ">
    <div class="card-header">
        <a href="{{ route('categories.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
        <a href="" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
        <a href="" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
        <a href="" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
        <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>
        <a  class="btn mb-3" href="{{ route('categorydetails.index') }}" style="color:white;background-color:#EF4444;" ><i class="fa fa-boxes text-white"></i>Category Details</a>


    </div>
      <!-- /.card-header -->
      <div class="card-body">
          <div style="overflow-x:auto;white-space: nowrap;">
      <table id="example1" class="table table-bordered table-striped data-table" style="color:black;">
        <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Retro Model</th>
          <th>Collaboration</th>
          <th>Limited Edition</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            {{-- @foreach ($categories as $category)
            <tr>
                <td class="text-center">
                    {{ $category->name }}
                </td>
                <td class="text-center">
                    <img src="{{ Storage::url('public/categories/').$category->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $category->retro_model }}
                </td>
                <td class="text-center">
                    {{ $category->collaboration }}
                </td>
                <td class="text-center">
                    {{ $category->limited_edition }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </tfoot>
      </table>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
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
            ajax: "{{ route('categories.index') }}",
            columns: [
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'retro_model', name: 'retro_model'},
                {data: 'collaboration', name: 'collaboration'},
                {data: 'limited_edition', name: 'limited_edition'},
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
@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('categories.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
        <a href="" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
        <a href="" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
        <a href="" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
        <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>
        <a  class="btn mb-3" href="{{ route('categorydetails.index') }}" style="color:white;background-color:#EF4444;" ><i class="fa fa-boxes text-white"></i>Category Details</a>

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
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Retro Model</th>
          <th>Collaboration</th>
          <th>Limited Edition</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
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
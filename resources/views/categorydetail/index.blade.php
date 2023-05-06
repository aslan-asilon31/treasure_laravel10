@extends('adminlte::page')

@section('title', 'Category Detail')

@section('content_header')
    <h1>Category Detail</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Category Detail List</h3>
      <a href="{{ route('categorydetails.create') }}" class="btn btn-md btn-success mb-3">Add Category Detail</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Category ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categorydetails as $categorydetail)
            <tr>
                <td class="text-center">
                    {{ $categorydetail->category_id }}
                </td>
                <td class="text-center">
                    {{ $categorydetail->name }}
                </td>
                <td class="text-center">
                    {{ $categorydetail->description }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('categorydetails.destroy', $categorydetail->id) }}" method="POST">
                        <a href="{{ route('categorydetails.edit', $categorydetail->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
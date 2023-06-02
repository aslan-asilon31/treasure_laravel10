@extends('adminlte::page')

@section('title', 'Permissions Show')

@section('content_header')
    <h1>Permissions Show</h1>
@stop

@section('content')
@include('sweetalert::alert')

<div class="card">
    <div class="card-header">
      <a href="{{ route('permissions.index') }}" class="btn btn-md bg-pink mb-3">  <i class="fa fa-arrow-left"></i> Back</a>
      <a href="{{ route('permissions.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
      <a href="{{ route('user.export-pdf') }}" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
      <a href="{{ route('user.export-excel') }}" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
      <a href="{{ route('user.export-csv') }}" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
      <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div style="overflow-x:auto;white-space: nowrap;">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <label class="font-weight-bold">Permissions:</label>
                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="permission_{{ $v->id }}" name="permissions[]" value="{{ $v->id }}" class="custom-control-input" checked>
                                <label class="custom-control-label" for="permission_{{ $v->id }}">{{ $v->name }}</label>
                            </div>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>


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

@stop
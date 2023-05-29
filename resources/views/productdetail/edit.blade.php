@extends('adminlte::page')

@section('title', 'Product Detail Edit')

@section('content_header')
    <h1>Product Detail Edit</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('productdetails.update', $productdetail->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Sold</label>
                            <input type="text" class="form-control @error('sold') is-invalid @enderror" name="sold" value="{{ old('sold', $productdetail->sold) }}" placeholder="Insert sold">
                        
                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}


                        <div class="form-group">
                            <label class="font-weight-bold">Size</label>
                            <input type="number" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size', $product->size) }}" placeholder="Insert size">
                        
                            <!-- error message untuk title -->
                            @error('size')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Color</label>
                            <input type="integer" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color', $product->color) }}" placeholder="Insert color">
                        
                            <!-- error message untuk title -->
                            @error('color')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">wishlist</label>
                            <input type="integer" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('wishlist', $productdetail->wishlist) }}" placeholder="Insert wishlist">
                        
                            <!-- error message untuk title -->
                            @error('wishlist')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea type="integer" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $product->description) }}" placeholder="Insert description"></textarea>
                        
                            <!-- error message untuk title -->
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
@stop
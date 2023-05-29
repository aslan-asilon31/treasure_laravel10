@extends('adminlte::page')

@section('title', 'Product Image Edit')

@section('content_header')
    <h1>Product Image Edit</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('productimages.update', $productimage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label class="font-weight-bold">Product ID</label>
                            <input type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id', $productimage->product_id) }}" placeholder="Insert product id">
                        
                            <!-- error message untuk title -->
                            @error('product_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Image</label>
                            <input type="file" class="form-control" name="image" id="selectImage">
                        </div>

                        
                        <div class="form-group rounded mx-auto d-block img-fluid" >
                            <img id="preview" src="{{ Storage::url('public/products/').$productimage->image }}" alt="your image" class="rounded" style="width: 150px"/>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $productimage->title) }}" placeholder="Insert title">
                        
                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $productimage->description) }}" placeholder="Insert description"></textarea>
                        
                            <!-- error message untuk title -->
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $productimage->slug) }}" placeholder="Insert slug">
                        
                            <!-- error message untuk title -->
                            @error('slug')
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

<script>
    // Single Show Image
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
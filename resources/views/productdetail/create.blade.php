@extends('adminlte::page')

@section('title', 'Product Add')

@section('content_header')
    <h1>Product Detail Add</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('productdetails.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Product</label>

                              <select type="text" class="form-control @error('status') is-invalid @enderror" name="status" class="custom-select form-control-border" id="status" >
                                <option value="" name="product_id" hidden> -- Select Product --</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    
                                @endforeach
                              </select>
                        
                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Sold</label>
                            <input type="text" class="form-control @error('sold') is-invalid @enderror" name="sold" value="{{ old('sold') }}" placeholder="Insert sold">
                        
                            <!-- error message untuk title -->
                            @error('sold')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Size</label>
                            <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" placeholder="Insert size">
                        
                            <!-- error message untuk title -->
                            @error('size')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Select Color</label>

                              <select type="text" class="form-control @error('color') is-invalid @enderror" name="color" class="custom-select form-control-border" id="color" >
                                <option value="" hidden> -- Select Color --</option>
                                <option value="blue">Blue</option>
                                <option value="red">Red</option>
                                <option value="yellow">Yellow</option>
                                <option value="white">White</option>
                                <option value="pink">Pink</option>
                                <option value="Purple">Purple</option>
                                <option value="" style="background-color:indigo;color:white;" > <button>New Color ?</button> </option>
                              </select>

                              
                            <!-- error message untuk title -->
                            @error('color')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <input type="text" style="display:none;" class=" input_color_new mt-2 form-control " name="color" value="{{ old('color') }}" placeholder="Insert color" > --}}

                        <div class="form-group">
                            <label class="font-weight-bold">Rating</label>
                            <input type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating') }}" placeholder="Insert rating">
                        
                            <!-- error message untuk title -->
                            @error('rating')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Insert description"></textarea>
                        
                            <!-- error message untuk title -->
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <button type="reset" class="btn btn-md btn-warning">Reset</button>

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
    // show hide new Color
    // $(document).ready(function() {
    // $('#color_new').change(function() {
    //     $('.input_color_new').show();
    // });
    // });

    // show hide new Status
    // $(document).ready(function() {
    // $('#status_new').change(function() {
    //     $('.input_status_new').show();
    // });
    // });
</script>
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
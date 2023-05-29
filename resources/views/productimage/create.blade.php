@extends('adminlte::page')

@section('title', 'Product Image Add')

@section('content_header')
    <h1>Product Image Add</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">

        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('productimages.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        {{-- Single Image --}}
                        <div class="form-group">
                          <label class="font-weight-bold">Image</label>
                          <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="selectImage">
                      
                          <!-- error message untuk title -->
                          @error('image')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group rounded mx-auto d-block img-fluid" >
                          <img id="preview" src="#" alt="your image" class="rounded" style="width: 150px"/>
                      </div>
                        {{-- End Single Image --}}

                        
                        <div class="form-group">
                            <label for="exampleSelectRounded0"> Product ID  </label>
                            <select class="custom-select rounded-0" id="product_id" name="product_id" >
                              <option hidden>Select Project</option>
                              @foreach ($products as $p)
                              <option name="product_id"  value="{{ $p->id }}">{{ $p->name }}-{{ $p->color }}</option>
                              @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" class="form-control " id="imageTitleInput" name="title" value="{{ old('title') }}" placeholder="Insert title">
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

                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea class="form-control " name="description" rows="5" placeholder="Insert description">{{ old('description') }}</textarea>
                        
                  
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .img-thumb {
  max-height: 75px;
  border: 2px solid none;
   border-radius:3px;
  padding: 1px;
  cursor: pointer;
}
.img-thumb-wrapper {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid none;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    //Multiple Image

</script>
<script>
    $(document).ready(function() {
        $('#project').on('change', function() {
            var selectedValue = $(this).val();
            $('.result_project').text(selectedValue).val(selectedValue);
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> --}}
<script>

    // IMg mutlple upload
    $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"img-thumb-wrapper card shadow\">" +
            "<img class=\"img-thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</div>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".img-thumb-wrapper").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
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
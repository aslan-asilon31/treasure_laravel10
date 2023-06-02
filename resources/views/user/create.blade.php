@extends('adminlte::page')

@section('title', 'User Add')

@section('content_header')
    <h1>User Add</h1>
@stop

@section('content')
<div class="container mt-0 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Insert name">
                        
                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Roles</label>
                            <select type="text" class="form-control @error('color') is-invalid @enderror" name="color" class="custom-select form-control-border" id="color" >
                                <option value="" hidden> -- Select Roles --</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                              </select>

                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label class="font-weight-bold">Role:</label>
                            <select name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        
                            <!-- error message for roles -->
                            @error('roles')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Insert email">
                        
                            <!-- error message untuk title -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Insert password" >

                            <div class="input-group-append" style="background-color: white;">
                                <div class="">
                                    <input type="checkbox" id="toggle-password">
                                    <label for="toggle-password">&nbsp; Show Password</label>
                                </div>
                            </div>


                            <!-- error message untuk title -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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

                        
{{-- 
                            <div class="form-group">
                                <label for="exampleSelectBorder">Roles</label>
                                <select class="custom-select form-control-border" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" placeholder="Insert role" id="">
                                  <option hidden>-- Select Roles --</option>
                                  <option>Super Admin</option>
                                  <option>Admin</option>
                                  <option>Supervisor</option>
                                  <option>Merchant</option>
                                  <option>Product Manager</option>
                                  <option>Marketing Team</option>
                                  <option>Customer Service Team</option>
                                  <option>Data Analyst</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('role')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        
                        {{-- </div> --}}
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Insert phone">
                        
                            <!-- error message untuk title -->
                            @error('phone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Insert address">
                        
                            <!-- error message untuk title -->
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Insert status">
                        
                            <!-- error message untuk title -->
                            @error('status')
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

                        <div class="form-group">
                            <label class="font-weight-bold">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="Insert slug">
                        
                            <!-- error message untuk title -->
                            @error('slug')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h3>Image</h3>
                    <div class="form-group rounded mx-auto d-block img-fluid" >
                        <img id="preview" src="#" alt="your image" style="width:200px;" class="mt-3 " style="display:none;"/>
                    </div>
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( '' );
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
<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('toggle-password');

    togglePassword.addEventListener('change', function () {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
@stop
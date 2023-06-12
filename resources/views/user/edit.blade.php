@extends('adminlte::page')

@section('title', 'User Edit')

@section('content_header')
    <h1>User Edit</h1>
@stop

@section('content')
<div class="container mt-0 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Insert name">
                        
                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Insert email">
                        
                            <!-- error message untuk title -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}" placeholder="Insert password">
                        
                            <!-- error message untuk title -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        


                        <div class="form-group">
                            <label class="font-weight-bold">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group rounded mx-auto d-block img-fluid" >
                            <img id="preview" src="{{ Storage::url('public/users/').$user->image }}" alt="your image" class="rounded" style="width: 150px"/>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Role:</label>
                            <select name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
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
                            <label class="font-weight-bold">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Insert phone">
                        
                            <!-- error message untuk title -->
                            @error('phone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" placeholder="Insert address">
                        
                            <!-- error message untuk address -->
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status', $user->status) }}" placeholder="Insert status">
                        
                            <!-- error message untuk address -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Is Active</label>
                            <input type="text" class="form-control @error('is_active') is-invalid @enderror" name="is_active" value="{{ old('is_active', $user->is_active) }}" placeholder="Insert is active">
                        
                            <!-- error message untuk address -->
                            @error('is_active')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Desc</label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc', $user->desc) }}" placeholder="Insert desc">
                        
                            <!-- error message untuk address -->
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Slug </label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $user->slug) }}" placeholder="Insert slug ">
                        
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

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
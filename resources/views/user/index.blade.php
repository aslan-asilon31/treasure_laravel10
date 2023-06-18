@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')
@include('sweetalert::alert')

<style>
            
/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}
/* ----- MODAL STYLE ----- */
.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}

</style>
<div class="card">
    <div class="card-header">
      <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
      <a href="{{ route('user.export-pdf') }}" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
      <a href="{{ route('user.export-excel') }}" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
      <a href="{{ route('user.export-csv') }}" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
      <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>
      <a href="{{ route('roles.index') }}" class="btn btn-md bg-pink mb-3">  <i class="fa fa-users"></i> Roles </a>
      <a href="{{ route('permissions.index') }}" class="btn btn-md bg-cyan mb-3">  <i class="fa fa-network-wired"></i> Permissions </a>
      <a href="{{ route('members.index') }}" class="btn btn-md bg-orange mb-3 " style="color:white;"> <span class="text-white"><i class="fa fa-users"></i> Members</span>  </a>
      <button class="btn btn-md bg-fuchsia mb-3 search-user-btn"  style="color:white;"> <span class="text-white"><i class="fa fa-search"></i> </span>  </button>

      {{-- <div class="form-group">
        <input type="text" class="form-controller" id="search" name="search" placeholder="Search">
      </div> --}}

    </div>
    <!-- /.card-header -->
    <div class="card-body" style="color:black;">
        <div style="overflow-x:auto;white-space: nowrap;">
            <table id="" class="table table-bordered data-table" >
              <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                {{-- <th>Is active</th> --}}
                <th>Last seen</th>
                <th>Desc</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody >
                  {{-- @forelse ($users as $user)
                  <tr>
                      <td class="text-center">
                          <img src="{{ Storage::url('public/users/').$user->image }}" class="rounded" style="width: 50px">
                      </td>
                      <td class="text-center">
                          {{ $user->name }}
                      </td>
                      <td class="text-center">
                        @if($user->role == 'superadmin')
                        <p style="background-color: violet;border-radius:3px; color:white; font-weight:bold;">super admin</p>
                        @elseif($user->role == 'admin')
                        <p style="background-color: purple;border-radius:3px; color:white; font-weight:bold;">admin</p>
                        @elseif($user->role == 'supervisor')
                        <p style="background-color: rgb(122, 23, 81);border-radius:3px; color:white; font-weight:bold;">supervisor</p>
                        @elseif($user->role == 'merchant')
                        <p style="background-color: rgb(87, 27, 27);border-radius:3px; color:white; font-weight:bold;">merchant</p>
                        @elseif($user->role == 'manager')
                        <p style="background-color: rgb(21, 61, 73);border-radius:3px; color:white; font-weight:bold;">manager</p>
                        @elseif($user->role == 'productmanager')
                        <p style="background-color: rgb(128, 223, 40);border-radius:3px; color:white; font-weight:bold;">product manager</p>
                        @elseif($user->role == 'marketingteam')
                        <p style="background-color: rgb(201, 145, 23);border-radius:3px; color:white; font-weight:bold;">marketing team</p>
                        @elseif($user->role == 'customerserviceteam')
                        <p style="background-color: rgb(136, 25, 136);border-radius:3px; color:white; font-weight:bold;">customer service team</p>
                        @elseif($user->role == 'dataanalyst')
                        <p style="background-color: rgb(34, 152, 199);border-radius:3px; color:white; font-weight:bold;">data analyst</p>
                        @else
                            <p>none</p>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($user->status == 'active')
                        <p style="background-color: rgb(10, 216, 10);border-radius:3px; color:white; font-weight:bold;">Active</p>
                        @elseif($user->status == 'inactive')
                        <p style="background-color: red;border-radius:3px; color:white; font-weight:bold;">Inactive</p>
                        @elseif($user->status == 'blocked')
                        <p style="background-color: #000;border-radius:3px; color:white; font-weight:bold;">Blocked</p>
                        @else
                            <p>none</p>
                        @endif
                      </td>
                      <td class="text-center">
                        @if(Cache::has('user-is-online-' . $user->id))
                          <div class="ring-container">
                            <div class="ringring"></div>
                            <div class="circle"></div>
                          </div>
                          @else
                          <div class="ring-container">
                            <div class="circle-offline"></div>
                          </div>
                        @endif
                      </td>
                      <td class="text-center">
                        {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                      </td>
                    <td class="text-center">
                        {{ $user->slug }}
                    </td>
                      <td class="text-center">
                          <form data-confirm-delete="true" action="{{ route('users.destroy', $user->id) }}" method="POST">
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" onclick="deleteItem({{ $user->id }})"><i class="fa fa-trash"></i> </button>
                          </form>
                      </td>
                  </tr>
                  @empty
                    <div class="alert alert-danger">
                     There is no data
                    </div>
                  @endforelse --}}
              </tfoot>
            </table>
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


  	
	<!-- Modal -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2"></h4>
				</div>

				<div class="modal-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</p>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	
	
@stop

@section('css')

    {{-- Yajra DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{-- End Yajra DataTable --}}


<style>
  /* online offline sign */
  .ring-container {
    position: relative;
}

.circle {
    width: 15px;
    height: 15px;
    background-color: #62bd19;
    border-radius: 50%;
    position: absolute;
    top: 23px;
    left: 23px;
}

.circle-offline {
    width: 15px;
    height: 15px;
    background-color: black;
    border-radius: 50%;
    position: absolute;
    top: 23px;
    left: 23px;
}

.ringring {
    border: 3px solid #62bd19;
    -webkit-border-radius: 30px;
    height: 25px;
    width: 25px;
    position: absolute;
    left: 18px;
    top: 15px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0
}
@-webkit-keyframes pulsate {
    0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
    50% {opacity: 1.0;}
    100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
}
</style>




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
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'status', name: 'status'},
                // {
                //     data: 'is_active',
                //     name: 'is_active',
                //     render: function (data, type, row) {
                //         var statusIndicator = '';
                //         if (data) {
                //             statusIndicator = '<div class="ring-container"><div class="ringring"></div><div class="circle"></div></div>';
                //         } else {
                //             statusIndicator = '<div class="ring-container"><div class="circle-offline"></div></div>';
                //         }
                //         return statusIndicator;
                //     }
                // },
                {data: 'last_seen', name: 'last_seen'},
                {data: 'desc', name: 'desc'},
                {data: 'slug', name: 'slug'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });



</script>


{{-- End Yajra Data Table --}}

<script>

    // function deleteProduct(productID) {
    //     Swal.fire({
    //         title: 'Are you sure want to delete this product ?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Mengirim permintaan DELETE ke route 'users.destroy'
    //             axios.delete('/users/' + productID)
    //                 .then(response => {
    //                     // Tampilkan SweetAlert2 sukses jika penghapusan berhasil
    //                     Swal.fire('Success!', 'Your Product Has Been Deleted.', 'success');
    //                     // Lakukan tindakan lain yang diinginkan, misalnya refresh halaman
    //                     location.reload();
    //                 })
    //                 .catch(error => {
    //                     // Tampilkan SweetAlert2 error jika penghapusan gagal
    //                     Swal.fire('Error!', 'Your Product Failed To Delete !.', 'error');
    //                 });
    //         }
    //     });
    // }
</script>


{{-- <script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script> --}}

{{-- 
<script>
  // Search User
  $(document).ready(function() {
  $('#user-search-form').submit(function(e) {
    e.preventDefault(); // Prevent form submission

    // Get the search query from the input field
    var query = $('#search-input').val();

    // Send an AJAX request to the server
    $.ajax({
      url: '/user-search', // Replace with your Laravel route for handling the search
      method: 'POST', // Adjust the HTTP method as needed
      data: {
        query: query
      },
      success: function(response) {
        // Handle the response from the server
        $('#search-results').html(response);
      },
      error: function(xhr, status, error) {
        // Handle errors, if any
        console.log(error);
      }
    });
  });
});
</script> --}}

{{-- 
<script type="text/javascript">
  $('#search').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('user-search')}}',
  data:{'search':$value},
  success:function(data){
  $('tbody').html(data);
  }
  });
  })
  </script>
  <script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script> --}}

@stop
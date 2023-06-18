@extends('adminlte::page')

@section('title', 'Review')

@section('content_header')
    <h1>Review</h1>
@stop

@section('content')

<div class="card" style="color:black;">
    <div class="card-header">
        <a href="" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
        <a href="" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
        <a href="" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
        <a href="" class="btn btn-md btn-info mb-3" style="color:white;">  <i class="fa fa-file-csv"></i> </a>
        <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>  
      </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th width="115px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<!-- /.card-body -->
</div>
<!-- /.card -->

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">


<style>
.highlight {
    background-color: yellow;
    font-weight: bold;
}
</style>

@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    var table;

    $(function () {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('reviews.index') }}",
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        var searchQuery = $('#myTable_filter input').val(); // Get the search query from the DataTables search input
                        if (searchQuery && type === 'display') {
                            data = data.replace(new RegExp('(' + escapeRegExp(searchQuery) + ')', 'gi'), '<span class="highlight" style="background-color: green;">$1</span>');
                        }
                        console.log(data)
                        return data;
                    }
                },
                {data: 'rating', name: 'rating'},
                {data: 'comments', name: 'comments'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    // Trigger DataTables search event on keyup in the search input field
    $('#myTable_filter input').keyup(function() {
        table.search(this.value).draw();
    });

    // Function to escape special characters in search query for regex
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
</script>


@stop
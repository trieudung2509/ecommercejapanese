@extends('admin.partials.master')

@section('title', 'List Category Product')
@section('stylecss')
    <!-- Sweet Alert-->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">List Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box mr-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <a href="{{ route('admin.cate_product.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</a>
                                </div>
                            </div><!-- end col-->
                        </div>
                        @include('admin.errors.message')
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>STT</th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($cate_product) && count($cate_product) > 0)
                                        @foreach ($cate_product as $key => $cate)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td> {{ ++$key }}</td>
                                                <td>{{ $cate->name  }}</td>
                                                <td> {{ $cate->parent_categories($cate->parent_id)->name ?? '' }}</td>
                                                <td>
                                                    @if ($cate->status == 1)
                                                        <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-soft-danger font-size-12">InActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.cate_product.update',$cate->id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" id="delete-cate" data-attr="{{ $cate->id }}" onclick="delete_category();" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" aria-describedby="tooltip562830"><i class="mdi mdi-close font-size-18"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <form action="">
                                    <div class="row">
                                            <div class="col-sm-9">
                                                <div class="form-group row mb-0">
                                                    <select class="custom-select">
                                                        <option selected="">Select Action</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">InActive</option>
                                                        <option value="3">Delete</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-9">
                                <ul class="pagination pagination-rounded justify-content-end mb-2">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                            <i class="mdi mdi-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('script')
<!-- Sweet alert init js-->
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/sweet-alerts.init.js') }}"></script>
<script>
    $(document).on('click','#delete-cate', function(){
        $id = $(this).data('attr');
        var $tr = $(this).closest('tr');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url : "cate_product/destroy/"+$id,
                    method: 'GET',
                    dataType: 'Json',
                    success: function(data) {
                        if (data.status) {
                            $tr.remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success',
                            );
                        } 
                    }
                });
            }
        });
    });
</script>
@endsection

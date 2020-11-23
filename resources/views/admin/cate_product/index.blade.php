@extends('admin.partials.master')

@section('title', 'List Category Product')
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
                                    <form action="" method="GET" id="form-search" >
                                        <div class="position-relative">
                                        <input type="text" name="search" value="{{ Request::get('search') ?? '' }}" class="form-control" placeholder="Search...">
                                            <i class="bx bx-search-alt search-icon"></i>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <a href="{{ route('admin.cate_product.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add Category</a>
                                </div>
                            </div><!-- end col-->
                        </div>
                        @include('admin.errors.message')
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check custom-control">
                                                <input type="checkbox" id="customCheck1">
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
                                                    <div class="form-check custom-control">
                                                    <input type="checkbox" name="check_cate" value="{{ $cate->id }}">
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
                            <form action="{{ route('admin.cate_product.status') }}" method="POST">
                                    @csrf
                                    <input name="select_box" type="hidden" />
                                    <div class="row">
                                            <div class="col-sm-9">
                                                <div class="form-group row mb-0">
                                                    <select class="custom-select" name="select_type">
                                                        <option value="">Select Action</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                        <option value="2">Delete</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary mb-2">Process</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                            @if (isset($cate_product) && count($cate_product) > 0) 
                                <div class="col-sm-9">
                                    <div class="float-right">
                                        @if (isset($cate_product) && count($cate_product) > 0) 
                                            {{ $cate_product->links() }}
                                        @endif
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('script')
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

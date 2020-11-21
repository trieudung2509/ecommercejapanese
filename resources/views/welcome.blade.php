@extends('admin.partials.master')

@section('title', 'Add Edit Category Product')
@section('stylecss')
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Category Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Add Category Product</li>
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
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                </div>
                                <div classs="col-sm-3">
                                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                    <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="productname">Category Name <span class="required-star">*</span></label>
                                        <input id="productname" name="name" type="text" class="form-control" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="productname">Position</label>
                                        <input name="position" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="productname">Price</label>
                                        <input name="position" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Category <span class="required-star">*</span></label>
                                        <select class="form-control select2">
                                            <option>Select</option>
                                            @foreach($category as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price Sale</span></label>
                                        <input name="position" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Date Sale </label>
                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true">
                                            <input type="text" class="form-control" placeholder="Start Date" name="start">
                                            <input type="text" class="form-control" placeholder="End Date" name="end">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="productdesc">Product Description</label>
                                        <textarea class="form-control" id="productdesc" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Product Images</h4>
                            <div action="/" method="post" class="dropzone">
                                <div class="fallback">
                                    <input name="image" type="file" />
                                </div>
    
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>
                                    
                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </div>
                        </div>
    
                    </div> <!-- end card-->
                    
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Status Data</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Status </label>
                                        <div class="custom-control custom-switch custom-switch-md">
                                            <input type="checkbox" class="custom-control-input" name="status">
                                            <label class="custom-control-label" for="customSwitchsizemd"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">is_home </label>
                                        <div class="custom-control custom-switch custom-switch-md">
                                            <input type="checkbox" class="custom-control-input" >
                                            <label class="custom-control-label" for="customSwitchsizemd"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Status </label>
                                        <div class="custom-control custom-switch custom-switch-md">
                                            <input type="checkbox" class="custom-control-input" >
                                            <label class="custom-control-label" for="customSwitchsizemd"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
    
                            <h4 class="card-title">Meta Data</h4>
                            <p class="card-title-desc">Fill all information below</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="metatitle">Meta title</label>
                                            <input id="metatitle" name="metatitle" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="metakeywords">Meta Keywords</label>
                                            <input id="metakeywords" name="manufacturername" type="text" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="metadescription">Meta Description</label>
                                            <textarea class="form-control" id="metadescription" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
       

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
@endsection
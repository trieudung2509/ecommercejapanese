@extends('admin.partials.master')

@section('title', 'Add Category Product')
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
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
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
                                    <button id="submit-form" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                    <a href="{{ route('admin.cate_product.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="productname">Category Name <span class="required-star">*</span></label>
                                        <input id="productname" name="name" type="text" class="form-control" value="{{ old('name') }}" required >
                                        @if($errors->has('name'))
                                            <p class="required-star">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                     <div class="form-group">
                                        <label for="productname">Position</label>
                                        <input name="position" type="text" class="form-control" value="{{ old('position') }}">
                                        @if($errors->has('position'))
                                            <p class="required-star">{{ $errors->first('position') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch mb-3" dir="ltr">
                                            <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1" checked="">
                                            <label class="custom-control-label" for="customSwitch1">Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"> Category </label>
                                        <select class="form-control select2" name="parent_id">
                                            <option value="0">Select Category</option>
                                            <?php  menu($category);?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="productdesc"> Description</label>
                                        <textarea name="description" class="form-control" id="productdesc" rows="5">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Image Category</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                        <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
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
                                            <input id="metatitle" name="title_seo" value="{{ old('title_seo') }}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="metakeywords">Meta Keyword</label>
                                            <input id="meta_keyword" name="meta_key" value="{{ old('meta_key') }}" type="text" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="metadescription">Meta Description</label>
                                        <textarea class="form-control" name="meta_des" id="meta_description" rows="5">{{ old('meta_des') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/form-element.init.js') }}"></script>
@endsection
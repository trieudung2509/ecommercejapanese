@extends('admin.partials.master')

@section('title', 'Add Product')
@section('stylecss')
    <link href="{{ asset('css/imageuploadify.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="product-form">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9 col-9">
                                <h4 class="card-title">Basic Information</h4>
                                {{-- <p class="card-title-desc">Fill all information below</p> --}}
                            </div>
                            <div class="col-sm-3 col-3 text-right">
                                <button id="submit-form" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                <a href="{{ route('admin.cate_product.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <span class="required-star">*</span>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter Product Name">
                                </div>                                
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="cate_product_id">Category Product</label>
                                    <select class="form-control" name="cate_product_id" id="cate_product_id">
                                        <option>Default select</option>
                                    </select>
                                </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter Slug">
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <label for="origin">Origin</label>
                                    <input name="origin" type="text" class="form-control" id="origin" placeholder="Enter Origin">
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Enter Slug"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Image Product</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" value="" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="preview-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">List Image Product</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="form-group">
                                    <div class="">
                                        <input type="file" name="image_detail" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple id="image_detail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Meta Data</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
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
                
            </form>
        </section>       
    </div>
</div>
@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/form-element.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/imageuploadify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('#image_detail').imageuploadify();
            })
    </script>
@endsection
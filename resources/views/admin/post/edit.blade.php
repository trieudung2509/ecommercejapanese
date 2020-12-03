@extends('admin.partials.master')

@section('title', 'Edit Post')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit Post</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Edit Post</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
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
                                        <a href="{{ route('admin.post.list') }}" class="btn btn-secondary waves-effect">Cancel</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Post Name</label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{$post->name ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input id="position" name="position" type="text" class="form-control" value="{{$post->position ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label"> Category </label>
                                            <select class="form-control select2" name="cate_post_id">
                                                <option value="0">Select Category</option>
                                                <?php  menu($cate_post, '','',$post->cate_post_id);?>
                                            </select>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch mb-3" dir="ltr">
                                                <input type="checkbox" class="custom-control-input" name="status" id="status" {{$post->status == 1 ? "checked" : ""}}>
                                                <label class="custom-control-label" for="status">Status</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch mb-3" dir="ltr">
                                                <input type="checkbox" class="custom-control-input" name="is_home" id="is_home" {{$post->status == 1 ? "checked" : ""}}>
                                                <label class="custom-control-label" for="is_home">In home</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Content Post</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Post Thumbnail</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @if (isset($post->image))
                                                <div class="form-group">
                                                    <img class="rounded mr-2" alt="200x200" width="200" src="{{ asset($post->image ?? '') }}" data-holder-rendered="true">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input id="description" name="description" type="text" class="form-control" value="{{$post->description}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea class="form-control" id="summernote-editor" name="content"/>{{$post->content ?? ''}}</textarea>
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
                                            <label for="title-seo">Meta title</label>
                                            <input id="title-seo" name="title-seo" type="text" class="form-control" value="{{$post->title_seo}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="meta-key">Meta Keywords</label>
                                            <input id="meta-key" name="meta-key" type="text" class="form-control" value="{{$post->meta_key}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="meta-des">Meta Description</label>
                                            <textarea class="form-control" id="meta-des" name="meta-des" rows="5">{{$post->meta_des}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                            lfmItems.forEach(function (lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['popovers', ['lfm']]
                ],
                buttons: {
                    lfm: LFMButton
                }
            })
        });
    </script>
@endsection

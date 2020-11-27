@extends('admin.partials.master')

@section('title', 'Add Users')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add User</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                                    <a href="{{ route('admin.users.list') }}" class="btn btn-secondary waves-effect">Cancel</a>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>User Name <span class="required-star">*</span></label>
                                        <input name="name" type="text" class="form-control" value="{{ old('name') }}" required >
                                        @if($errors->has('name'))
                                            <p class="required-star">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label >Email <span class="required-star">*</span></label>
                                        <input name="email" type="text" class="form-control" value="{{ old('email') }}">
                                        @if($errors->has('email'))
                                            <p class="required-star">{{ $errors->first('email') }}</p>
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
                                        <label for="productname">Password <span class="required-star">*</span></label>
                                        <input name="password" type="password" required class="form-control" value="{{ old('password') }}">
                                        @if($errors->has('password'))
                                            <p class="required-star">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Role </label>
                                        <select class="form-control select2" name="role">
                                            <option value="{{ \App\Enum\RoleEnum::ADMIN['id'] }}">{{ \App\Enum\RoleEnum::ADMIN['name'] }}</option>
                                            <option value="{{ \App\Enum\RoleEnum::USER['id'] }}">{{ \App\Enum\RoleEnum::USER['name'] }}</option>
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
                            <h4 class="card-title">Image Avatar</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                        <input type="file" name="avatar" value="{{ old('avatar') }}" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
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
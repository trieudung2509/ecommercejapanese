@extends('admin.partials.master')

@section('title', 'Profile Information User')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
               <div class="col-xl-5">
                  <div class="card overflow-hidden">
                     <div class="bg-soft-primary">
                        <div class="row">
                           <div class="col-7">
                              <div class="text-primary p-3">
                                 <h5 class="text-primary">Welcome Back !</h5>
                                 <p>It will seem like simplified</p>
                              </div>
                           </div>
                           <div class="col-5 align-self-end">
                              @if (!empty($user->avatar))
                                 <img src="{{ asset($user->avatar) }}" alt="" class="img-fluid">
                              @else
                                 <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="card-body pt-0">
                        <div class="row">
                           <div class="col-sm-4">
                              <div class="avatar-md profile-user-wid mb-4">
                                 <img src="{{ asset('images/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                              </div>
                           <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>
                           <p class="text-muted mb-0 text-truncate">{{ $user->roles->name }}</p>
                           </div>
                           <div class="col-sm-8">
                              <div class="pt-4">
                                 <div class="row">
                                    <div class="col-6">
                                       <h5 class="font-size-15">0</h5>
                                       <p class="text-muted mb-0">User</p>
                                    </div>
                                    <div class="col-6">
                                       <h5 class="font-size-15">0</h5>
                                       <p class="text-muted mb-0">Products</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title mb-4">Personal Information</h4>
                        <div class="table-responsive">
                           <table class="table table-nowrap mb-0">
                              <tbody>
                                 <tr>
                                    <th scope="row">Full Name :</th>
                                    <td>{{ $user->name }}</td>
                                 </tr>
                                 <tr>
                                    <th scope="row">Status :</th>
                                    <td>
                                       @if ($user->status == 1)
                                          <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                       @else
                                          <span class="badge badge-pill badge-soft-danger font-size-12">InActive</span>
                                       @endif
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ $user->email }}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.partials.master')
@section('title', 'Home-Admin')
@section('content')
<div class="content-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

      <div class="page-content">
          <div class="container-fluid">

              <!-- start page title -->
              <div class="row">
                  <div class="col-12">
                      <div class="page-title-box d-flex align-items-center justify-content-between">
                          <h4 class="mb-0 font-size-18">Dashboard</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                  <li class="breadcrumb-item active">Dashboard</li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->

              <div class="row">
                  <div class="col-xl-4">
                      <div class="card overflow-hidden">
                          <div class="bg-soft-primary">
                              <div class="row">
                                  <div class="col-7">
                                      <div class="text-primary p-3">
                                          <h5 class="text-primary">Welcome Back !</h5>
                                          <p>Skote Dashboard</p>
                                      </div>
                                  </div>
                                  <div class="col-5 align-self-end">
                                      <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                                  </div>
                              </div>
                          </div>
                          <div class="card-body pt-0">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <div class="avatar-md profile-user-wid mb-4">
                                          <img src="{{ asset('images/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                                      </div>
                                      <h5 class="font-size-15 text-truncate">Henry Price</h5>
                                      <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                                  </div>

                                  <div class="col-sm-8">
                                      <div class="pt-4">

                                          <div class="row">
                                              <div class="col-6">
                                                  <h5 class="font-size-15">125</h5>
                                                  <p class="text-muted mb-0">Projects</p>
                                              </div>
                                              <div class="col-6">
                                                  <h5 class="font-size-15">$1245</h5>
                                                  <p class="text-muted mb-0">Revenue</p>
                                              </div>
                                          </div>
                                          <div class="mt-4">
                                              <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-8">
                      <div class="row">
                          <div class="col-md-4">
                              <div class="card mini-stats-wid">
                                  <div class="card-body">
                                      <div class="media">
                                          <div class="media-body">
                                              <p class="text-muted font-weight-medium">Orders</p>
                                              <h4 class="mb-0">1,235</h4>
                                          </div>

                                          <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                              <span class="avatar-title">
                                                  <i class="bx bx-copy-alt font-size-24"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card mini-stats-wid">
                                  <div class="card-body">
                                      <div class="media">
                                          <div class="media-body">
                                              <p class="text-muted font-weight-medium">Revenue</p>
                                              <h4 class="mb-0">$35, 723</h4>
                                          </div>

                                          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                              <span class="avatar-title rounded-circle bg-primary">
                                                  <i class="bx bx-archive-in font-size-24"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card mini-stats-wid">
                                  <div class="card-body">
                                      <div class="media">
                                          <div class="media-body">
                                              <p class="text-muted font-weight-medium">Average Price</p>
                                              <h4 class="mb-0">$16.2</h4>
                                          </div>

                                          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                              <span class="avatar-title rounded-circle bg-primary">
                                                  <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- end row -->

                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title mb-4 float-sm-left">Email Sent</h4>
                              <div class="float-sm-right">
                                  <ul class="nav nav-pills">
                                      <li class="nav-item">
                                          <a class="nav-link" href="#">Week</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="#">Month</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link active" href="#">Year</a>
                                      </li>
                                  </ul>
                              </div>
                              <div class="clearfix"></div>
                              <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- end row -->
          </div>
          <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <!-- Modal -->
      <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                      <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                      <div class="table-responsive">
                          <table class="table table-centered table-nowrap">
                              <thead>
                                  <tr>
                                      <th scope="col">Product</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Price</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">
                                          <div>
                                              <img src="{{ asset('images/img-7.png') }}" alt="" class="avatar-sm">
                                          </div>
                                      </th>
                                      <td>
                                          <div>
                                              <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                              <p class="text-muted mb-0">$ 225 x 1</p>
                                          </div>
                                      </td>
                                      <td>$ 255</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">
                                          <div>
                                              <img src="{{ asset('images/img-4.png') }}" alt="" class="avatar-sm">
                                          </div>
                                      </th>
                                      <td>
                                          <div>
                                              <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                              <p class="text-muted mb-0">$ 145 x 1</p>
                                          </div>
                                      </td>
                                      <td>$ 145</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="m-0 text-right">Sub Total:</h6>
                                      </td>
                                      <td>
                                          $ 400
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="m-0 text-right">Shipping:</h6>
                                      </td>
                                      <td>
                                          Free
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                          <h6 class="m-0 text-right">Total:</h6>
                                      </td>
                                      <td>
                                          $ 400
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- end modal -->

      <footer class="footer">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-6">
                      <script>document.write(new Date().getFullYear())</script> © Skote.
                  </div>
                  <div class="col-sm-6">
                      <div class="text-sm-right d-none d-sm-block">
                          Design & Develop by Themesbrand
                      </div>
                  </div>
              </div>
          </div>
      </footer>
  <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
  <div data-simplebar class="h-100">
      <div class="rightbar-title px-3 py-4">
          <a href="javascript:void(0);" class="right-bar-toggle float-right">
              <i class="mdi mdi-close noti-icon"></i>
          </a>
          <h5 class="m-0">Settings</h5>
      </div>

      <!-- Settings -->
      <hr class="mt-0" />
      <h6 class="text-center mb-0">Choose Layouts</h6>

      <div class="p-4">
          <div class="mb-2">
              <img src="{{ asset('images/layout-1.jpg') }}" class="img-fluid img-thumbnail" alt="">
          </div>
          <div class="custom-control custom-switch mb-3">
              <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
              <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
          </div>

          <div class="mb-2">
              <img src="{{ asset('images/layout-2.jpg') }}" class="img-fluid img-thumbnail" alt="">
          </div>
          <div class="custom-control custom-switch mb-3">
              <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
              <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
          </div>

          <div class="mb-2">
              <img src="{{ asset('images/layout-3.jpg') }}" class="img-fluid img-thumbnail" alt="">
          </div>
          <div class="custom-control custom-switch mb-5">
              <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
              <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
          </div>

  
      </div>

  </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
@endsection
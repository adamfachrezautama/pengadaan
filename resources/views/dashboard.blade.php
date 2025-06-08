@extends('layouts.app')


@section('content')

        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard v2</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard v2</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="shadow-sm info-box-icon text-bg-primary">
                    <i class="bi bi-gear-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                      10
                      <small>%</small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="shadow-sm info-box-icon text-bg-danger">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">41,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <!-- fix for small devices only -->
              <!-- <div class="clearfix hidden-md-up"></div> -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="shadow-sm info-box-icon text-bg-success">
                    <i class="bi bi-cart-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Sales</span>
                    <span class="info-box-number">760</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="shadow-sm info-box-icon text-bg-warning">
                    <i class="bi bi-people-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">New Members</span>
                    <span class="info-box-number">2,000</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
              <div class="col-md-12">

                <!--begin::Latest Order Widget-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Submission</h3>
                    <div class="card-tools">
                       <form class="d-flex" role="search">
                            <input
                              class="form-control me-2"
                              type="search"
                              placeholder="Search"
                              aria-label="Search"
                            />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="p-0 card-body">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                          <tr>
                            <th>Submission Number</th>
                            <th>Department</th>
                            <th>User</th>
                            <th>Submission Reason</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <a
                                href="pages/examples/invoice.html"
                                class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                >OR9842</a
                              >
                            </td>
                            <td>Call of Duty IV</td>
                            <td>user1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit quasi incidunt culpa quod quae rem, adipisci dignissimos eaque dolor sit ipsum cum, blanditiis facere officiis ullam exercitationem. Quos, dolores a.</td>
                            <td><span class="badge text-bg-success"> Shipped </span></td>
                          </tr>


                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <div class="clearfix card-footer">
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary float-start">
                      Place New Order
                    </a>
                    <ul class="pagination pagination-sm float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>

                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->



@endsection

@extends('layouts.app')

@section('content')

        <!--begin::App Content Top Area-->
        <div class="app-content-top-area">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6 text-end">
                <a type="submit" class="btn btn-primary" href="{{ route('department.create') }}">
                  Add Department
                </a>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Bottom Area-->
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->

          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="md-12 card">
                  <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h3>Department</h3></div>
                        <div class="col-md-6 text-end">
                            <form class="d-flex" role="search">
                            <input
                              class="form-control me-1"
                              type="search"
                              placeholder="Search"
                              aria-label="Search"
                            />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
              </div>
            </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Department Name</th>
                          <th>Department Code</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td>1.</td>
                          <td>Department Information Technology</td>
                          <td>
                           IT
                          </td>
                          <td style="width: 120px">
                            <span class="badge text-bg-danger"  style="margin-left: 15px">
                                <i class="bi bi-trash"></i>
                            </span>
                             <span class="badge text-bg-success" style="margin-left: 15px">
                               <i class="bi bi-pencil"></i>
                            </span>

                        </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="clearfix card-footer">
                    <ul class="m-0 pagination pagination-sm float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
        <!--begin::App Content Bottom Area-->
          <!--end::Container-->
        <!--end::App Content Bottom Area-->


@endsection

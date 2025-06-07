@extends('layouts.app')

@section('content')
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"></h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">General Form</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">

              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="mb-12 card card-primary card-outline">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Edit Department {{$department->department_name}}</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{route('departments.update', $department->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$department->id}}">
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="department_name" class="form-label">department name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="department_name"
                          name="department_name"
                          aria-describedby="department_name"
                            value="{{old('department_name') ?: $department->department_name}}"
                        />
                      </div>
                       <div class="mb-3">
                        <label for="department_code" class="form-label">department code</label>
                        <input
                          type="text"
                          class="form-control"
                          id="department_code"
                          name="department_code"
                          aria-describedby="department_code"
                            value="{{old('department_code') ?: $department->department_code}}"
                        />
                      </div>


                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->

                  <!--begin::JavaScript-->
                  <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (() => {
                      'use strict';

                      // Fetch all the forms we want to apply custom Bootstrap validation styles to
                      const forms = document.querySelectorAll('.needs-validation');

                      // Loop over them and prevent submission
                      Array.from(forms).forEach((form) => {
                        form.addEventListener(
                          'submit',
                          (event) => {
                            if (!form.checkValidity()) {
                              event.preventDefault();
                              event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                          },
                          false,
                        );
                      });
                    })();
                  </script>
                  <!--end::JavaScript-->
                </div>
                <!--end::Form Validation-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
                @endsection

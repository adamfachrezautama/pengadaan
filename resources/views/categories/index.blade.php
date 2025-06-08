@extends('layouts.app')

@section('content')

        <!--begin::App Content Top Area-->
        <div class="app-content-top-area">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6 text-end">
                <a type="submit" class="btn btn-primary" href="{{ route('categories.create') }}">
                  Add Category
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
                        <div class="col-md-6"><h3>Category</h3></div>
                        <div class="col-md-6 text-end">
                            <form class="d-flex" role="search">
                            <input
                              class="form-control me-1"
                              name= "search"
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
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($categories as $category)
                        <tr class="align-middle">
                        <td>{{$category->id}}</td>
                        <td>{{$category->description}}</td>
                        <td style="width: 120px">
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil"></i> Edit
                                </a>

                                {{-- Tombol Delete --}}
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                </form>
                            </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                        <td colspan="3" class="text-center">No Categories registered</td>
                        </tr>
                        @endforelse

                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="clearfix card-footer">
                    <ul class="m-0 pagination pagination-sm float-end">
                     <div class="clearfix card-footer">
                        {{ $categories->links('pagination::bootstrap-5') }}
                        </div>
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

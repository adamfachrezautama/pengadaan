@extends('layouts.app')

@section('content')

        <!--begin::App Content Top Area-->
        <div class="app-content-top-area">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6 text-end">
                <a type="submit" class="btn btn-primary" href="{{ route('transactions.create') }}">
                  Add Transaction
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
                        <div class="col-md-6"><h3>Transaction</h3></div>
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
                          <th>Item Name</th>
                          <th>amount</th>
                          <th>Type</th>
                          <th>Name</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($transactions as $transaction)
                        <tr class="align-middle">
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->item->item_name ?? '-' }}</td>
                        <td>{{ $transaction->jumlah ?? '-' }}</td>
                        <td>{{ $transaction->tipe }}</td>
                         <td>{{ $transaction->user->name ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="3" class="text-center">No Transactions registered</td>
                        </tr>
                        @endforelse

                      </tbody>
                    </table>
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

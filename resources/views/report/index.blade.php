@extends('layouts.app')

@section('content')

        <!--begin::App Content Top Area-->
        <div class="app-content-top-area">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6 text-end">
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
                        <div class="col-md-6"><h3>Report</h3></div>
                        <div class="col-md-6 text-end">

    {{-- Filter --}}
    <form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="category_id" class="form-control">
                <option value="">-- Semua Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="tipe" class="form-control">
                <option value="">-- Semua Tipe --</option>
                <option value="masuk" {{ request('tipe')=='masuk'?'selected':'' }}>Masuk</option>
                <option value="keluar" {{ request('tipe')=='keluar'?'selected':'' }}>Keluar</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="date" name="from" value="{{ request('from') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <input type="date" name="to" value="{{ request('to') }}" class="form-control">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>
             {{-- Tabel laporan --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $trx)
            <tr>
                <td>{{ $trx->tanggal }}</td>
                <td>{{ $trx->item->item_name }}</td>
                <td>{{ $trx->item->category->description ?? '-' }}</td>
                <td>
                    <span class="badge bg-{{ $trx->tipe=='masuk'?'success':'danger' }}">
                        {{ ucfirst($trx->tipe) }}
                    </span>
                </td>
                <td>{{ $trx->jumlah }}</td>
                <td>{{ $trx->user->username }}</td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">Tidak ada transaksi</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $transactions->withQueryString()->links() }}
    </div>
</div>
@endsection

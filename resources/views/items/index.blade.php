@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Item</h2>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('items.index') }}" class="row g-3 mb-3">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Cari nama item..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('items.create') }}" class="btn btn-success">Tambah Item</a>
        </div>
    </form>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Items Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Brand</th>
                <th>Stok Total</th>
                <th>Kategori</th>
                 <th>harga</th>
                <th>gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->total_stock }}</td>
                    <td>{{ $item->category->description ?? '-' }}</td>
                    <td>{{ $item->category->price ?? '-' }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->item_name }}"
                                width="80" class="img-thumbnail">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('items.show', $item) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Tidak ada item.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>
</div>
@endsection

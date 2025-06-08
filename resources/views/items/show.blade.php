@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Item: {{ $item->item_name }}</h2>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $item->item_name }}</p>
            <p><strong>Brand:</strong> {{ $item->brand }}</p>
            <p><strong>Stok Total:</strong> {{ $item->total_stock }}</p>
            <p><strong>Kategori:</strong> {{ $item->category->description ?? '-' }}</p>

        </div>
    </div>

    <h4>Detail Serial Item</h4>
    @if($item->itemDetails->isEmpty())
        <p>Tidak ada detail.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
               @foreach($item->itemDetails as $detail)
                    <tr>
                        <td>{{ $detail->serial_number ?? '-' }}</td>
                        <td>{{ $detail->description ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $detail->status == 'available' ? 'success' : 'danger' }}">
                                {{ ($detail->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

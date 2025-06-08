@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Item Baru</h2>

    {{-- Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        {{-- Item --}}
        <div class="form-group">
            <label>Nama Item</label>
            <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" required>
        </div>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
        </div>

        <div class="form-group">
            <label>Total Stok</label>
            <input type="number" name="total_stock" class="form-control" min="1" value="{{ old('total_stock') }}" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Detail Item</h4>

        <div id="details-container">
            <div class="detail-group border p-3 mb-2">
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" name="details[0][serial_number]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="details[0][description]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="details[0][status]" class="form-control">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
                <button type="button" class="btn btn-danger remove-detail mt-2">Hapus</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-detail">+ Tambah Detail</button>

        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
</div>

{{-- Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let index = 1;

    $('#add-detail').on('click', function () {
        const detailHtml = `
            <div class="detail-group border p-3 mb-2">
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" name="details[${index}][serial_number]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="details[${index}][description]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="details[${index}][status]" class="form-control">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
                <button type="button" class="btn btn-danger remove-detail mt-2">Hapus</button>
            </div>
        `;
        $('#details-container').append(detailHtml);
        index++;
    });

    $(document).on('click', '.remove-detail', function () {
        $(this).closest('.detail-group').remove();
    });
</script>
@endsection

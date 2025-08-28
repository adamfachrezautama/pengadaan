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

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Nama Item --}}
    <div class="form-group">
        <label>Nama Item</label>
        <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" required>
    </div>

    {{-- Brand --}}
    <div class="form-group">
        <label>Brand</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
    </div>

    {{-- Total Stok --}}
    <div class="form-group">
        <label>Total Stok</label>
        <input type="number" name="total_stock" class="form-control" min="1" value="{{ old('total_stock') }}" required>
    </div>

     {{-- price --}}
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" min="1" value="{{ old('price') }}" required>
    </div>

    {{-- Kategori --}}
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

    {{-- Gambar --}}
    <div class="form-group">
        <label>Gambar Item</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
</form>

</div>
@endsection

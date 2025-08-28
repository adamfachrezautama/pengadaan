@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ITEM --}}
        <div class="form-group">
            <label>Nama Item</label>
            <input type="text" name="item_name" class="form-control" value="{{ old('item_name', $item->item_name) }}" required>
        </div>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand', $item->brand) }}" required>
        </div>

        <div class="form-group">
            <label>Total Stok</label>
            <input type="number" name="total_stock" class="form-control" value="{{ old('total_stock', $item->total_stock) }}" required>
        </div>

             {{-- price --}}
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" min="1" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Gambar Item</label>
            @if($item->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->item_name }}" width="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

         <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
        </div>
@endsection

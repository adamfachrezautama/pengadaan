@extends('layouts.app')

@section('title', 'Create Submission')

@section('content')
<div class="container-fluid">
  <h4>Create Submission</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      <form action="{{ route('submissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="item_id" class="form-label">Item</label>
          <select name="item_id" id="item_id" class="form-select" required>
            <option value="">-- Choose Item --</option>
            @foreach($items as $item)
              <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                {{ $item->item_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required min="1">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description (optional)</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('submissions.index') }}" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Submission Detail')

@section('content')
<div class="container-fluid">
  <h4>Submission Detail</h4>

  <div class="card">
    <div class="card-body">
      <p><strong>Item:</strong> {{ $submission->item->name ?? '-' }}</p>
      <p><strong>Quantity:</strong> {{ $submission->quantity }}</p>
      <p><strong>Description:</strong> {{ $submission->description ?? '-' }}</p>
      <p><strong>Status:</strong>
        <span class="badge bg-{{ $submission->status == 'approved' ? 'success' : ($submission->status == 'rejected' ? 'danger' : 'secondary') }}">
          {{ ucfirst($submission->status) }}
        </span>
      </p>
      <p><strong>Submitted At:</strong> {{ $submission->created_at->format('d M Y, H:i') }}</p>

      <a href="{{ route('submissions.index') }}" class="btn btn-primary">Back to List</a>
    </div>
  </div>
</div>
@endsection

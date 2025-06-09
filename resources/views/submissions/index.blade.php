@extends('layouts.app')
@section('title', 'Submissions')

@section('content')
<div class="container-fluid">
  <h4>Submissions</h4>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('submissions.create') }}" class="mb-3 btn btn-primary">+ New Submission</a>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Submission Number</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($submissions as $submission)
          <tr>
            <td>{{ $submission->submission_number }}</td>
            <td>{{ $submission->submission_date }}</td>
            <td>
              <a href="{{ route('submissions.show', $submission) }}" class="btn btn-info btn-sm">Detail</a>
              <a href="{{ route('submissions.edit', $submission) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('submissions.destroy', $submission) }}" method="POST" style="display:inline-block;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this submission?')">Delete</button>
              </form>
            </td>
            <td>
             @if($submission->status === 'pending')
            <form action="{{ route('submissions.approve', $submission) }}" method="POST" style="display:inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            </form>

            <form action="{{ route('submissions.reject', $submission) }}" method="POST" style="display:inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
            </form>
        @else
            <span class="badge bg-{{ $submission->status === 'approved' ? 'success' : 'danger' }}">
                {{ ucfirst($submission->status) }}
            </span>
        @endif

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

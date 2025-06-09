@extends('layouts.app')
@section('title', 'User Detail')

@section('content')
<div class="container-fluid">
  <h4>User Detail</h4>

  <div class="card">
    <div class="card-body">
      <p><strong>NIP:</strong> {{ $user->nip }}</p>
      <p><strong>Name:</strong> {{ $user->name }}</p>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
      <p><strong>Department:</strong> {{ $user->department->name ?? '-' }}</p>
      <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y') }}</p>

      <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</div>
@endsection

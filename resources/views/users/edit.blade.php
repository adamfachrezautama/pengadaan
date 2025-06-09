@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
  <h4>Edit User</h4>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
          <label>Role</label>
          <select name="role" class="form-select">
            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Department</label>
          <select name="department_id" class="form-select">
            <option value="">-- None --</option>
            @foreach($departments as $dept)
              <option value="{{ $dept->id }}" {{ $user->department_id == $dept->id ? 'selected' : '' }}>
                {{ $dept->name }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
</div>
@endsection

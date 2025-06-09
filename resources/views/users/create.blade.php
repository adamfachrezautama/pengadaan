@extends('layouts.app')
@section('title', 'Add User')

@section('content')
<div class="container-fluid">
  <h4>Add New User</h4>

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
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Role</label>
          <select name="role" class="form-select" required>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Department</label>
          <select name="department_id" class="form-select">
            <option value="">-- None --</option>
            @foreach($departments as $dept)
              <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
</div>
@endsection

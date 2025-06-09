@extends('layouts.app')

@section('content')
<h2>Daftar User</h2>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('users.create') }}">Tambah User</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="{{ route('users.edit', $user) }}">Edit</a>
            <form method="POST" action="{{ route('users.destroy', $user) }}">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $users->links() }}
@endsection

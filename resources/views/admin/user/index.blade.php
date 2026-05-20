@extends('layouts.app')

@section('content')

<h4>Manajemen User</h4>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="/admin/user/create" class="btn btn-primary mb-3">
    Tambah User
</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>

    @foreach($users as $u)
    <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
            <span class="badge bg-info">
                {{ $u->role }}
            </span>
        </td>
        <td>
            <a href="/admin/user/edit/{{ $u->id }}"
               class="btn btn-warning btn-sm">
               Edit
            </a>

            <form action="/admin/user/delete/{{ $u->id }}"
                  method="POST"
                  style="display:inline">
                @csrf
                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $users->links() }}

@endsection
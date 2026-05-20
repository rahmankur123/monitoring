@extends('layouts.app')

@section('content')

<h4>Tambah User</h4>

<form action="/admin/user/store" method="POST">
@csrf

<input type="text"
       name="name"
       class="form-control mb-3"
       placeholder="Nama">

<input type="email"
       name="email"
       class="form-control mb-3"
       placeholder="Email">

<input type="password"
       name="password"
       class="form-control mb-3"
       placeholder="Password">

<select name="role" class="form-control mb-3">
    <option value="admin">Admin</option>
    <option value="bendahara">Bendahara</option>
    <option value="takmir">Takmir</option>
</select>

<button class="btn btn-primary">
    Simpan
</button>

</form>

@endsection
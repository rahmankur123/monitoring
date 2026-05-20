@extends('layouts.app')

@section('content')

<h4>Edit User</h4>

<form action="/admin/user/update/{{ $user->id }}"
      method="POST">
@csrf

<input type="text"
       name="name"
       value="{{ $user->name }}"
       class="form-control mb-3">

<input type="email"
       name="email"
       value="{{ $user->email }}"
       class="form-control mb-3">

<input type="password"
       name="password"
       class="form-control mb-3"
       placeholder="Kosongkan jika tidak diubah">

<select name="role" class="form-control mb-3">

<option value="admin"
{{ $user->role=='admin'?'selected':'' }}>
Admin
</option>

<option value="bendahara"
{{ $user->role=='bendahara'?'selected':'' }}>
Bendahara
</option>

<option value="takmir"
{{ $user->role=='takmir'?'selected':'' }}>
Takmir
</option>

</select>

<button class="btn btn-primary">
    Update
</button>

</form>

@endsection
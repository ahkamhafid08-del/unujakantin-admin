@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">
Tambah Kategori
</div>

<div class="card-body">

<form action="{{ route('categories.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Nama Kategori</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option value="1">Aktif</option>

<option value="0">Nonaktif</option>

</select>

</div>

<button class="btn btn-primary">

Simpan

</button>

<a
href="{{ route('categories.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

@endsection
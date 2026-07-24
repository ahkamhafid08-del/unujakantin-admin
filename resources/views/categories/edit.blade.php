@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">
Edit Kategori
</div>

<div class="card-body">

<form action="{{ route('categories.update',$category->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Nama Kategori</label>

<input
type="text"
name="name"
class="form-control"
value="{{ $category->name }}"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="1"
{{ $category->status ? 'selected' : '' }}>
Aktif
</option>

<option value="0"
{{ !$category->status ? 'selected' : '' }}>
Nonaktif
</option>

</select>

</div>

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('categories.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

@endsection
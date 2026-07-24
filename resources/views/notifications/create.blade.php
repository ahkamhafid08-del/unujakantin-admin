@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="bi bi-plus-circle"></i>
                Tambah Notifikasi
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('notifications.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Judul

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                    >

                    @error('title')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Pesan

                    </label>

                    <textarea
                        name="message"
                        rows="5"
                        class="form-control @error('message') is-invalid @enderror"
                    >{{ old('message') }}</textarea>

                    @error('message')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('notifications.index') }}"
                       class="btn btn-secondary me-2">

                        Kembali

                    </a>

                    <button class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
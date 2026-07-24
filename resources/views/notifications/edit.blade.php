@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i>
                Edit Notifikasi
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('notifications.update',$notification->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Judul

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title',$notification->title) }}"
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
                    >{{ old('message',$notification->message) }}</textarea>

                    @error('message')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select
                        name="is_read"
                        class="form-select">

                        <option value="0"
                            {{ $notification->is_read==0 ? 'selected' : '' }}>
                            Belum Dibaca
                        </option>

                        <option value="1"
                            {{ $notification->is_read==1 ? 'selected' : '' }}>
                            Sudah Dibaca
                        </option>

                    </select>

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('notifications.index') }}"
                       class="btn btn-secondary me-2">

                        Kembali

                    </a>

                    <button class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
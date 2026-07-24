@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">
                <i class="bi bi-pencil-square text-warning"></i>
                Edit Meja
            </h3>
        </div>

        <a href="{{ route('tables.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('tables.update',$table->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nomor Meja
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="table_number"
                        value="{{ $table->table_number }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kapasitas
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        name="capacity"
                        value="{{ $table->capacity }}"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="1"
                            {{ $table->status ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0"
                            {{ !$table->status ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>

                </div>

                <button class="btn btn-warning">

                    <i class="bi bi-save"></i>

                    Update

                </button>

                <a href="{{ route('tables.index') }}"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

            </form>

        </div>

    </div>

</div>

@endsection
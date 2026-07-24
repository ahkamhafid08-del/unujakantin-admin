@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">
                <i class="bi bi-plus-circle-fill text-primary"></i>
                Tambah Meja
            </h3>
            <p class="text-muted mb-0">
                Tambahkan meja baru.
            </p>
        </div>

        <a href="{{ route('tables.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('tables.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nomor Meja
                    </label>

                    <input
                        type="text"
                        name="table_number"
                        class="form-control"
                        placeholder="Contoh : 12"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kapasitas
                    </label>

                    <input
                        type="number"
                        name="capacity"
                        class="form-control"
                        placeholder="4"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="1">
                            Aktif
                        </option>

                        <option value="0">
                            Nonaktif
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan
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
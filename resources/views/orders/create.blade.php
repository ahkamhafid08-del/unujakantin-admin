@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">
                <i class="bi bi-cart-plus-fill text-primary"></i>
                Tambah Pesanan
            </h3>
            <p class="text-muted mb-0">
                Tambahkan pesanan baru ke sistem kantin.
            </p>
        </div>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('orders.store') }}" method="POST">

                @csrf

                <div class="row">

                    <!-- Nama Pemesan -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Pemesan
                        </label>

                        <input type="text"
                               name="customer_name"
                               class="form-control"
                               placeholder="Contoh : Ahmad"
                               required>

                    </div>

                    <!-- Pilih Meja -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Meja
                        </label>

                        <select name="table_number" class="form-select" required>

                        <option value="">Pilih Meja</option>

                        @foreach($tables as $table)

                            <option value="{{ $table->table_number }}">
                                Meja {{ $table->table_number }}
                            </option>

                        @endforeach

                    </select>

                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Metode Pembayaran
                        </label>

                        <select name="payment_method" class="form-select" required>

                            <option value="">Pilih Metode</option>
                            <option value="QRIS">QRIS</option>
                            <option value="Cash">Cash</option>

                        </select>

                    </div>

                    <!-- Total Harga -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Total Harga
                        </label>

                        <input type="number"
                               name="total_price"
                               class="form-control"
                               placeholder="10000"
                               required>

                    </div>

                    <!-- Status Pesanan -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select" required>

                            <option value="pending">Pending</option>
                            <option value="processing">Preparing</option>
                            <option value="ready">Ready</option>
                            <option value="completed">Completed</option>

                        </select>

                    </div>

                </div>

                <hr>

                <button class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan Pesanan
                </button>

                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
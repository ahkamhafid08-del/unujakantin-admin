    @extends('layouts.app')

    @section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold">
                    <i class="bi bi-pencil-square text-warning"></i>
                    Edit Pesanan
                </h3>

                <p class="text-muted mb-0">
                    Perbarui data pesanan pelanggan.
                </p>

            </div>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

        </div>

        <div class="card shadow border-0 rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('orders.update',$order->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- Nama Customer -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nama Customer
                            </label>

                            <input
                                type="text"
                                name="customer_name"
                                class="form-control"
                                value="{{ old('customer_name',$order->customer_name) }}"
                                required>

                        </div>

                        <!-- Meja -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Meja
                            </label>

                            <select name="table_number" class="form-select">

                                @foreach($tables as $table)

                                    <option
                                        value="{{ $table->table_number }}"
                                        {{ $table->table_number == $order->table_number ? 'selected' : '' }}>

                                        Meja {{ $table->table_number }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Pembayaran -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select name="payment_method"
                                    class="form-select">

                                <option value="Cash"
                                    {{ $order->payment_method=='Cash' ? 'selected' : '' }}>
                                    Cash
                                </option>

                                <option value="QRIS"
                                    {{ $order->payment_method=='QRIS' ? 'selected' : '' }}>
                                    QRIS
                                </option>

                            </select>

                        </div>

                        <!-- Total -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Total Harga
                            </label>

                            <input
                                type="number"
                                name="total"
                                class="form-control"
                                value="{{ old('total',$order->total) }}"
                                required>

                        </div>

                        <!-- Status -->
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Status Pesanan
                                </label>

                                <select name="status" class="form-select">

                                    <option value="pending"
                                        {{ $order->status=='pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="processing"
                                        {{ $order->status=='processing' ? 'selected' : '' }}>
                                        Preparing
                                    </option>

                                    <option value="ready"
                                        {{ $order->status=='ready' ? 'selected' : '' }}>
                                        Ready
                                    </option>

                                    <option value="completed"
                                        {{ $order->status=='completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                </select>

                            </div>

                    </div>

                    <hr>

                    <button class="btn btn-warning">

                        <i class="bi bi-check-circle"></i>

                        Update Pesanan

                    </button>

                    <a href="{{ route('orders.index') }}"
                    class="btn btn-outline-secondary">

                        Batal

                    </a>

                </form>

            </div>

        </div>

    </div>

    @endsection
@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold">
            <i class="bi bi-speedometer2 text-primary"></i>
            Dashboard
        </h2>

        <p class="text-muted">
            Selamat datang di Sistem Admin UnujaKantin.
        </p>

    </div>

    <div class="row g-4">

        <!-- Produk -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Produk
                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalProducts }}

                        </h2>

                    </div>

                    <i class="bi bi-cup-hot-fill text-primary fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Kategori -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Kategori

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalCategories }}

                        </h2>

                    </div>

                    <i class="bi bi-grid-fill text-success fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Meja -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Meja

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalTables }}

                        </h2>

                    </div>

                    <i class="bi bi-table text-warning fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Pesanan -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Pesanan

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalOrders }}

                        </h2>

                    </div>

                    <i class="bi bi-cart-check-fill text-danger fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Promo -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Promo

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalPromotions }}

                        </h2>

                    </div>

                    <i class="bi bi-gift-fill text-info fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Review -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Review

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalReviews }}

                        </h2>

                    </div>

                    <i class="bi bi-star-fill text-warning fs-1"></i>

                </div>

            </div>

        </div>

        <!-- Notifikasi -->
        <div class="col-xl-3 col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Total Notifikasi

                        </small>

                        <h2 class="fw-bold mb-0">

                            {{ $totalNotifications }}

                        </h2>

                    </div>

                    <i class="bi bi-bell-fill text-secondary fs-1"></i>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
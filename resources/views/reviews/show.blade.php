@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                <i class="bi bi-chat-square-text-fill text-primary"></i>
                Detail Review
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap review pelanggan.
            </p>

        </div>

        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <table class="table">

                <tr>
                    <th width="220">Nama Customer</th>
                    <td>{{ $review->order->customer_name ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Nomor Meja</th>
                    <td>
                       Meja {{ $review->order->table_number ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>
                        {{ $review->order->payment_method ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Total Pembayaran</th>
                    <td>

                        @if($review->order)

                            Rp {{ number_format($review->order->total,0,',','.') }}

                        @else

                            -

                        @endif

                    </td>
                </tr>

                <tr>
                    <th>Rating</th>

                    <td>

                        @for($i=1;$i<=5;$i++)

                            @if($i <= $review->rating)

                                ⭐

                            @else

                                ☆

                            @endif

                        @endfor

                        ({{ $review->rating }}/5)

                    </td>

                </tr>

                <tr>

                    <th>Komentar</th>

                    <td>

                        {{ $review->comment }}

                    </td>

                </tr>

                <tr>

                    <th>Tanggal Review</th>

                    <td>

                        {{ $review->created_at->format('d F Y H:i') }}

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>

@endsection
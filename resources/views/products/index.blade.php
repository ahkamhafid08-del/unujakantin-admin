@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        <i class="bi bi-box-seam text-primary"></i>
        Produk
    </h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Produk
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table id="productTable" class="table table-hover table-bordered align-middle">

                <thead class="table-light">

                    <tr>
                        <th width="50">No</th>
                        <th width="90">Gambar</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th width="160">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td class="text-center">

                            @if($product->image)

                                <img src="{{ asset('uploads/products/'.$product->image) }}"
                                     width="70"
                                     height="70"
                                     class="rounded shadow-sm object-fit-cover"
                                     loading="lazy"
                                     alt="{{ $product->product_name }}">

                            @else

                                <span class="text-muted small">
                                    Tidak ada
                                </span>

                            @endif

                        </td>

                        <td>

                            <strong>{{ $product->product_name }}</strong>

                            <br>

                            <small class="text-muted">

                                {{ \Illuminate\Support\Str::limit($product->description,40) }}

                            </small>

                        </td>

                        <td>

                            {{ $product->category->name ?? '-' }}

                        </td>

                        <td>

                            Rp {{ number_format($product->price,0,',','.') }}

                        </td>

                        <td>

                            @if($product->status)

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Nonaktif
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('products.edit',$product->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form action="{{ route('products.destroy',$product->id) }}"
                                  method="POST"
                                  class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center text-muted">

                            Belum ada produk.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Produk?',
            text: 'Produk yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

$(document).ready(function(){

    $('#productTable').DataTable({

        responsive: true,

        pageLength: 10,

        language:{

            search: "🔍 Cari :",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            zeroRecords: "Data tidak ditemukan",

            infoEmpty: "Belum ada data",

            paginate:{
                previous: "Sebelumnya",
                next: "Berikutnya"
            }

        }

    });

});

</script>

@endsection
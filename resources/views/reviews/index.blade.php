@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            <i class="bi bi-star-fill text-warning"></i>
            Data Review
        </h2>

        <small class="text-muted">
            Daftar ulasan pelanggan.
        </small>
    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <table id="reviewTable" class="table table-bordered table-hover align-middle">

            <thead class="table-primary">

                <tr>

                    <th width="50">No</th>
                    <th>Customer</th>
                    <th>Meja</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($reviews as $review)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        {{ $review->order->customer_name ?? '-' }}

                    </td>

                    <td>

                        Meja {{ $review->order->table_number ?? '-' }}

                    </td>

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

                    <td>

                        {{ \Illuminate\Support\Str::limit($review->comment,40) }}

                    </td>

                    <td>

                        {{ $review->created_at->format('d M Y') }}

                    </td>

                    <td>

                        <a href="{{ route('reviews.show',$review->id) }}"
                           class="btn btn-info btn-sm">

                            Detail

                        </a>

                        <form
                            action="{{ route('reviews.destroy',$review->id) }}"
                            method="POST"
                            class="d-inline delete-form">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada review.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit',function(e){

        e.preventDefault();

        Swal.fire({

            title:'Hapus Review?',

            text:'Review akan dihapus permanen.',

            icon:'warning',

            showCancelButton:true,

            confirmButtonColor:'#dc3545',

            cancelButtonColor:'#6c757d',

            confirmButtonText:'Ya, Hapus',

            cancelButtonText:'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

$(document).ready(function(){

    $('#reviewTable').DataTable({

        responsive:true,

        pageLength:10,

        language:{

            search:"🔍 Cari :",

            lengthMenu:"Tampilkan _MENU_ data",

            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            zeroRecords:"Data tidak ditemukan",

            infoEmpty:"Belum ada data",

            paginate:{

                previous:"Sebelumnya",

                next:"Berikutnya"

            }

        }

    });

});

</script>

@endsection
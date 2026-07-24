@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Promo</h2>

    <a href="{{ route('promotions.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Promo
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table id="promotionTable" class="table table-hover table-bordered align-middle">

            <thead class="table-light">

                <tr>

                    <th width="50">No</th>

                    <th width="120">Banner</th>

                    <th>Judul Promo</th>

                    <th>Periode</th>

                    <th>Status</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($promotions as $promotion)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td class="text-center">

                        @if($promotion->image)

                            <img src="{{ asset('uploads/promotions/'.$promotion->image) }}"
                                 width="100"
                                 class="rounded shadow-sm">

                        @else

                            <span class="text-muted">Tidak ada</span>

                        @endif

                    </td>

                    <td>

                        <strong>{{ $promotion->title }}</strong>

                        <br>

                        <small class="text-muted">

                            {{ Str::limit($promotion->description,40) }}

                        </small>

                    </td>

                    <td>

                        {{ date('d M Y', strtotime($promotion->start_date)) }}

                        <br>

                        s/d

                        <br>

                        {{ date('d M Y', strtotime($promotion->end_date)) }}

                    </td>

                    <td>

                        @if($promotion->status)

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

                        <a href="{{ route('promotions.edit',$promotion->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('promotions.destroy',$promotion->id) }}"
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

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit',function(e){

        e.preventDefault();

        Swal.fire({

            title:'Hapus Promo?',

            text:'Data promo akan dihapus permanen.',

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

    $('#promotionTable').DataTable({

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
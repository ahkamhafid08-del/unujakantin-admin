@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                <i class="bi bi-bell-fill text-warning"></i>
                Data Notifikasi
            </h2>

            <p class="text-muted mb-0">
                Daftar notifikasi sistem.
            </p>
        </div>

        <a href="{{ route('notifications.create') }}"
           class="btn btn-primary rounded-pill">

            <i class="bi bi-plus-circle"></i>

            Tambah Notifikasi

        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <table class="table table-hover align-middle" id="notificationTable">

                <thead class="table-primary">

                    <tr>

                        <th width="60">No</th>

                        <th>Judul</th>

                        <th>Pesan</th>

                        <th width="120">Status</th>

                        <th width="170">Tanggal</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($notifications as $notification)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <strong>

                                {{ $notification->title }}

                            </strong>

                        </td>

                        <td>

                            {{ $notification->message }}

                        </td>

                        <td>

                            @if($notification->is_read)

                                <span class="badge bg-success">

                                    Sudah Dibaca

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    Belum Dibaca

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $notification->created_at->format('d M Y H:i') }}

                        </td>

                        <td>

                            <a href="{{ route('notifications.edit',$notification->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('notifications.destroy',$notification->id) }}"
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

                        <td colspan="6"
                            class="text-center text-muted">

                            Belum ada notifikasi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

$('.delete-form').submit(function(e){

    e.preventDefault();

    let form = this;

    Swal.fire({

        title:'Hapus Notifikasi?',

        text:'Data akan dihapus.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#d33',

        cancelButtonColor:'#6c757d',

        confirmButtonText:'Ya',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            form.submit();

        }

    });

});

$(document).ready(function(){

    $('#notificationTable').DataTable({

        responsive:true,

        pageLength:10,

        language:{

            search:"Cari :",

            lengthMenu:"Tampilkan _MENU_ data",

            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            zeroRecords:"Data tidak ditemukan",

            paginate:{

                previous:"Sebelumnya",

                next:"Berikutnya"

            }

        }

    });

});

</script>

@endsection
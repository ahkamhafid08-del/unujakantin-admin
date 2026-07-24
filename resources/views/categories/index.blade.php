@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-grid-fill text-primary"></i>
            Kategori Produk
        </h3>

        <p class="text-muted mb-0">
            Kelola seluruh kategori menu kantin
        </p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Kategori
    </a>

</div>


<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-white py-3">

        <h5 class="mb-0">

            <i class="bi bi-card-list text-primary"></i>

            Data Kategori

        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table id="categoryTable" class="table table-striped table-hover align-middle">

                <thead>

                    <tr>

                        <th width="80">No</th>

                        <th>Nama Kategori</th>

                        <th width="140">Status</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $category->name }}

                        </td>

                        <td>

                            @if($category->status)

                                <span class="badge rounded-pill bg-success">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Aktif

                                </span>

                            @else

                                <span class="badge rounded-pill bg-danger">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Nonaktif

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('categories.edit',$category->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                                Edit

                            </a>

                            <form
                                action="{{ route('categories.destroy',$category->id) }}"
                                method="POST"
                                class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

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

</div>


<script>

document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Kategori?',

            text: 'Data yang sudah dihapus tidak dapat dikembalikan!',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc3545',

            cancelButtonColor: '#6c757d',

            confirmButtonText: 'Ya, Hapus!',

            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>


<script>

$(document).ready(function(){

    $('#categoryTable').DataTable({

        responsive: true,

        autoWidth: false,

        pageLength: 10,

        ordering: true,

        lengthChange: true,

        language:{

            search:"🔍 Cari :",

            lengthMenu:"Tampilkan _MENU_ data",

            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            infoEmpty:"Belum ada data",

            zeroRecords:"Data tidak ditemukan",

            paginate:{

                previous:"←",

                next:"→"

            }

        }

    });

});

</script>

@endsection
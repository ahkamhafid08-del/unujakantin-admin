@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Meja</h2>

    <a href="{{ route('tables.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Meja
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table id="tableData" class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($tables as $table)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $table->table_number }}</td>

                    <td>{{ $table->capacity }} Orang</td>

                    <td>

                        @if($table->status)

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

                        <a href="{{ route('tables.edit',$table->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('tables.destroy',$table->id) }}"
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

            title:'Hapus Meja?',

            text:'Data tidak bisa dikembalikan.',

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

    $('#tableData').DataTable({

        responsive:true

    });

});

</script>

@endsection
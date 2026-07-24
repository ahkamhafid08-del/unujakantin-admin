@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Pesanan</h2>

    <a href="{{ route('orders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Pesanan
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table id="orderTable" class="table table-hover table-bordered align-middle">

            <thead class="table-primary">

                <tr>

                    <th width="60">No</th>
                    <th>Nama Pemesan</th>
                    <th>Meja</th>
                    <th>Metode Pembayaran</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($orders as $order)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $order->customer_name }}</td>

                    <td>
                        Meja {{ $order->table_number  ?? '-' }}
                    </td>

                    <td>{{ $order->payment_method }}</td>

                    <td>
                        Rp {{ number_format((float) $order->total, 0, ',', '.') }}
                    </td>

                    <td>

                        @switch($order->status)

                            @case('Pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                                @break

                            @case('Preparing')
                                <span class="badge bg-info">Preparing</span>
                                @break

                            @case('Ready')
                                <span class="badge bg-primary">Ready</span>
                                @break

                            @case('Completed')
                                <span class="badge bg-success">Completed</span>
                                @break

                            @default
                                <span class="badge bg-secondary">
                                    {{ $order->status }}
                                </span>

                        @endswitch

                    </td>

                    <td>

                        <a href="{{ route('orders.edit',$order->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('orders.destroy',$order->id) }}"
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

            title:'Hapus Pesanan?',

            text:'Data pesanan akan dihapus.',

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

    $('#orderTable').DataTable({

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
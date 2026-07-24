@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                <i class="bi bi-megaphone-fill text-primary"></i>
                Tambah Promo
            </h3>

            <p class="text-muted mb-0">
                Tambahkan promo terbaru untuk aplikasi kantin.
            </p>

        </div>

        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('promotions.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Judul Promo -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Judul Promo

                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Contoh : Diskon 20%"
                               required>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="1">

                                Aktif

                            </option>

                            <option value="0">

                                Nonaktif

                            </option>

                        </select>

                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tanggal Mulai

                        </label>

                        <input type="date"
                               name="start_date"
                               class="form-control"
                               required>

                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tanggal Berakhir

                        </label>

                        <input type="date"
                               name="end_date"
                               class="form-control"
                               required>

                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">

                        <label class="form-label">

                            Deskripsi Promo

                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"
                            placeholder="Masukkan deskripsi promo..."></textarea>

                    </div>

                    <!-- Upload Banner -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Banner Promo

                        </label>

                        <input type="file"
                               class="form-control"
                               id="image"
                               name="image">

                    </div>

                    <!-- Preview -->
                    <div class="col-md-6 text-center mb-4">

                        <img id="preview"
                             src="https://placehold.co/350x180?text=Preview+Banner"
                             class="img-thumbnail"
                             style="max-height:180px;">

                    </div>

                </div>

                <hr>

                <button class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Simpan Promo

                </button>

                <a href="{{ route('promotions.index') }}"
                   class="btn btn-outline-secondary">

                    Batal

                </a>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('image').addEventListener('change',function(e){

    const reader = new FileReader();

    reader.onload=function(){

        document.getElementById('preview').src=reader.result;

    }

    reader.readAsDataURL(e.target.files[0]);

});

</script>

@endsection
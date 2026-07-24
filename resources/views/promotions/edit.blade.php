@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                <i class="bi bi-pencil-square text-warning"></i>
                Edit Promo
            </h3>

            <p class="text-muted mb-0">
                Perbarui data promo.
            </p>

        </div>

        <a href="{{ route('promotions.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('promotions.update',$promotion->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Judul Promo -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Judul Promo
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title',$promotion->title) }}"
                               required>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="1"
                                {{ $promotion->status == 1 ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0"
                                {{ $promotion->status == 0 ? 'selected' : '' }}>
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
                               value="{{ old('start_date',$promotion->start_date) }}"
                               required>

                    </div>

                    <!-- Tanggal Berakhir -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Berakhir
                        </label>

                        <input type="date"
                               name="end_date"
                               class="form-control"
                               value="{{ old('end_date',$promotion->end_date) }}"
                               required>

                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control">{{ old('description',$promotion->description) }}</textarea>

                    </div>

                    <!-- Upload -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Ganti Banner
                        </label>

                        <input type="file"
                               class="form-control"
                               name="image"
                               id="image">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>

                    </div>

                    <!-- Preview -->
                    <div class="col-md-6 text-center mb-4">

                        @if($promotion->image)

                            <img id="preview"
                                 src="{{ asset('uploads/promotions/'.$promotion->image) }}"
                                 class="img-thumbnail"
                                 style="max-height:180px;">

                        @else

                            <img id="preview"
                                 src="https://placehold.co/350x180?text=Preview"
                                 class="img-thumbnail"
                                 style="max-height:180px;">

                        @endif

                    </div>

                </div>

                <hr>

                <button class="btn btn-warning">

                    <i class="bi bi-check-circle"></i>

                    Update Promo

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

document.getElementById('image').addEventListener('change', function(e){

    if(e.target.files.length > 0){

        const reader = new FileReader();

        reader.onload = function(){

            document.getElementById('preview').src = reader.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

@endsection
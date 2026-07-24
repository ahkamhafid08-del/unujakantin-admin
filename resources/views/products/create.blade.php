@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">
                <i class="bi bi-plus-circle-fill text-primary"></i>
                Tambah Produk
            </h3>
            <p class="text-muted mb-0">
                Tambahkan produk baru ke dalam menu kantin.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Nama Produk -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Produk
                        </label>

                       <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Contoh : Es Teh"
                            value="{{ old('name') }}"
                            required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Kategori -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror"
                                required>

                            <option value="">Pilih Kategori</option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Harga -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Harga
                        </label>

                        <input type="number"
                               name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               placeholder="5000"
                               value="{{ old('price') }}"
                               required>

                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="1"
                                {{ old('status',1)==1 ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0"
                                {{ old('status')=='0' ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>

                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Masukkan deskripsi produk...">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Upload -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Gambar Produk
                        </label>

                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               name="image"
                               id="image"
                               accept="image/*">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Preview -->
                    <div class="col-md-6 mb-4 text-center">

                        <img id="preview"
                             src="https://placehold.co/250x200?text=Preview"
                             class="img-thumbnail rounded"
                             style="max-height:200px">

                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan Produk
                </button>

                <a href="{{ route('products.index') }}"
                   class="btn btn-outline-secondary">
                    Batal
                </a>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('image').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file){
        return;
    }

    const reader = new FileReader();

    reader.onload = function(event){

        document.getElementById('preview').src = event.target.result;

    }

    reader.readAsDataURL(file);

});

</script>

@endsection
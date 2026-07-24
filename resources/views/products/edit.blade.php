@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold">
                <i class="bi bi-pencil-square text-warning"></i>
                Edit Produk
            </h3>

            <p class="text-muted mb-0">
                Perbarui data produk.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('products.update',$product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Nama Produk -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Produk

                        </label>

                        <input
    type="text"
    name="name"
    class="form-control @error('name') is-invalid @enderror"
    value="{{ old('name', $product->name) }}"
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

                        <select
                            name="category_id"
                            class="form-select">

                            @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id',$product->category_id)==$category->id ? 'selected':'' }}>

                                {{ $category->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Harga -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Harga

                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            value="{{ old('price',$product->price) }}"
                            required>

                    </div>

                    <!-- Status -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="1"
                            {{ old('status',$product->status)==1 ? 'selected':'' }}>

                                Aktif

                            </option>

                            <option value="0"
                            {{ old('status',$product->status)==0 ? 'selected':'' }}>

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
                            class="form-control">{{ old('description',$product->description) }}</textarea>

                    </div>

                    <!-- Upload -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Ganti Gambar

                        </label>

                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            accept="image/*">

                    </div>

                    <!-- Preview -->

                    <div class="col-md-6 text-center">

                        @if($product->image)

                        <img
                            id="preview"
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            class="img-thumbnail"
                            style="max-height:200px;">

                        @else

                        <img
                            id="preview"
                            src="https://placehold.co/250x200?text=Preview"
                            class="img-thumbnail"
                            style="max-height:200px;">

                        @endif

                    </div>

                </div>

                <hr>

                <button class="btn btn-warning">

                    <i class="bi bi-check-circle"></i>

                    Update Produk

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

    if(e.target.files.length){

        let reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('preview').src = event.target.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

@endsection
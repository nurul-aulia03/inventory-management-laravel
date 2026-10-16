@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Edit Kategori</h2>
            <p>Perbarui informasi kategori yang dipilih.</p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-light">
            ← Kembali
        </a>
    </div>

    <div class="panel form-panel">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Kategori *</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $category->name) }}"
                    required
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-light">
                Batal
            </a>
        </form>
    </div>
@endsection
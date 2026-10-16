@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Kategori Baru</h2>
            <p>Masukkan informasi kategori yang ingin ditambahkan.</p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-light">
            ← Kembali
        </a>
    </div>

    <div class="panel form-panel">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kategori *</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Elektronik"
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
                    placeholder="Jelaskan kategori secara singkat..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Simpan Kategori</button>
            <a href="{{ route('categories.index') }}" class="btn btn-light">
                Batal
            </a>
        </form>
    </div>
@endsection

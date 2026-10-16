
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Supplier</h1>
    <p>Masukkan informasi supplier baru.</p>

    <div style="background:white; padding:24px; border-radius:8px; max-width:700px;">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            <div style="margin-bottom:16px;">
                <label>Nama Supplier *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       style="display:block; width:100%; padding:10px; margin-top:6px; border:1px solid #d1d5db; border-radius:6px;">
                @error('name')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom:16px;">
                <label>Nama Kontak</label>
                <input type="text" name="contact_person" value="{{ old('contact_person') }}"
                       style="display:block; width:100%; padding:10px; margin-top:6px; border:1px solid #d1d5db; border-radius:6px;">
                @error('contact_person')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom:16px;">
                <label>Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       style="display:block; width:100%; padding:10px; margin-top:6px; border:1px solid #d1d5db; border-radius:6px;">
                @error('phone')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom:16px;">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       style="display:block; width:100%; padding:10px; margin-top:6px; border:1px solid #d1d5db; border-radius:6px;">
                @error('email')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom:20px;">
                <label>Alamat</label>
                <textarea name="address" rows="3"
                          style="display:block; width:100%; padding:10px; margin-top:6px; border:1px solid #d1d5db; border-radius:6px;">{{ old('address') }}</textarea>
                @error('address')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    style="background:#2563eb; color:white; padding:10px 18px; border:0; border-radius:6px; cursor:pointer;">
                Simpan Supplier
            </button>

            <a href="{{ route('suppliers.index') }}"
               style="margin-left:10px; color:#4b5563; text-decoration:none;">
                Batal
            </a>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 26px; font-weight: bold; margin-bottom: 6px;">Catat Pergerakan Stok</h1>
        <p style="color: #6b7280;">Catat barang masuk atau barang keluar dari inventaris.</p>
    </div>

    <div style="background: white; padding: 24px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); max-width: 700px;">
        <form action="{{ route('stock-movements.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="product_id" style="display: block; font-weight: 600; margin-bottom: 8px;">Pilih Produk</label>
                <select name="product_id" id="product_id" required
                        style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 7px;">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} — Stok: {{ $product->stock }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <p style="color: #dc2626; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="type" style="display: block; font-weight: 600; margin-bottom: 8px;">Jenis Pergerakan</label>
                <select name="type" id="type" required
                        style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 7px;">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="in" {{ old('type') == 'in' ? 'selected' : '' }}>Barang Masuk</option>
                    <option value="out" {{ old('type') == 'out' ? 'selected' : '' }}>Barang Keluar</option>
                </select>
                @error('type')
                    <p style="color: #dc2626; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="quantity" style="display: block; font-weight: 600; margin-bottom: 8px;">Jumlah Barang</label>
                <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}" required
                       placeholder="Masukkan jumlah barang"
                       style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 7px;">
                @error('quantity')
                    <p style="color: #dc2626; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 24px;">
                <label for="notes" style="display: block; font-weight: 600; margin-bottom: 8px;">Catatan (Opsional)</label>
                <textarea name="notes" id="notes" rows="3"
                          placeholder="Contoh: Pembelian stok baru"
                          style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 7px; resize: vertical;">{{ old('notes') }}</textarea>
                @error('notes')
                    <p style="color: #dc2626; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit"
                        style="background: #2563eb; color: white; border: none; padding: 11px 18px; border-radius: 7px; cursor: pointer;">
                    Simpan Pergerakan
                </button>

                <a href="{{ route('stock-movements.index') }}"
                   style="background: #e5e7eb; color: #374151; padding: 11px 18px; border-radius: 7px; text-decoration: none;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Ringkasan Inventaris</h2>
            <p>Pantau produk dan kondisi stok dalam satu halaman.</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn">
            <span>＋</span> Tambah Produk
        </a>
    </div>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Produk</span>
                <span class="stat-icon blue">▦</span>
            </div>
            <div class="stat-value">{{ number_format($totalProducts) }}</div>
            <div class="stat-note">Jumlah jenis produk terdaftar</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Kategori</span>
                <span class="stat-icon green">▤</span>
            </div>
            <div class="stat-value">{{ number_format($totalCategories) }}</div>
            <div class="stat-note">Kategori produk terdaftar</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Stok</span>
                <span class="stat-icon orange">▧</span>
            </div>
            <div class="stat-value">{{ number_format($totalStock) }}</div>
            <div class="stat-note">Akumulasi unit seluruh produk</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Stok Menipis</span>
                <span class="stat-icon red">⚠</span>
            </div>
            <div class="stat-value">{{ number_format($lowStock) }}</div>
            <div class="stat-note">Produk pada batas minimum stok</div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <div>
                <h3>Daftar Produk</h3>
                <p>Informasi produk dan ketersediaan stok terkini.</p>
            </div>

            <form action="{{ route('products.index') }}" method="GET" class="toolbar">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Cari nama, SKU, kategori..."
                    value="{{ $search ?? '' }}"
                >

                <button type="submit" class="btn">⌕ Cari</button>

                @if(!empty($search))
                    <a href="{{ route('products.index') }}" class="btn btn-light">Reset</a>
                @endif
            </form>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>PRODUK</th>
                        <th>KATEGORI</th>
                        <th>HARGA JUAL</th>
                        <th>STOK</th>
                        <th>STATUS STOK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-sku">SKU: {{ $product->sku }}</div>
                            </td>

                            <td>
                                <span class="category-badge">
                                    {{ $product->category->name ?? 'Tanpa kategori' }}
                                </span>
                            </td>

                            <td>
                                Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                            </td>

                            <td>
                                <strong style="color:#29364b">
                                    {{ number_format($product->stock) }}
                                </strong>
                                <span style="color:#929bad"> unit</span>
                            </td>

                            <td>
                                @if($product->stock == 0)
                                    <span class="status status-empty">Habis</span>
                                @elseif($product->stock <= $product->minimum_stock)
                                    <span class="status status-low">Stok Menipis</span>
                                @else
                                    <span class="status status-safe">Tersedia</span>
                                @endif
                            </td>

                            <td>
                                <div class="actions">
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="action-link">Edit</a>

                                    <form action="{{ route('products.destroy', $product) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="action-link delete"
                                                style="border:0;background:none;cursor:pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <strong>
                                        {{ !empty($search) ? 'Produk tidak ditemukan' : 'Belum ada produk' }}
                                    </strong>

                                    {{ !empty($search)
                                        ? 'Coba gunakan kata kunci pencarian yang berbeda.'
                                        : 'Tambahkan produk pertama untuk mulai mengelola inventaris.' }}

                                    @if(empty($search))
                                        <div style="margin-top:17px">
                                            <a href="{{ route('products.create') }}" class="btn">
                                                ＋ Tambah Produk Pertama
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="pagination">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
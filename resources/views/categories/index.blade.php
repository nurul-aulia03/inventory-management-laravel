@extends('layouts.app')

@section('title', 'Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Daftar Kategori</h2>
            <p>Kelola kategori untuk mengelompokkan produk inventaris.</p>
        </div>

        <a href="{{ route('categories.create') }}" class="btn">
            ＋ Tambah Kategori
        </a>
    </div>

    @if(session('error'))
        <div class="alert" style="background:#ffe8e8;color:#b83232">
            {{ session('error') }}
        </div>
    @endif

    <div class="panel">
        <div class="panel-header">
            <div>
                <h3>Data Kategori</h3>
                <p>Total {{ $categories->total() }} kategori terdaftar.</p>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NAMA KATEGORI</th>
                        <th>DESKRIPSI</th>
                        <th>JUMLAH PRODUK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $loop->index }}</td>

                            <td>
                                <span class="product-name">
                                    {{ $category->name }}
                                </span>
                            </td>

                            <td>
                                {{ $category->description ?: '—' }}
                            </td>

                            <td>
                                <span class="category-badge">
                                    {{ $category->products_count }} produk
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="action-link">Edit</a>

                                    <form action="{{ route('categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                            <td colspan="5">
                                <div class="empty-state">
                                    <strong>Belum ada kategori</strong>
                                    Tambahkan kategori pertama untuk mulai mengelompokkan produk.

                                    <div style="margin-top:17px">
                                        <a href="{{ route('categories.create') }}" class="btn">
                                            ＋ Tambah Kategori
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="pagination">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
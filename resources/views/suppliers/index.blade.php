@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h1>Data Supplier</h1>
            <p>Kelola data pemasok produk.</p>
        </div>

        <a href="{{ route('suppliers.create') }}"
           style="background:#2563eb; color:white; padding:10px 16px; border-radius:6px; text-decoration:none;">
            + Tambah Supplier
        </a>
    </div>

    <div style="overflow-x:auto; background:white; border-radius:8px; padding:16px;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f3f4f6; text-align:left;">
                    <th style="padding:12px;">No.</th>
                    <th style="padding:12px;">Nama Supplier</th>
                    <th style="padding:12px;">Nama Kontak</th>
                    <th style="padding:12px;">Telepon</th>
                    <th style="padding:12px;">Email</th>
                    <th style="padding:12px;">Alamat</th>
                    <th style="padding:12px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($suppliers as $supplier)
                    <tr style="border-bottom:1px solid #e5e7eb;">
                        <td style="padding:12px;">
                            {{ $suppliers->firstItem() + $loop->index }}
                        </td>
                        <td style="padding:12px;">{{ $supplier->name }}</td>
                        <td style="padding:12px;">{{ $supplier->contact_person ?: '-' }}</td>
                        <td style="padding:12px;">{{ $supplier->phone ?: '-' }}</td>
                        <td style="padding:12px;">{{ $supplier->email ?: '-' }}</td>
                        <td style="padding:12px;">{{ $supplier->address ?: '-' }}</td>

                        <td style="padding:12px; white-space:nowrap;">
                            <a href="{{ route('suppliers.edit', $supplier) }}"
                               style="color:#2563eb; text-decoration:none;">
                                Edit
                            </a>

                            <form action="{{ route('suppliers.destroy', $supplier) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="background:#dc2626; color:white; border:0; padding:6px 10px; border-radius:4px; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:25px; text-align:center; color:#6b7280;">
                            Belum ada data supplier.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:16px;">
            {{ $suppliers->links() }}
        </div>
    </div>
</div>
@endsection
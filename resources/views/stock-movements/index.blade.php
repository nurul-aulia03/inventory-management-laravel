@extends('layouts.app')
@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 26px; font-weight: bold; margin-bottom: 6px;">Pergerakan Stok</h1>
            <p style="color: #6b7280; margin: 0;">Riwayat barang masuk dan barang keluar.</p>
        </div>

        <a href="{{ route('stock-movements.create') }}"
           style="background: #2563eb; color: white; padding: 10px 16px; border-radius: 8px; text-decoration: none;">
            + Catat Pergerakan
        </a>
    </div>

    @if ($movements->count() > 0)
        <div style="background: white; border-radius: 10px; overflow-x: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f3f4f6; text-align: left;">
                        <th style="padding: 14px;">No.</th>
                        <th style="padding: 14px;">Nama Produk</th>
                        <th style="padding: 14px;">Jenis</th>
                        <th style="padding: 14px;">Jumlah</th>
                        <th style="padding: 14px;">Catatan</th>
                        <th style="padding: 14px;">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movements as $movement)
                        <tr style="border-top: 1px solid #e5e7eb;">
                            <td style="padding: 14px;">
                                {{ $movements->firstItem() + $loop->index }}
                            </td>

                            <td style="padding: 14px; font-weight: 600;">
                                {{ $movement->product->name ?? 'Produk dihapus' }}
                            </td>

                            <td style="padding: 14px;">
                                @if ($movement->type === 'in')
                                    <span style="background: #dcfce7; color: #166534; padding: 5px 10px; border-radius: 20px;">
                                        Barang Masuk
                                    </span>
                                @else
                                    <span style="background: #fee2e2; color: #991b1b; padding: 5px 10px; border-radius: 20px;">
                                        Barang Keluar
                                    </span>
                                @endif
                            </td>

                            <td style="padding: 14px;">{{ $movement->quantity }}</td>

                            <td style="padding: 14px;">{{ $movement->notes ?: '-' }}</td>

                            <td style="padding: 14px;">
                                {{ $movement->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $movements->links() }}
        </div>
    @else
        <div style="background: white; padding: 40px 20px; text-align: center; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
            <h3 style="font-size: 18px; margin-bottom: 8px;">Belum Ada Pergerakan Stok</h3>
            <p style="color: #6b7280; margin-bottom: 20px;">Catat barang masuk atau keluar untuk melihat riwayatnya di sini.</p>

            <a href="{{ route('stock-movements.create') }}"
               style="background: #2563eb; color: white; padding: 10px 16px; border-radius: 8px; text-decoration: none;">
                Catat Pergerakan Pertama
            </a>
        </div>
    @endif
</div>
@endsection
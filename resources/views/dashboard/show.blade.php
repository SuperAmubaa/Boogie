@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Kode Warna: {{ $kode_warna }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal Masuk</th>
                <th>Stok Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Stok Keluar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayat as $item)
                <tr>
                    <!-- Tanggal Masuk -->
                    <td class="text-success">
                        {{ $item->tanggal_masuk ? \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') : '-' }}
                    </td>
                    <!-- Stok Masuk -->
                    <td class="text-success text-end">
                        {{ $item->stok_masuk ?? '-' }}
                    </td>
                    <!-- Tanggal Keluar -->
                    <td class="text-danger">
                        {{ $item->tanggal_keluar ? \Carbon\Carbon::parse($item->tanggal_keluar)->format('d M Y') : '-' }}
                    </td>
                    <!-- Stok Keluar -->
                    <td class="text-danger text-end">
                        {{ $item->stok_keluar ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data riwayat untuk kode warna ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="/dashboard" class="btn btn-secondary">Kembali</a>
</div>
@endsection

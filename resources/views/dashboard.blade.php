@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Warna</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Sisa Stok</th>
                <th>Action</th>
        </tr>
    </thead>
        <tbody>
                @foreach ($data as $key => $item )
            <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->kode_warna }}</td>
                    <td>{{ $item->stok_masuk ?? 0 }}</td>
                    <td>{{ $item->stok_keluar ?? 0 }}</td>
                    <td>{{ $item->sisa_stok ?? 0 }}</td>
                    <td>
                        <a href="{{ route('dashboard.show', $item->kode_warna) }}" class="btn btn-info btn-sm">Lihat Riwayat</a>
                    </td>
                    
            </tr>
            @endforeach
        </tbody>
</table>
    </div>
</div>
@endsection
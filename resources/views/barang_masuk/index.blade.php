@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Barang Masuk</li>
    </ol>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/barang_masuk/create" class="btn btn-sm btn-primary">Tambah Barang Masuk</a>
        <div class="card-body ">
            <table class="table table-bordered mt-3 " id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Kategori Produk</th>
            <th>Nama Katalog</th>
            <th>Code Warna</th>
            <th>Jumlah Stok Masuk</th>
            <th>Satuan</th>
            <th>Tanggal Masuk</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody>
            @forelse ($barang_masuk as $key => $item)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->kategori_name }}</td>
                <td>{{ $item->katalog_name }}</td>
                <td>{{ $item->warna_name }}</td>
                <td>{{ $item->stok_masuk }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->translatedFormat('d F Y') }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <form method="post" action="/barang_masuk/{{ $item->id }}">
                        @csrf
                        @method('delete')
                        <a href="/barang_masuk/{{$item->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Data di Hapus?')">Delete</button>
                    </form>
            </td>
            </tr>
            @endforeach
        </tbody>
</table>
        </div>
    </div>
</div>
@endsection
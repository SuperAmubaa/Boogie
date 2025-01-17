<!-- resources/views/barang_masuk/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 1rem;">
                    Tambah Barang
                </button>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Artikel</th>
                            <th>Jenis</th>
                            <th>Warna</th>
                            <th>Kuantitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_artikel }}</td>
                            <td>{{ $barang->jenis }}</td>
                            <td>{{ $barang->warna }}</td>
                            <td>{{ $barang->kuantitas }}</td>
                            <td>
                                <a href="{{ route('barang_masuk.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('barang_masuk.destroy', $barang->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
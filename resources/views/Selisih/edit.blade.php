<!-- resources/views/barang_keluar/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-2 text-gray-800">Tambah Harga</h1>

    <form action="{{ route('Selisih.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_artikel">Nama Artikel</label>
            <input type="text" class="form-control" id="nama_artikel" name="nama_artikel" value="{{ $barang->nama_artikel }}" required disabled>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $barang->jenis }}" required disabled>
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" id="warna" name="warna" value="{{ $barang->warna }}" required disabled>
        </div>
        <div class="form-group">
            <label for="kuantitas">Kuantitas Barang Masuk</label>
            <input type="number" class="form-control" id="kuantitas" name="kuantitas" value="{{ $barang->kuantitas }}" required disabled>
        </div>
        <div class="form-group">
            <label for="kuantitas">Kuantitas Barang Keluar</label>
            <input type="number" class="form-control" id="barang_keluar" name="barang_keluar" value="{{ $barang->barang_keluar }}" required disabled>
        </div>

        <div class="form-group">
            <label for="kuantitas">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
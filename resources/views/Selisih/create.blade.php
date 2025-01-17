<!-- resources/views/barang_keluar/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-2 text-gray-800">Tambah Barang</h1>

    <form action="{{ route('barang_keluar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_artikel">Nama Artikel</label>
            <input type="text" class="form-control" id="nama_artikel" name="nama_artikel" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" class="form-control" id="jenis" name="jenis" required>
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" id="warna" name="warna" required>
        </div>
        <div class="form-group">
            <label for="kuantitas">Kuantitas</label>
            <input type="number" class="form-control" id="kuantitas" name="kuantitas" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
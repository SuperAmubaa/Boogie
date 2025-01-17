@extends('layouts.app')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/kategori')}}">Kategori Barang</a></li>
    <li class="breadcrumb-item">Tambah Kategori</li>
</ol>
<div class="container-fluid">
<form method="POST" action="{{ route('kategori.store')}}">
@csrf
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama_kategori" value="" class="form-control">
</div>
<button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
<button type="reset" name="unproses" value="batal" class="btn btn-info">Batal</button>
</form>
</div>
@endsection
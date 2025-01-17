@extends('layouts.app')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/beranda">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/kategori')}}">Kategori Barang</a></li>
    <li class="breadcrumb-item">Edit Kategori</li>
</ol>
<div class="container-fluid">
    <form method="POST" action="/kategori/{{ $kategori->id }}">

        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <div class="form-group">
            <label>Jenis Kategori</label>
            <input type="text" value="{{ $kategori->nama_kategori }}" name="nama_kategori" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
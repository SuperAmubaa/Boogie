@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Tambah Barang Keluar</h3>

    <form method="POST" action="{{ route('barang_keluar.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Pegawai</label>
            <select class="form-control @error('users_id') is-invalid @enderror" name="users_id" >
                <option value="">--- Pilih Pegawai ---</option>
                @foreach($userss as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
              @error('kategori_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-group">
            <label for="katalog_id">Nama Katalog</label>
            <select name="katalog_id" id="katalog_id" class="form-control @error('katalog_id') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih Katalog</option>
                @foreach($katalogs as $katalog)
                    <option value="{{ $katalog->id }}">{{ $katalog->nama_katalog }}</option>
                @endforeach
            </select>
            @error('katalog_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="warna_id">Kode Warna</label>
            <select name="warna_id" id="warna_id" class="form-control @error('warna_id') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih Warna</option>
                <!-- Warna akan dimuat dengan JavaScript berdasarkan katalog_id -->
            </select>
            @error('warna_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori Produk</label>
            <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok_masuk">Jumlah Stok Keluar</label>
            <input type="number" name="stok_keluar" id="stok_keluar" class="form-control @error('stok_keluar') is-invalid @enderror" required>
            @error('stok_keluar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stok_masuk">Satuan</label>
            <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" required>
            @error('satuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" required>
            @error('tanggal_keluar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required></textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Menangani perubahan pada katalog_id untuk memuat warna yang sesuai
    document.getElementById('katalog_id').addEventListener('change', function() {
        var katalogId = this.value;

        // Mengambil data warna yang sesuai dengan katalog_id
        fetch(`/get-warna/${katalogId}`)
            .then(response => response.json())
            .then(data => {
                var warnaSelect = document.getElementById('warna_id');
                warnaSelect.innerHTML = '<option value="" disabled selected>Pilih Warna</option>'; // Reset warna options
                data.forEach(function(warna) {
                    var option = document.createElement('option');
                    option.value = warna.id;
                    option.textContent = warna.kode_warna;
                    warnaSelect.appendChild(option);
                });
            });
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Edit Barang Masuk</h3>

    <form method="POST" action="{{ route('barang_masuk.update', $barang_masuk->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="users_id">Nama Pegawai</label>
            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
        </div>
        

        <div class="form-group">
            <label for="katalog_id">Nama Katalog</label>
            <select name="katalog_id" id="katalog_id" class="form-control @error('katalog_id') is-invalid @enderror" required>
                <option value="" disabled>Pilih Katalog</option>
                @foreach($katalogs as $katalog)
                    <option value="{{ $katalog->id }}" {{ $barang_masuk->katalog_id == $katalog->id ? 'selected' : '' }}>
                        {{ $katalog->nama_katalog }}
                    </option>
                @endforeach
            </select>
            @error('katalog_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="warna_id">Kode Warna</label>
            <select name="warna_id" id="warna_id" class="form-control @error('warna_id') is-invalid @enderror" required>
                <option value="" disabled>Pilih Warna</option>
                @foreach($warnas as $warna)
                    <option value="{{ $warna->id }}" {{ $barang_masuk->warna_id == $warna->id ? 'selected' : '' }}>
                        {{ $warna->kode_warna }}
                    </option>
                @endforeach
            </select>
            @error('warna_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $barang_masuk->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok_masuk">Jumlah Stok Masuk</label>
            <input type="number" name="stok_masuk" id="stok_masuk" class="form-control @error('stok_masuk') is-invalid @enderror" 
                   value="{{ old('stok_masuk', $barang_masuk->stok_masuk) }}" required disabled>
            @error('stok_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror"
            value="{{ old('satuan', $barang_masuk->satuan) }}" required>
            @error('satuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                   value="{{ old('tanggal_masuk', $barang_masuk->tanggal_masuk) }}" required>
            @error('tanggal_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $barang_masuk->keterangan) }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/dashboard" class="btn btn-secondary">Kembali</a>
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
{{-- @section('scripts')
<script>
    $(document).ready(function() {
        $('#katalog_id').on('change', function() {
            var katalogId = $(this).val();

            // Clear the warna dropdown
            $('#warna_id').empty();
            $('#warna_id').append('<option value="" disabled selected>Loading...</option>');

            // Fetch warna data
            if (katalogId) {
                $.ajax({
                    url: "{{ route('get-warna') }}",
                    type: "GET",
                    data: { katalog_id: katalogId },
                    success: function(response) {
                        $('#warna_id').empty();
                        $('#warna_id').append('<option value="" disabled selected>Pilih Warna</option>');
                        response.forEach(function(warna) {
                            $('#warna_id').append('<option value="' + warna.id + '">' + warna.kode_warna + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal memuat data warna.');
                    }
                });
            }
        });
    });
</script>
@endsection --}}

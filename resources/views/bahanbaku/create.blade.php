@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Hpp Data</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="post" action="{{ route('bahanbaku.store') }}">
        @csrf

        <div class="mb-3" style="display: flex;">
            <div style="flex: 1;">
                <label for="komponen_biaya_id" class="form-label">Komponen Biaya</label>
                <select class="form-select" id="komponen_biaya_id" name="komponen_biaya_id" required>
                    <option value="" selected disabled>-- Pilih Komponen Biaya --</option>
                    <option value="Biaya_Operasi">Biaya Operasi</option>
                    <option value="Overhead_Pabrik">Overhead Pabrik</option>
                </select>
            </div>

            <div id="subkomponen-container" style="flex: 1; margin-left: 10px;">
                <label for="subkomponen_biaya_id" class="form-label" style="margin-left: 10px;">Subkomponen Biaya</label>
                <select class="form-select" id="subkomponen_biaya_id" name="subkomponen_biaya_id" required style="margin-left: 10px;">
                    <option value="" selected disabled>-- Pilih Subkomponen Biaya --</option>
                    <!-- Options will be dynamically filled based on the selection -->
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Nama Bahan Baku</label>
            <input type="text" class="form-control" id="jenis" name="jenis" required placeholder="Nama Bahan Baku">
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="kebutuhan_per_produksi" class="form-label">Kebutuhan Per Produksi</label>
                <input type="text" class="form-control" id="kebutuhan_per_produksi" name="kebutuhan_per_produksi" required placeholder="Kebutuhan Per Produksi">
            </div>

            <div class="col">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" required placeholder="Satuan">
            </div>

            <div class="col">
                <label for="biaya_persatuan" class="form-label">Biaya Persatuan</label>
                <input type="text" class="form-control" id="biaya_persatuan" name="biaya_persatuan" required placeholder="Biaya Persatuan">
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('komponen_biaya_id').addEventListener('change', function() {
        var subkomponenContainer = document.getElementById('subkomponen-container');
        var selectedKomponen = this.value;

        // Clear previous options and label
        subkomponenContainer.innerHTML = '';

        // Create new label for Subkomponen Biaya
        var subkomponenLabel = document.createElement('label');
        subkomponenLabel.className = 'form-label';
        subkomponenLabel.for = 'subkomponen_biaya_id';
        subkomponenLabel.innerText = 'Subkomponen Biaya';

        subkomponenContainer.appendChild(subkomponenLabel);

        // Create new options based on the selected komponen_biaya
        var subkomponenOptions = document.createElement('select');
        subkomponenOptions.className = 'form-select';
        subkomponenOptions.id = 'subkomponen_biaya_id';
        subkomponenOptions.name = 'subkomponen_biaya_id';
        subkomponenOptions.required = true;

        if (selectedKomponen === 'Biaya_Operasi') {
            var option1 = document.createElement('option');
            option1.value = 'Bahan Baku';
            option1.text = 'Bahan Baku';
            var option2 = document.createElement('option');
            option2.value = 'Tenaga Kerja Langsung';
            option2.text = 'Tenaga Kerja Langsung';

            subkomponenOptions.add(option1);
            subkomponenOptions.add(option2);
        } else if (selectedKomponen === 'Overhead_Pabrik') {
            var option1 = document.createElement('option');
            option1.value = 'Overhead Variabel';
            option1.text = 'Overhead Variabel';
            var option2 = document.createElement('option');
            option2.value = 'Overhead Tetap';
            option2.text = 'Overhead Tetap';

            subkomponenOptions.add(option1);
            subkomponenOptions.add(option2);
        }

        // Append the new options to the container
        subkomponenContainer.appendChild(subkomponenOptions);
    });
</script>

@endsection
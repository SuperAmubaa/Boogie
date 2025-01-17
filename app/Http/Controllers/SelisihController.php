<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use PDF;



class SelisihController extends Controller
{
    // BarangMasukController.php
    public function index()
    {
        $barangs = BarangMasuk::all();
        return view('Selisih.index', compact('barangs'));
    }

    public function create()
    {
        return view('selisih.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'Harga' => 'required|integer',
        ]);

        BarangMasuk::create($request->all());
        return redirect()->route('Selisih.index')->with('success', 'Barang added successfully!');
    }

    public function edit($id)
    {
        $barang = BarangMasuk::find($id);
        return view('Selisih.edit', compact('barang'));
    }
    public function update(Request $request, $id)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $barang = BarangMasuk::find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        $barangKeluar = $request->input('barang_keluar', 0);
        $selisih = $barang->kuantitas - $barangKeluar;

        // Update BarangMasuk record
        $barang->update([
            'nama_artikel' => $request->input('nama_artikel'),
            'jenis' => $request->input('jenis'),
            'warna' => $request->input('warna'),
            'kuantitas' => $request->input('kuantitas'),
            'barang_keluar' => $request->input('barang_keluar'),
            'selisih' => $selisih,
            'harga' => $request->input('harga'),

        ]);

        return redirect()->route('Selisih.index')->with('success', 'Barang updated successfully!');
    }
    public function destroy($id)
    {
        BarangMasuk::find($id)->delete();
        return redirect()->route('Selisih.index')->with('success', 'Barang deleted successfully!');
    }



    public function downloadPDF()
    {
        $bahanbakus = BahanBaku::all();
        $pdf = PDF::loadView('bahanbaku.pdf', compact('bahanbakus'));
        return $pdf->download('Hpp-Hasil.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // BarangMasukController.php
    public function index()
    {
        $barang_keluar = BarangKeluar::join('users', 'users.id', '=', 'barang_keluar.users_id')
        ->join('kategori', 'kategori.id', '=', 'barang_keluar.kategori_id')
        ->select(
            'barang_keluar.*', 
            'users.name AS user_name', 
            'kategori.nama_kategori AS kategori_name' 
        )
        ->get();
    
    // Mengirim data ke view
    return view('barang_keluar.index', ['barang_keluar' => $barang_keluar]);
    }

    public function create()
    {
        return view('barang_keluar.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
       // Validation logic here
       $request->validate([
        'users_id' => 'required',
        'nama_produk' => 'required',
        'kategori_id' => 'required',
        'stok_keluar' => 'required|integer',
        'tanggal_keluar' => 'required|date',
        'keterangan' => 'required',
    ]);

    $barang_keluar = new BarangKeluar;

    $barang_keluar->users_id = $request->input('users_id');
    $barang_keluar->nama_produk = $request->input('nama_produk');
    $barang_keluar->kategori_id = $request->input('kategori_id');
    $barang_keluar->stok_keluar = $request->input('stok_keluar');
    $barang_keluar->tanggal_keluar = $request->input('tanggal_keluar');
    $barang_keluar->keterangan = $request->input('keterangan');

    $barang_keluar->save();

    return redirect('/barang_keluar');
      
    }

    public function edit($id)
    {
        $barang_keluar = BarangKeluar::find($id);
        return view('barang_keluar.edit', compact('barang_keluar'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'users_id' => 'required',
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'stok_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'required',
        ]);

        $barang_keluar = BarangKeluar::find($id);
        $barang_keluar->users_id = $request->users_id;
        $barang_keluar->nama_produk = $request->nama_produk;
        $barang_keluar->kategori_id = $request->kategori_id;
        $barang_keluar->stok_keluar = $request->stok_keluar;
        $barang_keluar->tanggal_keluar = $request->tanggal_keluar;
        $barang_keluar->keterangan = $request->keterangan;
        $barang_keluar->update();
        return redirect('/barang_keluar');

    }

        // $barangKeluar = $request->input('barang_keluar', 0);
        // $selisih = $barang->kuantitas - $barangKeluar;

        // Update BarangMasuk record
    //     $barang->update([
    //         'nama_artikel' => $request->input('nama_artikel'),
    //         'jenis' => $request->input('jenis'),
    //         'warna' => $request->input('warna'),
    //         'kuantitas' => $request->input('kuantitas'),
    //         'barang_keluar' => $request->input('barang_keluar'),
    //         'selisih' => $selisih,
    //     ]);

    //     return redirect()->route('barang_keluar.index')->with('success', 'Barang updated successfully!');
    // }
    public function destroy($id)
    {
        BarangKeluar::find($id)->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Barang deleted successfully!');
    }
}

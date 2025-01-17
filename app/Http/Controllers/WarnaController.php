<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warna;


class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // mengambil data katalog id di tabel warna
       $warna = Warna::join('katalog', 'katalog.id', '=', 'warna.katalog_id')
            ->select(
                'warna.*', 
                'katalog.nama_katalog AS katalog_name' 
            )
            ->get();
        
        // Mengirim data ke view
        return view('warna.index', ['warna' => $warna]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validation logic here
            $request->validate([
                'kode_warna' => 'required',
                'katalog_id' => 'required',
            ]);
    
            $warna = new Warna;
    
            $warna->kode_warna = $request->input('kode_warna');
            $warna->katalog_id = $request->input('katalog_id');
    
            $warna->save();
    
    
            return redirect('/warna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

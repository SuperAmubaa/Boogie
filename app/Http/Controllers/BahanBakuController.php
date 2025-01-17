<?php

// app/Http/Controllers/BahanBakuController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanbakus = BahanBaku::all();
        return view('bahanbaku.index', compact('bahanbakus'));
    }

    public function create()
    {
        return view('bahanbaku.create');
    }

    public function store(Request $request)
    {
        BahanBaku::create($request->all());

        return redirect()->route('bahanbaku.create')->with('success', 'Data berhasil ditambahkan!');
    }


    public function show($id)
    {
        $bahanbaku = BahanBaku::findOrFail($id);
        return view('bahanbaku.show', compact('bahanbaku'));
    }

    public function edit($id)
    {
        $bahanbaku = BahanBaku::findOrFail($id);
        return view('bahanbaku.edit', compact('bahanbaku'));
    }

    public function update(Request $request, $id)
    {
        $bahanbaku = BahanBaku::findOrFail($id);
        $bahanbaku->update($request->all());

        return redirect()->route('bahanbaku.index');
    }

    public function destroy($id)
    {
        $bahanbaku = BahanBaku::findOrFail($id);
        $bahanbaku->delete();

        return redirect()->route('bahanbaku.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataMahasiswa = Mahasiswa::all();

        return view('mahasiswa.mahasiswa', compact('dataMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.form-mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
            'npm' => 'required|numeric|unique:mahasiswa',
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          //query db builder
        //$detailBuku = DB::table('buku')->where('id', $id)->firstOrFail();

        //orm
        // $detailBuku = Buku::find($id);
        $dataMahasiswa = Mahasiswa::findOrFail($id);        

        return view('mahasiswa.detail-mahasiswa', compact('dataMahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        $dataMahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        return view('mahasiswa.form-edit-mahasiswa', compact('dataMahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        $validated = $request->validate([
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);

        Mahasiswa::where('npm', $npm)->update($validated);
        return redirect()->route('mahasiswa')->with('edit', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $npm)
    {
        Mahasiswa::where('npm', $npm)->delete();

        return redirect()->route('mahasiswa')
                ->with('delete', 'Data berhasil dihapus');
    }
}

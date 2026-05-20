<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KRS;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKRS = KRS::all();

        return view('krs.krs', compact('dataKRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('krs.form-krs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              // dd($request->nidn);
        $validated = $request->validate([
            'id' => 'required|numeric|unique:krs',
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        KRS::create($validated);
        return redirect()->route('krs')->with('add', 'Data berhasil ditambah');
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
        $dataKRS = KRS::findOrFail($id);        

        return view('krs.detail-krs', compact('dataKRS'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataKRS = KRS::where('id', $id)->firstOrFail();
        return view('krs.form-edit-krs', compact('dataKRS'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);

        KRS::where('id', $id)->update($validated);
        return redirect()->route('krs')->with('edit', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nidn)
    {
        KRS::where('nidn', $nidn)->delete();

        return redirect()->route('krs')
                ->with('delete', 'Data berhasil dihapus');
    }

}
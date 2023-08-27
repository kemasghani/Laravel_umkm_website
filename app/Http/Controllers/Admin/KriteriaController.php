<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('user.seleksi.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aspek = Aspek::all();
        return view('user.seleksi.kriteria.create', compact('aspek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
        ];

        $validated = $request->validate([
            'aspek_id' => 'required',
            'kode_kriteria' => 'required|unique:kriteria',
            'nama_kriteria' => 'required',
            'jenis' => 'required',
            'target' => 'required',
        ], $message);

        $result = Kriteria::create($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        $aspek = Aspek::all();
        return view('user.seleksi.kriteria.edit', compact('kriteria', 'aspek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
        ];

        $validated = $request->validate([
            'aspek_id' => 'required',
            'kode_kriteria' => 'required|unique:kriteria,kode_kriteria,' . $kriteria->id,
            'nama_kriteria' => 'required',
            'jenis' => 'required',
            'target' => 'required',
        ], $message);

        $result = $kriteria->update($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        $result = $kriteria->delete();

        if ($result) {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('admin.seleksi.kriteria.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}

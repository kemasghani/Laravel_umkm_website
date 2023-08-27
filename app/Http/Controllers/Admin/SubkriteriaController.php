<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkriteria = Subkriteria::all();
        return view('user.seleksi.subkriteria.index', compact('subkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('user.seleksi.subkriteria.create', compact('kriteria'));
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
            'kriteria_id' => 'required',
            'nama_subkriteria' => 'required',
            'nilai_bobot' => 'required',
        ], $message);

        $result = Subkriteria::create($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkriteria $subkriteria)
    {
        $kriteria = Kriteria::all();
        return view('user.seleksi.subkriteria.edit', compact('subkriteria', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkriteria $subkriteria)
    {
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
        ];

        $validated = $request->validate([
            'kriteria_id' => 'required',
            'nama_subkriteria' => 'required',
            'nilai_bobot' => 'required',
        ], $message);

        $result = $subkriteria->update($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkriteria $subkriteria)
    {
        $result = $subkriteria->delete();

        if ($result) {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('admin.seleksi.subkriteria.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}

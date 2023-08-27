<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Umkm;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('user.seleksi.alternatif.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $umkm = Umkm::all();
        return view('user.seleksi.alternatif.create', compact('umkm'));
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
            'unique' => 'Data sudah ada',
        ];

        $validated = $request->validate([
            'kode_alternatif' => 'required|unique:alternatif',
            'umkms_id' => 'required|unique:alternatif',
        ], $message);

        $result = Alternatif::create($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif)
    {
        $umkm = Umkm::all();
        return view('user.seleksi.alternatif.edit', compact('alternatif', 'umkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => 'Data sudah ada',
        ];

        $validated = $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif,' . $alternatif->id,
            'umkms_id' => 'required|unique:alternatif,umkms_id,' . $alternatif->id,
        ], $message);

        $result = $alternatif->update($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif)
    {
        $result = $alternatif->delete();

        if ($result) {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('admin.seleksi.alternatif.index')->with(['error' => 'Data gagal dihapus']);
        }
    }

    public function get_umkm(Request $request)
    {
        $umkm = Umkm::where('id', $request->id)->first();
        return response()->json($umkm);
    }

    public function get_alternatif(Request $request)
    {
        $alternatif = Alternatif::where('id', $request->id)->first();
        $alternatif = $alternatif->umkm;
        return response()->json($alternatif);
    }
}

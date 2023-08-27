<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaian = Penilaian::groupBy('alternatif_id')->get();

        return view('user.seleksi.penilaian.index', compact('penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alternatif = Alternatif::all();
        $aspek = Aspek::all();
        return view('user.seleksi.penilaian.create', compact('alternatif', 'aspek'));
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
            'unique' => 'Data Penilaian sudah ada',
        ];

        $validated = $request->validate([
            'alternatif_id' => [
                'required',
                Rule::unique('penilaian')->where(function ($query) use ($request) {
                    return $query->where('alternatif_id', $request->alternatif_id);
                })
            ],
        ], $message);

        $kriteria = Kriteria::all();
        foreach ($kriteria as $k) {
            $validated['kriteria_id'] = $k->id;
            $validated['subkriteria_id'] = $request->kriteria_id[$k->id];

            $result = Penilaian::create($validated);
        }

        if ($result) {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        $alternatif = Alternatif::all();
        $aspek = Aspek::all();
        $kriteria = Kriteria::all();

        $nilai = [];
        foreach ($kriteria as $k) {
            $result = Penilaian::where('alternatif_id', $penilaian->alternatif_id)
                ->where('kriteria_id', $k->id)
                ->first();
            $nilai[$k->id] = is_null($result) ? '' : $result->subkriteria_id;
        }

        return view('user.seleksi.penilaian.edit', compact('penilaian', 'aspek', 'alternatif', 'nilai'));
    }

    public function show(Penilaian $penilaian)
    {
        $aspek = Aspek::all();
        $kriteria = Kriteria::all();

        $nilai = [];
        foreach ($kriteria as $k) {
            $result = Penilaian::where('alternatif_id', $penilaian->alternatif_id)
                ->where('kriteria_id', $k->id)
                ->first();
            $nilai[$k->id] = is_null($result) ? '' : $result->subkriteria->nama_subkriteria;
        }

        return view('user.seleksi.penilaian.show', compact('penilaian', 'nilai', 'aspek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $kriteria = Kriteria::all();

        foreach ($kriteria as $k) {
            $result = Penilaian::updateOrCreate([
                'alternatif_id' => $penilaian->alternatif_id,
                'kriteria_id' => $k->id,
            ], [
                'subkriteria_id' => $request->kriteria_id[$k->id],
            ]);
        }

        if ($result) {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        $result = Penilaian::where('alternatif_id', $penilaian->alternatif_id)->delete();;

        if ($result) {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('admin.seleksi.penilaian.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}

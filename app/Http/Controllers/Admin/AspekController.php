<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspek = Aspek::all();
        return view('user.seleksi.aspek.index', compact('aspek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.seleksi.aspek.create');
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
            'nama_aspek' => 'required|unique:aspek',
            'bobot' => 'required',
            'cf' => 'required',
            'sf' => 'required',
        ], $message);

        $result = Aspek::create($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.aspek.index')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->route('admin.seleksi.aspek.index')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspek $aspek)
    {
        return view('user.seleksi.aspek.edit', compact('aspek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspek $aspek)
    {
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
        ];

        $validated = $request->validate([
            'nama_aspek' => 'required|unique:aspek,nama_aspek,' . $aspek->id,
            'bobot' => 'required',
            'cf' => 'required',
            'sf' => 'required',
        ], $message);

        $result = $aspek->update($validated);

        if ($result) {
            return redirect()->route('admin.seleksi.aspek.index')->with(['success' => 'Data berhasil diubah']);
        } else {
            return redirect()->route('admin.seleksi.aspek.index')->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspek $aspek)
    {
        $result = $aspek->delete();

        if ($result) {
            return redirect()->route('admin.seleksi.aspek.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('admin.seleksi.aspek.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}

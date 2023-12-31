<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\Admin\UpdateStatus;
use App\Models\Umkm;
use Illuminate\Support\Facades\Mail;

class DataUmkmController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            //$sekolah = DB::table('sekolahs')->where('users_id',Auth::user()->id)->first();
            $umkm = DB::table('umkms')->where('users_id', '=', Auth::user()->id)
                ->select(
                    '*',
                    DB::Raw("FORMAT (omset_usaha, 'c', 'id-ID') as omset_usaha"),
                    DB::Raw("FORMAT (modal, 'c', 'id-ID') as modal")
                )
                ->get();
            return datatables()->of($umkm)
                ->removeColumn('id')
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = "<a class='btn btn-primary btn-sm' id='" . $data->id . "' onClick='editFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit'>
                                <i class='bi bi-pencil-square'></i>
                            </a>";
                    $button .= '   ';

                    $button .= "<a class='btn btn-danger btn-sm' id='" . $data->id . "' onClick='hapusFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus'>
                                <i class='bi bi-trash'></i>
                            </a>";



                    if ($data->status == 2 || $data->status == 3) {
                        $button .= "<a class='btn btn-success btn-sm disabled' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Kirim'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";
                    } else {
                        $button .= "<a class='btn btn-success btn-sm' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Kirim'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";
                    }


                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.umkm.data-umkm');
    }
    public  function updateStatus(Request $request)
    {
        $id = $request->id;
        $data = Umkm::find($id);
        $users = Umkm::where('id', $id)->first();
        $data->status = 2;
        $data->save();
        //send email
        // Mail::to($data->email)->send(new UpdateStatus($users));
        return response()->json(['success' => 'Data berhasil diubah']);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Umkm::find($id);
        $simpan = $data->update($request->all());
        if ($simpan) {
            return response()->json(['success' => 'Data berhasil diubah']);
        } else {
            return response()->json(['error' => 'Data gagal diubah']);
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Umkm::find($id);
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
    public function edit(Request $request)
    {
        $umkm = Umkm::find($request->id);
        return response()->json(['data' => $umkm]);
    }
}

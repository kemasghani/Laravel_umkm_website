<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Mail\Admin\UpdateStatus;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class AdminUmkmController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            //$sekolah = DB::table('sekolahs')->where('users_id',Auth::user()->id)->first();
            $umkm = DB::table('umkms')
                ->where('status', 2)->orWhere('status', 3)
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
                    $button = "<a class='btn btn-primary btn-sm' id='" . $data->id . "' onClick='editFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit Data Diri Siswa'>
                                <i class='bi bi-pencil-square'></i>
                            </a>";
                    $button .= '   ';

                    $button .= "<a class='btn btn-danger btn-sm' id='" . $data->id . "' onClick='hapusFunc($data->id)' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus'>
                                <i class='bi bi-trash'></i>
                            </a>";

                    $button .= '   ';

                    if ($data->status == 3) {
                        $button .= "<a class='btn btn-success btn-sm disabled' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Terima'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";
                    } else {
                        $button .= "<a class='btn btn-success btn-sm' onClick='editStatus($data->id)' id='btnEditStatus' data-bs-toggle='tooltip' data-bs-placement='top' title='Terima'>
                                    <i class='bi bi-check2-circle'></i>
                                </a>";
                    }


                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.admin.data-umkm');
    }
    public  function updateStatus(Request $request)
    {
        $id = $request->id;
        $data = Umkm::find($id);
        $users = Umkm::where('id', $id)->first();
        $data->status = 3;
        $data->save();
        //send email
        //Mail::to($data->email)->send(new UpdateStatus($users));
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


    // --------------Fungsi Untuk Manage akun admin-----------------

    public function manage_admin(Request $request)
    {
        $data = DB::table('users')->where('role', 2)->get();
        // dd($data);
        return view('user.admin.manage-admin', compact('data'));
    }

    public function tambah_admin(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Enkripsi password menggunakan bcrypt
        $password = Hash::make($request->password);

        // Simpan data admin baru ke database menggunakan DB::table
        DB::table('users')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'username' => $request->username,
            'password' => $password,
            'role' => 2,
            'profile_image' => 'img/avatar.png'
        ]);

        // Redirect atau berikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit_admin(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        $id = $request->id;
        // Cari admin berdasarkan ID
        $admin = DB::table('users')->where('id', $id)->first();

        // Periksa apakah password lama cocok dengan password yang tersimpan di database
        if (Hash::check($request->old_password, $admin->password)) {
            // Enkripsi password baru menggunakan bcrypt
            $newPassword = Hash::make($request->new_password);

            // Update data admin
            DB::table('users')->where('id', $id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'username' => $request->username,
                'password' => $newPassword
            ]);

            // Redirect atau berikan response sesuai kebutuhan
            return redirect()->back()->with('success', 'Admin berhasil diupdate');
        } else {
            // Password lama tidak cocok, berikan pesan error
            return redirect()->back()->with('error', 'Password lama tidak valid');
        }
    }


    public function hapus_admin(Request $request)
    {
        // Hapus data admin berdasarkan ID
        $id = $request->id;
        DB::table('users')->where('id', $id)->delete();

        // Redirect atau berikan response sesuai kebutuhan
        // return redirect()->back()->with('success', 'Admin berhasil dihapus');
        return response()->json(['success' => 'Data berhasil dihapus']);
    }


    //----------Profile Admin---------------

    public function profile_admin(Request $request)
    {
        return view('user.admin.profile-admin');
    }

    public function upload_foto(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'foto' => 'required|image|max:2048', // Hanya menerima file gambar dengan ukuran maksimal 2MB
        ]);

        // Ambil file foto yang diupload
        $file = $request->file('foto');

        // Generate nama unik untuk foto
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        // Simpan foto ke storage dengan path 'public/assets/UserFoto'
        $file->storeAs('public/assets/UserFoto', $fileName);

        // Hapus foto lama jika ada
        $umkm = DB::table('users')->find($request->input('id'));
        if ($umkm->profile_image) {
            $fotoDelete = public_path('storage/' . $umkm->profile_image);
            if (file_exists($fotoDelete)) {
                unlink($fotoDelete);
            }
        }

        // Update foto admin di database
        DB::table('users')
            ->where('id', $request->input('id'))
            ->update(['profile_image' => 'assets/UserFoto/' . $fileName]);

        $request->session()->flash('success', "Berhasil Melakukan Upload Foto");
        // Redirect atau berikan response sesuai kebutuhan
        return response()->json(['message' => 'Success']);
    }

    public function edit_nama_admin(Request $request)
    {

        if ($request->name) {
            $id = $request->id;
            DB::table('users')->where('id', $id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'username' => $request->name,
            ]);

            // Redirect atau berikan response sesuai kebutuhan
            return redirect()->back()->with('success', 'Admin berhasil diupdate');
        } else {
            // Password lama tidak cocok, berikan pesan error
            return redirect()->back()->with('error', 'Password lama tidak valid');
        }
    }

    //pemetaan
    public function pemetaan_umkm(Request $request)
    {
        // Mendapatkan input pencarian dari form
        $alamat = $request->input('search');
        $bidang = $request->input('bidang_usaha');
        $kecamatan = $request->input('kecamatan');
        $allMap = 0;
        // mendapatkan data all umkm yg latitude dan longitude tidak 0
        $umkmsAll = DB::table('umkms')
            ->where('latitude', '<>', 0)
            ->where('longitude', '<>', 0)
            ->get();

        // Nilai default latitude dan longitude
        $latitude = -7.956;
        $longitude = 112.6159;
        // Memeriksa apakah tidak ada kriteria pencarian yang diberikan
        if (!$alamat && (!$bidang || $bidang === 'Bidang UMKM') && (!$kecamatan || $kecamatan === 'Kecamatan')) {
            $allMap = 1;
        } else {
            // Query data UMKM berdasarkan kriteria pencarian
            $query = DB::table('umkms');

            if ($alamat) {
                $query->where('alamat_usaha', 'like', '%' . $alamat . '%');
            }

            if ($bidang && $bidang !== 'Bidang UMKM') {
                $query->where('bidang_usaha', $bidang);
            }

            if ($kecamatan && $kecamatan !== 'Kecamatan') {
                $query->where('kecamatan_usaha', $kecamatan);
            }

            // Memilih hanya kolom latitude dan longitude
            $hasilPemetaan = $query->select('latitude', 'longitude')->get();

            // Jika array $hasilPemetaan kosong, set default latitude dan longitude
            if ($hasilPemetaan->isEmpty()) {
                $latitude = -7.956;
                $longitude = 112.6159;
            } else {
                // Jika hasil ditemukan, ambil latitude dan longitude dari hasil pertama
                $latitude = $hasilPemetaan[0]->latitude;
                $longitude = $hasilPemetaan[0]->longitude;
            }
        }

        // Mengirimkan latitude dan longitude ke view
        return view('user.admin.pemetaan-umkm', compact('latitude', 'longitude', 'umkmsAll', 'allMap'));
    }

    public function visualisasi_umkm(Request $request)
    {
        // Query data UMKM untuk statistik modal dan id umkm
        $list_umkm = DB::table('umkms')
            ->select('id', DB::raw('IFNULL(SUM(modal), 0) as total_modal')) // Replace null with 0
            ->groupBy('id')
            ->get();
        // Query data UMKM untuk statistik jumlah karyawan dan id umkm
        $jumlah_karyawan = DB::table('umkms')
            ->select('id', DB::raw("COALESCE(CAST(REPLACE(jumlah_karyawan, ',', '') AS UNSIGNED), 0) AS jumlah_karyawan"))
            ->groupBy('id')
            ->get();
        // Query data UMKM untuk statistik kecamatan dan jumlah umkm
        $jumlah_umkm = DB::table('umkms')
            ->select('kecamatan', DB::raw('COUNT(id) as jumlah_umkm'))
            ->groupBy('kecamatan')
            ->get();
        // Query data UMKM untuk statistik bidang usaha dan jumlah umkm
        $jumlah_umkm_bidang = DB::table('umkms')
            ->select('bidang_usaha', DB::raw('COUNT(id) as jumlah_umkm_bidang'))
            ->groupBy('bidang_usaha')
            ->get();
        // Query data UMKM untuk statistik omset usaha dan id umkm
        $omset_usaha = DB::table('umkms')
            ->select('id', DB::raw('IFNULL(SUM(omset_usaha), 0) as omset_usaha')) // Replace null with 0
            ->groupBy('id')
            ->get();
        // Mengirimkan list_umkm, jumlah_karyawan, jumlah_umkm, jumlah_umkm_bidang , omset_usaha ke view
        return view('user.admin.visualisasi-umkm', compact('list_umkm', 'jumlah_karyawan', 'jumlah_umkm', 'jumlah_umkm_bidang', 'omset_usaha'));
    }
    // untuk download pdf
    public function pdf_download(Request $request)
    {
        $list_umkm = DB::table('umkms')
            ->select('id', DB::raw('IFNULL(SUM(modal), 0) as total_modal')) // Replace null with 0
            ->groupBy('id')
            ->get();
        $jumlah_karyawan = DB::table('umkms')
            ->select('id', DB::raw("COALESCE(CAST(REPLACE(jumlah_karyawan, ',', '') AS UNSIGNED), 0) AS jumlah_karyawan"))
            ->groupBy('id')
            ->get();
        $jumlah_umkm = DB::table('umkms')
            ->select('kecamatan', DB::raw('COUNT(id) as jumlah_umkm'))
            ->groupBy('kecamatan')
            ->get();
        $jumlah_umkm_bidang = DB::table('umkms')
            ->select('bidang_usaha', DB::raw('COUNT(id) as jumlah_umkm_bidang'))
            ->groupBy('bidang_usaha')
            ->get();
        $omset_usaha = DB::table('umkms')
            ->select('id', DB::raw('IFNULL(SUM(omset_usaha), 0) as omset_usaha')) // Replace null with 0
            ->groupBy('id')
            ->get();
        $pdf = PDF::loadView('user.admin.pdf-download', compact('list_umkm', 'jumlah_karyawan', 'jumlah_umkm', 'jumlah_umkm_bidang', 'omset_usaha'));
        return $pdf->download('generate_pdf.pdf');
        return view('user.admin.visualisasi-umkm', compact('list_umkm', 'jumlah_karyawan', 'jumlah_umkm', 'jumlah_umkm_bidang', 'omset_usaha'));
    }
}

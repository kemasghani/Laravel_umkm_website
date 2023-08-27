<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Siswa;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function index()
    {
        $umkm = Umkm::where('users_id', Auth::user()->id)->first();
        return view('user.dashboard.index', [
            'umkm' => $umkm
        ]);
    }

    public function pengumuman()
    {
        $umkm = Umkm::where('users_id', Auth::user()->id)->first();
        $alternatif = Alternatif::where('umkms_id', $umkm->id ?? null)->first();
        $hasil = Hasil::where('alternatif_id', $alternatif->id ?? null)->first();

        return view('user.dashboard.pengumuman', [
            'hasil' => $hasil
        ]);
    }
}

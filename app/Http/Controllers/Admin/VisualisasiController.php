<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use DB;

class VisualisasiController extends Controller
{
    public function index()
    {
        $jumlah_umkm = Umkm::get()->count();
        // $total_daerah = DB::table('umkms')->select('kecamatan',DB::raw('count(*) as daerah'))->groupBy('kecamatan')->get();

        $total_daerah = DB::table('umkms')
            ->select('kecamatan', DB::raw('count(*) as daerah'))
            ->groupBy('kecamatan')
            ->get();

        // Membuat array kosong untuk menyimpan hasil
        $data = [];

        // List daerah yang diinginkan
        $list_daerah = [
            "TURIKALE",
            "TOMPOBULU",
            "TANRALILI",
            "SIMBANG",
            "MONCONGLOE",
            "MARUSU",
            "MAROS BARU",
            "MANDAI",
            "MALLAWA",
            "LAU",
            "CENRANA",
            "CAMBA",
            "BONTOA",
            "BANTIMURUNG"
        ];

        // Memasukkan hasil per daerah ke dalam array $data
        foreach ($list_daerah as $daerah) {
            $count = $total_daerah->firstWhere('kecamatan', $daerah);
            $jumlah = $count ? $count->daerah : 0;
            $data[] = [
                'daerah' => $daerah,
                'jumlah' => $jumlah
            ];
        }
        // dd($data);
        return view('user.admin.visualisasi-umkm', compact('jumlah_umkm', 'data'));
    }
}

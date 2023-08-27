<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Aspek;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Selisih;
use Illuminate\Support\Facades\App;

class HasilController extends Controller
{

    // metode profile matching
    public function index()
    {
        $aspek = Aspek::all();
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $selisih = Selisih::all();

        $nilai = [];
        $gap = [];
        $bobot = [];
        foreach ($alternatif as $a) {
            foreach ($kriteria as $k) {
                $result = Penilaian::where('alternatif_id', $a->id)
                    ->where('kriteria_id', $k->id)
                    ->first();
                $nilai[$a->id][$k->id]['nama_sub'] = is_null($result) ? '' : $result->subkriteria->nama_subkriteria;
                $nilai[$a->id][$k->id]['bobot'] = is_null($result) ? '' : $result->subkriteria->nilai_bobot;

                $gap[$a->id][$k->id] = $nilai[$a->id][$k->id]['bobot'] - $k->target;

                $result = Selisih::where('selisih', $gap[$a->id][$k->id])->first();
                $bobot[$a->id][$k->id] = is_null($result) ? 0 : $result->bobot;
            }
        }

        $ncf = [];
        $nsf = [];
        $total = [];
        $akhir = [];
        foreach ($alternatif as $a) {
            $nilai_akhir = 0;

            foreach ($aspek as $asp) {
                $nilai_cf = 0;
                $result = Kriteria::where('aspek_id', $asp->id)
                    ->where('jenis', 'cf')
                    ->get();
                foreach ($result as $r) {
                    $nilai_cf += $bobot[$a->id][$r->id];
                }
                $ncf[$a->id][$asp->id] = $nilai_cf > 0 ? $nilai_cf / count($result) : 0;

                $nilai_sf = 0;
                $result = Kriteria::where('aspek_id', $asp->id)
                    ->where('jenis', 'sf')
                    ->get();
                foreach ($result as $r) {
                    $nilai_sf += $bobot[$a->id][$r->id];
                }
                $nsf[$a->id][$asp->id] = $nilai_sf > 0 ? $nilai_sf / count($result) : 0;


                $total[$a->id][$asp->id] = (($asp->cf / 100) * $ncf[$a->id][$asp->id]) + (($asp->sf / 100) * $nsf[$a->id][$asp->id]);

                $nilai_akhir += ($asp->bobot / 100) * $total[$a->id][$asp->id];
            }

            $akhir[$a->id] = $nilai_akhir;

            Hasil::updateOrCreate([
                'alternatif_id' => $a->id,
            ], [
                'nilai_akhir' => $akhir[$a->id],
            ]);
        }

        $rangking = Hasil::orderBy('nilai_akhir', 'desc')->get();
        $first = $rangking->first();

        // update pengumuman
        $no = 1;
        $jml_lulus = 5;
        foreach ($rangking as $row) {
            if ($no <= $jml_lulus) {
                $ket = 'Lulus';
            } else {
                $ket = 'Tidak Lulus';
            }
            $row->update(['pengumuman' => $ket]);
            $no++;
        }

        return view('user.seleksi.hasil.index', compact('kriteria', 'alternatif', 'nilai', 'aspek', 'gap', 'selisih', 'bobot', 'ncf', 'nsf', 'total', 'akhir', 'rangking', 'first'));
    }

    // public function pdf()
    // {
    //     $rangking = Hasil::orderBy('nilai_akhir', 'desc')->get();
    //     $first = $rangking->first();

    //     $pdf = App::make('dompdf.wrapper');
    //     $html = view('user.seleksi.hasil.pdf', compact('rangking', 'first'));
    //     $pdf->loadHTML($html);
    //     return $pdf->stream();
    // }
}

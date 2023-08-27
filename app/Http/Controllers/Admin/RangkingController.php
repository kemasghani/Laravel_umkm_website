<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Illuminate\Support\Facades\App;

class RangkingController extends Controller
{
    public function index()
    {
        $hasil = Hasil::orderByDesc('nilai_akhir')->get();

        return view('user.seleksi.hasil.rangking', compact('hasil'));
    }

    public function pdf()
    {
        $hasil = Hasil::orderBy('nilai_akhir', 'desc')->get();
        $first = $hasil->first();

        $pdf = App::make('dompdf.wrapper');
        $html = view('user.seleksi.hasil.pdf', compact('hasil', 'first'));
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
}

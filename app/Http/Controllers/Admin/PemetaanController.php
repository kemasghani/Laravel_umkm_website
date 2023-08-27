<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemetaanController extends Controller
{
    public function search()
    {
        $lokasi = $_GET['search'];
        $pemetaan = where('nama_usaha', 'like', '%' . $lokasi . '%')->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemetaan extends Model
{
    use HasFactory;
    public $table = "pemetaan";
    protected $fillable = ['nama_usaha', 'bidang_usaha', 'alamat_usaha'];
    
}
/*{
    use HasFactory;

    protected $table = 'umkms';
    protected $fillable = ['nama_usaha', 'bidang_usaha', 'alamat_usaha', 'kecamatan', 'latitude', 'longitude'];

    // Fungsi untuk mengambil data dari database berdasarkan kriteria pencarian
    public function getDataFromDatabase($alamat, $kecamatan, $bidang)
    {
        $query = self::query();

        // Jika alamat tidak kosong, tambahkan kondisi pencarian berdasarkan alamat
        if ($alamat) {
            $query->where('alamat_usaha', 'LIKE', "%$alamat%");
        }

        // Jika kecamatan terpilih, tambahkan kondisi pencarian berdasarkan kecamatan
        if ($kecamatan && $kecamatan !== 'Kecamatan') {
            $query->where('kecamatan', $kecamatan);
        }

        // Jika bidang terpilih, tambahkan kondisi pencarian berdasarkan bidang usaha
        if ($bidang && $bidang !== 'Bidang UMKM') {
            $query->where('bidang_usaha', $bidang);
        }

        // Ambil data UMKM berdasarkan kriteria yang telah ditentukan
        $result = $query->get();

        return $result;
    }
}*/


    /* Fungsi untuk mengambil data dari database
    public function getDataFromDatabase()
    {
        // Mengambil data kecamatan dari database
        $kecamatanData = Pemetaan::distinct('kecamatan')->pluck('kecamatan');
        
        // Mengambil data bidang usaha dari database
        $bidangUsahaData = Pemetaan::distinct('bidang_usaha')->pluck('bidang_usaha');
        
        // Mengambil data alamat usaha dari database
        $alamatUsahaData = Pemetaan::pluck('alamat_usaha');

        // Menggabungkan data kecamatan, bidang usaha, dan alamat usaha menjadi satu array
        $data = [
            'kecamatan' => $kecamatanData,
            'bidang_usaha' => $bidangUsahaData,
            'alamat_usaha' => $alamatUsahaData,
        ];

        // Mengembalikan data dalam bentuk array
        return $data;
    }*/

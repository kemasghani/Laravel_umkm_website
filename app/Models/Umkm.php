<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
        use HasFactory;
        public $table = 'umkms';
        protected $fillable = [
            'users_id',
            'nama_pemilik',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'kewarganegaraan',
            'nama_usaha',
            'bidang_usaha',
            'jenis_usaha',
            'nik',
            'nib',
            'nib_tahun',
            'pirt',
            'pirt_tahun',
            'npwp',
            'npwp_tahun',
            'halal',
            'halal_tahun',
            'haki',
            'haki_tahun',
            'modal',
            'jumlah_karyawan',
            'jumlah_karyawan_pria',
            'jumlah_karyawan_wanita',
            'tanggal_mulai_usaha',
            'lama_usaha',
            'omset_usaha',
            'jenis_kemitraan',
            'email',
            'no_hp',
            'user_id',
            'kecamatan',
            'alamat_rumah', 'rt_rumah', 'rw_rumah', 'desa_rumah', 'kecamatan_rumah', 'kabupaten_rumah', 'provinsi_rumah', 'kode_pos_rumah', 'koordinat_alamat_rumah',
            'alamat_usaha', 'rt_usaha', 'rw_usaha', 'desa_usaha', 'kecamatan_usaha', 'kabupaten_usaha', 'provinsi_usaha', 'kode_pos_usaha', 'koordinat_alamat_usaha',
            'foto',
            'status'
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function pemetaan(): BelongsTo
    {
        return $this->belongsTo(Pemetaan::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    public $table = 'alternatif';
    protected $fillable = ['umkms_id', 'kode_alternatif'];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkms_id');
    }
}

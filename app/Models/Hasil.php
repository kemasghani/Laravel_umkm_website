<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    public $table = 'hasil';
    protected $fillable = ['alternatif_id', 'nilai_akhir', 'pengumuman'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}

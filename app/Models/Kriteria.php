<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $table = 'kriteria';
    protected $fillable = ['aspek_id', 'kode_kriteria', 'nama_kriteria', 'jenis', 'target'];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }
}

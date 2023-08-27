<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;
    public $table = 'subkriteria';
    protected $fillable = ['kriteria_id', 'nama_subkriteria', 'nilai_bobot'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}

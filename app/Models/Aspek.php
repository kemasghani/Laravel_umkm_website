<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;
    public $table = 'aspek';
    protected $fillable = ['nama_aspek', 'bobot', 'cf', 'sf'];

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selisih extends Model
{
    use HasFactory;
    public $table = 'selisih';
    protected $fillable = ['selisih', 'bobot'];
    public $timestamps = false;
}

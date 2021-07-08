<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan_Cuti extends Model
{
    use HasFactory;
    protected $table = 'permohonan_cuti';

    protected $fillable = [
        'user_id',
        'alasan_cuti',
        'tgl_mulai',
        'tgl_akhir'
    ];
}

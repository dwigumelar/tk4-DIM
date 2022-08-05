<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
      'nama_pegawai',
      'alamat_pegawai',
      'hp_pegawai',
      'jabatan_pegawai',
      'id_bagian',
    ];
}

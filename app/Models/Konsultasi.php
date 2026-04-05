<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $primaryKey = 'id_konsultasi';
    protected $fillable = ['nama_pemilik', 'nama_kucing', 'tanggal', 'hasil_diagnosa', 'nilai_cf'];

    public function detail_konsultasi()
    {
        return $this->hasMany(DetailKonsultasi::class, 'id_konsultasi');
    }
}
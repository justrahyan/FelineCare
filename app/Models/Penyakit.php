<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $primaryKey = 'id_penyakit';
    protected $fillable = ['kode_penyakit', 'nama_penyakit', 'deskripsi', 'solusi'];

    public function basis_pengetahuan()
    {
        return $this->hasMany(BasisPengetahuan::class, 'id_penyakit');
    }
}
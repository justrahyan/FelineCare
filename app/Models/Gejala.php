<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $primaryKey = 'id_gejala';
    protected $fillable = ['kode_gejala', 'nama_gejala', 'kategori'];

    public function basis_pengetahuan()
    {
        return $this->hasMany(BasisPengetahuan::class, 'id_gejala');
    }
}
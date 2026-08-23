<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';
    protected $primaryKey = 'id_desa';

    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'nama_kepala_desa',
        'nama_admin_website',
        'email_admin',
        'no_telp_admin',
        'website',
    ];

    public function pengajuan(): HasOne
    {
        return $this->hasOne(Pengajuan::class, 'id_desa', 'id_desa');
    }

    public function domain(): HasOne
    {
        return $this->hasOne(Domain::class, 'id_desa', 'id_desa');
    }
}

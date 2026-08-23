<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domains';
    protected $primaryKey = 'id_domain';

    protected $fillable = [
        'id_desa',
        'nama_domain',
        'tanggal_aktif',
        'tanggal_kadaluarsa',
    ];

    protected $casts = [
        'tanggal_aktif' => 'date',
        'tanggal_kadaluarsa' => 'date',
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}

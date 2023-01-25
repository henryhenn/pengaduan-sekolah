<?php

namespace App\Models;

use App\Services\PelaporanSearchingService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'lokasi',
        'keterangan',
        'foto',
    ];

    public function aspirasi(): HasOne
    {
        return $this->hasOne(Aspirasi::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function scopeFilter($query, array $request)
    {
        (new PelaporanSearchingService())->search($query, $request);
    }
}

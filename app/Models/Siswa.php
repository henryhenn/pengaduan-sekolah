<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nisn', 'alamat', 'nama'];

    public function pelaporan(): HasMany
    {
        return $this->hasMany(Pelaporan::class);
    }
}

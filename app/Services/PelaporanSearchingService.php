<?php

namespace App\Services;

class PelaporanSearchingService
{
    public function search($query, array $request)
    {
        $query->when($request['lokasi'] ?? false, function ($query, $lokasi) {
            return $query->where('lokasi', 'like', '%' . $lokasi . '%');
        });

        $query->when($request['keterangan'] ?? false, function ($query, $keterangan) {
           return $query->where('keterangan', 'like', '%' . $keterangan . '%');
        });

        $query->when($request['nisn'] ?? false, function ($query, $nisn) {
           $query->whereHas('siswa', function ($query) use($nisn) {
              return $query->where('nisn', 'like', '%' . $nisn . '%');
           });
        });
        $query->when($request['kategori'] ?? false, function ($query, $kategori) {
           $query->whereHas('kategori', function ($query) use($kategori) {
              return $query->where('ket_kategori', 'like', '%' . $kategori . '%');
           });
        });
    }
}

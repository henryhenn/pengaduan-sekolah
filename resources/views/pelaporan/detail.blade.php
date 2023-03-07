@extends('layouts.app')

@section('title')
    Pelaporan dari: {{ $pelaporan->siswa->nama }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold">@yield('title')</h5>
        </div>
        <div class="card-body p-3">
            <x-alert />

            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $pelaporan->foto) }}" width="300px" class="img-fluid">
            </div>
            <h6>Lokasi: {{ $pelaporan->lokasi }}</h6>
            <p>Kategori: <span class="fw-bold">{{ $pelaporan->kategori->ket_kategori }}</span></p>
            <p>Keterangan: <span class="fw-bold">{{ $pelaporan->keterangan }}</span></p>

            <div class="mt-5">
                <h6>Tanggapan</h6>
                @if (empty($latest_aspirasi))
                    <b class="d-block">Belum ada tanggapan</b>
                    <a href="{{ route('aspirasis.show', $pelaporan->id) }}" class="btn btn-outline-primary mt-4">Tambah
                        Tanggapan</a>
                @else
                    <p>Feedback: {{ $latest_aspirasi->feedback }}</p>
                    <p>Status: {{ $latest_aspirasi->status }}</p>

                    <a href="{{ route('aspirasis.show', $pelaporan->id) }}" class="btn btn-outline-primary mt-4">Tambah
                        Tanggapan</a>
                @endif

                <h6>History:</h6>

                @forelse ($aspirasis as $aspirasi)
                    <p>Tanggal: {{ $aspirasi->created_at }}</p>
                    <p>Feedback: {{ $aspirasi->feedback }}</p>
                    <p>Status: {{ $aspirasi->status }}</p>
                    <br>
                @empty
                    <b>Tidak ada history terkini</b>
                @endforelse
            </div>
        </div>
    </div>
@endsection

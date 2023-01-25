@extends('layouts.app')

@section('title')
    Pelaporan dari: {{$pelaporan->siswa->nama}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold">@yield('title')</h5>
        </div>
        <div class="card-body p-3">
            <x-alert/>

            <div class="d-flex justify-content-center">
                <img src="{{asset('storage/' . $pelaporan->foto)}}" width="300px" class="img-fluid">
            </div>
            <h6>Lokasi: {{$pelaporan->lokasi}}</h6>
            <p>Kategori: <span class="fw-bold">{{$pelaporan->kategori->ket_kategori}}</span></p>
            <p>Keterangan: <span class="fw-bold">{{$pelaporan->keterangan}}</span></p>

            <div class="mt-5">
                <h6>Tanggapan</h6>
                @if($pelaporan->aspirasi)
                    <p>Tanggapan: {{$pelaporan->aspirasi->feedback}}</p>
                    <p>Status: {{$pelaporan->aspirasi->status}}</p>
                    <a href="{{route('aspirasis.edit', $pelaporan->id)}}" class="btn btn-warning">Update Aspirasi</a>
                @else
                    <p>Belum ada aspirasi terbaru</p>
                    <a href="{{route('aspirasis.show', $pelaporan->id)}}" class="btn btn-primary">Tambah Aspirasi</a>
                @endif
            </div>
        </div>
    </div>
@endsection

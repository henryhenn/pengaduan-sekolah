@extends('layouts.app')

@section('title')
    List Pengaduan Siswa: {{$siswa->nama}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">@yield('title')</span>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-primary" id="dataTable">
                    <thead>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Lokasi</th>
                    <th>Kategori</th>
                    <th>Dibuat pada</th>
                    </thead>
                    <tbody>
                    @forelse($siswa->pelaporan as $key=>$laporan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('storage/' . $laporan->foto)}}" width="300px" class="img-fluid">
                            </td>
                            <td>{{$laporan->keterangan}}</td>
                            <td>{{$laporan->lokasi}}</td>
                            <td>{{$laporan->kategori->ket_kategori}}</td>
                            <td>{{$laporan->created_at}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data terkini</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    List Kategori
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">@yield('title')</span>
                <a href="{{route('kategoris.create')}}" class="btn btn-outline-primary">Tambah Kategori Baru</a>
            </div>
        </div>
        <div class="card-body p-3">
            <x-alert/>
            <div class="table-responsive">
                <table class="table table-primary" id="dataTable">
                    <thead>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($kategoris as $key=>$kategori)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$kategori->ket_kategori}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('kategoris.edit', $kategori->id)}}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('kategoris.destroy', $kategori->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger ms-3 btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin?')">Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data terkini</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

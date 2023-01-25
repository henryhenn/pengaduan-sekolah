@extends('layouts.app')

@section('title')
    Edit Siswa: {{$siswa->nama}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                @yield('title')
            </div>
        </div>
        <div class="card-body p-3">
            <form action="{{route('siswas.update', $siswa->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" value="{{old('nisn', $siswa->nisn)}}" id="nisn" class="form-control @error('nisn')
                            is-invalid @enderror">
                    @error('nisn')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{old('nama', $siswa->nama)}}" id="nama" class="form-control @error('nama')
                            is-invalid @enderror">
                    @error('nama')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat')
                            is-invalid @enderror">{{old('alamat', $siswa->alamat)}}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

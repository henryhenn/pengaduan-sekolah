@extends('layouts.homepage')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="pengaduan" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Pengaduan</h2>
                <p>Buat Pengaduan Baru</p>
            </div>

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <x-alert/>

                    <form action="{{route('lapor.store')}}" enctype="multipart/form-data" method="post" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <select name="siswa_id" id="siswa"
                                        class="form-control @error('siswa_id') is-invalid @enderror">
                                    <option value="">Pilih NISN Anda</option>
                                    @foreach($siswa as $siswa)
                                        <option value="{{$siswa->id}}">{{$siswa->nisn}} | {{$siswa->nama}}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <select name="kategori_id" id="kategori"
                                        class="form-control @error('kategori_id') is-invalid @enderror">
                                    <option value="">Pilih Kategori Pelaporan</option>
                                    @foreach($kategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->ket_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi"
                                   id="lokasi" placeholder="Lokasi">
                            @error('lokasi')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                   id="foto" placeholder="Foto">
                            @error('foto')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                      rows="5" placeholder="Keterangan"></textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-end mt-5">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End About Section -->

    <section id="cari" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Cari Pengaduan</h2>
                <p>Cari Pengaduan</p>
            </div>

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-8 mt-3 mt-lg-0">

                    <form action="{{url('/#cari')}}">
                        <div class="form-group">
                            <input type="text" value="{{request('kode')}}" class="form-control @error('kode') is-invalid @enderror" name="kode"
                                   id="nisn" placeholder="Masukkan Kode Pelaporan">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" value="{{request('nisn')}}" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                   id="nisn" placeholder="Masukkan NISN">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" value="{{request('kategori')}}" class="form-control @error('kategori') is-invalid @enderror"
                                   name="kategori"
                                   id="kategori_id" placeholder="Masukkan Kategori">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" value="{{request('lokasi')}}" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi"
                                   id="lokasi" placeholder="Lokasi">
                        </div>
                        <div class="text-end mt-5">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>

                    <table class="table table-responsive table-striped table-primary mt-4">
                        <thead>
                            <th>Foto</th>
                            <th>Pelapor</th>
                            <th>NISN</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                        </thead>
                        <tbody>
                        @forelse($pencarian as $cari)
                            <tr>
                                <td>
                                    <img src="{{asset('storage/' . $cari->foto)}}" width="200px"class="img-fluid">
                                </td>
                                <td>{{$cari->siswa->nama}}</td>
                                <td>{{$cari->siswa->nisn}}</td>
                                <td>{{$cari->lokasi}}</td>
                                <td>{{$cari->keterangan}}</td>
                                <td>{{$cari->kategori->ket_kategori}}</td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection

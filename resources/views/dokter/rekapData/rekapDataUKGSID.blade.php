@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Rekap Data Pasien</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
<div class="card text-white bg-primary">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-auto">
                <i data-feather="arrow-left-circle"></i>
            </div>
            <div class="col">
                <table class="table table-borderless table-sm">
                    <tr style="color: white; line-height: 14px;">
                        <td><h3><b>{{ $anak->nama }}</b></h3></td>
                    </tr>
                    <tr style="color: white; line-height: 5px; font-size:small">
                        <td>nama</td>
                        <td>jenis kelamin</td>
                        <td>nama sekolah</td>
                        <td>kelas</td>
                        <td>TTL</td>
                        <td>usia anak</td>
                    </tr>
                    <tr style="color: white; line-height: 10px; font-size:larger;">
                        <td>{{ $anak->nama }}</td>
                        <td>{{ $anak->jenis_kelamin }}</td>
                        <td>{{ $anak->sekolah->nama }}</td>
                        <td>{{ $anak->kelas->kelas }}</td>
                        <td>{{ $anak->tempat_lahir }}, {{ $anak->tanggal_lahir }}</td>
                        <?php
                            $now = new DateTime(date('Y-m-d'));
                            $ttl = new DateTime(($anak->tanggal_lahir));
                            $different = $now->diff($ttl);
                            $year = $different->format('%y');
                        ?>
                        <td>{{ $year }} Tahun</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-auto">
                <i data-feather="arrow-right-circle"></i>
            </div>
        </div>
    </div>
</div>
<br>


@if(empty($pemeriksaanFisik))
<div class="row align-center text-center">
    <div class= "col-md-4" ><hr></div>
    <div class= "col-md-4" ><h5><span class="badge rounded-pill bg-secondary px-6 py-2 content-center">Data Pemeriksaan Kosong</span></h5></div>
    <div class= "col-md-4" ><hr></div>
</div>
@else
<div class="row">
    <div class= "col-md-4" ><hr></div>
    <div class= "col-md-4" ><h5><span class="badge rounded-pill bg-secondary px-6 py-2 content-center">Pemeriksaan Tahun (Tahun 2022)</span></h5></div>
    <div class= "col-md-4" ><hr></div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <h6 class="card-title">PEMERIKSAAN FISIK</h6>
        <p class="text-muted mb-3">(19/02/2022)</p>
        <form class="forms-sample">
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tinggi badan (cm)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Tinggi badan" readonly value="{{ $pemeriksaanFisik->tinggi_badan }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Berat badan (kg)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Berat badan" readonly value="{{ $pemeriksaanFisik->berat_badan }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">IMT (kg/m2)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="IMT" readonly value="{{ $pemeriksaanFisik->imt }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Sistole (mmHg)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Sistole" readonly value="{{ $pemeriksaanFisik->sistole }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Diastole (mmHg)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Diastole" readonly value="{{ $pemeriksaanFisik->diastole }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>HASIL :</h6>
                    <button type="button" class="btn btn-success btn-lg mb-3"><b>IDEAL</b></button>
                    <h6>REKOMENDASI :</h6>
                    <p>-</p>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <h6 class="card-title">PEMERIKSAAN MATA</h6>
        <p class="text-muted mb-3">(19/02/2022)</p>
        <form class="forms-sample">
            <div class="row">
                <div class="col-md-6">
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Mata perih/merah dan bengkak
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline" id="radioInline" {{ ($pemeriksaanMata->soal1 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline"> 
                                <input type="radio" class="form-check-input" name="radioInline" id="radioInline1" {{ ($pemeriksaanMata->soal1 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Tidak dapat membaca/melihat dengan jelas
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline2" id="radioInline"  {{ ($pemeriksaanMata->soal2 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline2" id="radioInline1"  {{ ($pemeriksaanMata->soal2 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Menggunakan kacamata
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline3" id="radioInline"  {{ ($pemeriksaanMata->soal3 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline3" id="radioInline1"  {{ ($pemeriksaanMata->soal3 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Mata juling
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline4" id="radioInline"  {{ ($pemeriksaanMata->soal4 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline4" id="radioInline1"  {{ ($pemeriksaanMata->soal4 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Tidak dapat membedakan warna dengan baik
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline5" id="radioInline"  {{ ($pemeriksaanMata->soal5 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline5" id="radioInline1"  {{ ($pemeriksaanMata->soal5 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <h6>HASIL :</h6>
                    <div class="btn-group btn-group-lg mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger"><b>
                            MATA MINUS
                        </b></button>
                        <a class="btn btn-icon btn-danger" href="#" role="button">
                            <i data-feather="edit-2"></i>
                        </a>
                    </div>
                    <h6>REKOMENDASI :</h6>
                    <p>-</p>
                </div> 
            </div> 
        </form>
    </div>
</div>
<br>
{{ $pemeriksaanTelinga }}
<div class="card">
    <div class="card-body">
        <h6 class="card-title">PEMERIKSAAN TELINGA</h6>
        <p class="text-muted mb-3">(19/02/2022)</p>
        <form class="forms-sample">
            <div class="row">
                <div class="col-md-6">
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Tidak merespon bila ada suara keras
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline" id="radioInline"  {{ ($pemeriksaanTelinga->soal1 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline" id="radioInline1"  {{ ($pemeriksaanTelinga->soal1 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Tidak mendengar bila dipanggil
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline2" id="radioInline" {{ ($pemeriksaanTelinga->soal2 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline2" id="radioInline1" {{ ($pemeriksaanTelinga->soal2 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Tidak dapat mendengar dengan jelas
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline3" id="radioInline" {{ ($pemeriksaanTelinga->soal3 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline3" id="radioInline1" {{ ($pemeriksaanTelinga->soal3 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Keluar cairan telingan
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline4" id="radioInline" {{ ($pemeriksaanTelinga->soal4 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline4" id="radioInline1" {{ ($pemeriksaanTelinga->soal4 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Telinga terasa tertutup atau tersumbat
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline5" id="radioInline" {{ ($pemeriksaanTelinga->soal5 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline5" id="radioInline1" {{ ($pemeriksaanTelinga->soal5 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <div class="sm-1">
                            <label for="exampleInputMobile" class="col-sm-8 col-form-label">
                                Nyeri telinga
                            </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline6" id="radioInline" {{ ($pemeriksaanTelinga->soal6 == "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline6" id="radioInline1" {{ ($pemeriksaanTelinga->soal6 != "ya") ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row sm-1">
                        <label for="exampleInputMobile" class="col-sm-5 col-form-label">
                            Volume saat menonton TV / mendengarkan radio
                        </label>
                        <div class="col-sm-7">
                        <div class="sm-1">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline7" id="radioInline" {{ ($pemeriksaanTelinga->soal7 < 35) ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline">
                                    Kecil
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline7" id="radioInline1" {{ ($pemeriksaanTelinga->soal7 >= 34 && $pemeriksaanTelinga->soal7 < 75) ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline1">
                                    Sedang
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radioInline7" id="radioInline1" {{ ($pemeriksaanTelinga->soal7 > 75) ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioInline2">
                                    Besar
                                </label>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>HASIL :</h6>
                    <div class="btn-group btn-group-lg mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger"><b>
                            SERUMEN 2
                        </b></button>
                        <a class="btn btn-icon btn-danger" href="#" role="button">
                            <i data-feather="edit-2"></i>
                        </a>
                    </div>
                    <h6>REKOMENDASI :</h6>
                    <p>-</p>
                </div> 
            </div>
        </form>
    </div>
</div>
<br>
@if(empty($pemeriksaanGigi))
<div class="row align-center text-center">
    <div class= "col-md-4" ><hr></div>
    <div class= "col-md-4" ><h5><span class="badge rounded-pill bg-secondary px-6 py-2 content-center">Data Pemeriksaan Gigi Kosong</span></h5></div>
    <div class= "col-md-4" ><hr></div>
</div>
@else
<div class="card">
    <div class="card-body">
        <h6 class="card-title">PEMERIKSAAN GIGI</h6>
        <p class="text-muted mb-3">(19/02/2022)</p>
        <form class="forms-sample">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <div class="row row-cols-5">
                            <div class="col">
                                <img src="..." class="rounded wd-100 wd-sm-150 me-3" alt="...">
                                <p class="tx-11 text-muted">Foto sisi depan</p>
                            </div>
                            <div class="col">
                                <img src="..." class="rounded wd-100 wd-sm-150 me-3" alt="...">
                                <p class="tx-11 text-muted">Foto sisi kanan</p>
                            </div>
                            <div class="col">
                                <img src="..." class="rounded wd-100 wd-sm-150 me-3" alt="...">
                                <p class="tx-11 text-muted">Foto sisi kiri</p>
                            </div>
                            <div class="col">
                                <img src="..." class="rounded wd-100 wd-sm-150 me-3" alt="...">
                                <p class="tx-11 text-muted">Foto sisi depan</p>
                            </div>
                            <div class="col">
                                <img src="..." class="rounded wd-100 wd-sm-150 me-3" alt="...">
                                <p class="tx-11 text-muted">Foto sisi belakang</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="exampleInputMobile" class="col-sm-5 col-form-label">Frekuensi menyikat gigi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Frekuensi menyikat gigi">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="exampleInputMobile" class="col-sm-5 col-form-label">Kunjungan ke dokter gigi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Kunjungan ke dokter gigi">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="exampleInputMobile" class="col-sm-5 col-form-label">Diagnosa Dokter</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Diagnosa Dokter">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>HASIL :</h6>
                    <button type="button" class="btn btn-success btn-lg mb-3"><b>
                        BAIK
                    </b></button>
                    <h6>REKOMENDASI :</h6>
                    <p>
                        Segera lakukan pencabutan akar ke dokter
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
@endif
<div class="row align-center text-center">
    <div class= "col-md-4" ><hr></div>
    <div class= "col-md-4" ><h5><span class="badge rounded-pill bg-secondary px-7 py-2 content-center">Pemeriksaan Tahun 2021</span></h5></div>
    <div class= "col-md-4" ><hr></div>
</div>
@endif
@endsection
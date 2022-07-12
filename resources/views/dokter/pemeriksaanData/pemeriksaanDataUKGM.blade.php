@extends('layout.master')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pemeriksaan Gigi</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <--- User ---->
            </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="wizard">
                        <h2>Pengisian Odontogram</h2>
                        <section>
                            <div class="row">
                                <div class="col-md-9">
                                    <div>
                                        <strong>PENGISIAN ODONTOGRAM</strong>
                                        <p>Pilih posisi gigi dan klik aksi yang seseuai dengan kondisi gigi anak</p>
                                    </div>
                                    <!-- <div class="border border-light m-1 h-75"> -->
                                        <div class="border border-light h-75 w-100 text-center" style="line-height: 0;">
                                            @include('dokter.pemeriksaanData.odontogram')
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                            <strong>VALIDASI</strong> Pemeriksaan odontogram telah sesuai kondisi gigi anak
                                            </label>
                                        </div>
                                    <!-- </div> -->
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <div class="p-2 bd-highlight"><strong>Aksi:</strong></div>
                                        <div class="p-2 bd-highlight">
                                            <div class="btn-group-vertical me-1" role="group" aria-label="Vertical button group">
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="belum-erupsi"><img src="{{asset('pemeriksaan/belum-erupsi.png')}}" alt="">&nbsp<span class="align-middle">Belum Erupsi</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="erupsi-sebagian"><img src="{{asset('pemeriksaan/erupsi-sebagian.png')}}" alt="">&nbsp<span class="align-middle">Erupsi Sebagian</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="karies"><img src="{{asset('pemeriksaan/karies.png')}}" alt="">&nbsp<span class="align-middle">Karies</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="non-vital"><img src="{{asset('pemeriksaan/non-vital.png')}}" alt="">&nbsp<span class="align-middle">Non Vital</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="tambalan-logam"><img src="{{asset('pemeriksaan/tambalan-logam.png')}}" alt="">&nbsp<span class="align-middle">Tambalan Logam</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="tambalan-non-logam"><img src="{{asset('pemeriksaan/tambalan-non-logam.png')}}" alt="">&nbsp<span class="align-middle">Tambalan Non Logam</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="mahkota-logam"><img src="{{asset('pemeriksaan/mahkota-logam.png')}}" alt="">&nbsp<span class="align-middle">Mahkota Logam</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="mahkota-non-logam"><img src="{{asset('pemeriksaan/mahkota-non-logam.png')}}" alt="">&nbsp<span class="align-middle">Mahkota Non Logam</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="sisa-akar"><img src="{{asset('pemeriksaan/sisa-akar.png')}}" alt="">&nbsp<span class="align-middle">Sisa Akar</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="gigi-hilang"><img src="{{asset('pemeriksaan/gigi-hilang.png')}}" alt="">&nbsp<span class="align-middle">Gigi Hilang</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="jembatan"><img src="{{asset('pemeriksaan/jembatan.png')}}" alt="">&nbsp<span class="align-middle">Jembatan</span></button>
                                                <button type="button" class="btn btn-light btn-aksi" style="text-align:left;" id="gigi-tiruan-lepas"><img src="{{asset('pemeriksaan/gigi-tiruan-lepas.png')}}" alt="">&nbsp<span class="align-middle">Gigi Tiruan Lepas</span></button>
                                                <button type="button" class="btn btn-danger btn-aksi" id="hapus-aksi">HAPUS AKSI</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>Skrining Indeks</h2>
                        <section>
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">SKOR def t</h6>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="d" class="col-sm-1 col-form-label">d</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="exampleInputD"
                                                        placeholder="0">
                                                </div>
                                                <label for="e" class="col-sm-1 col-form-label">e</label>
                                                <div class="col-sm-2">
                                                    <input type="email" class="form-control" id="exampleInputE"
                                                        placeholder="0">
                                                </div>
                                                <label for="f" class="col-sm-1 col-form-label">f</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="exampleInputF"
                                                        placeholder="0">
                                                </div>
                                            </div>
                                        </form>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="readonlyDEFT" class="col-sm-1 col-form-label">def-t</label>
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" id="exampleDEFT" readonly
                                                        value="0">
                                                </div>
                                            </div>
                                        </form>
                                        <h6 class="card-title">SKOR DMF-T</h6>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="d" class="col-sm-1 col-form-label">d</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="exampleInputUsername2"
                                                        placeholder="0">
                                                </div>
                                                <label for="m" class="col-sm-1 col-form-label">e</label>
                                                <div class="col-sm-2">
                                                    <input type="email" class="form-control" id="exampleInputEmail2"
                                                        placeholder="0">
                                                </div>
                                                <label for="f" class="col-sm-1 col-form-label">f</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="exampleInputMobile"
                                                        placeholder="0">
                                                </div>
                                            </div>
                                        </form>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="readonlyDMFT" class="col-sm-1 col-form-label">DMF-T</label>
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" id="exampleDEFT" readonly
                                                        value="0">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>Peneliaian Resiko Karies</h2>
                        <section>
                            <div class="container p-1">
                                <div class="row">
                                    <div class="col-md-15 grid-margin stretch-card">
                                        <div class="card bg-light ">
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <p style="font-weight:bold;">PENILIAN RISIKO KARIES</p>
                                                    <div class="row mb-3 ">
                                                        <label for="nama" class="col-sm-3 col-form-label">Penilaian
                                                            Risiko
                                                            Karies Anak
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <select class="js-example-basic-single form-select"
                                                                data-width="100%" placeholder="Pilih Posyandu">
                                                                <option selected disabled>Pilih Risiko</option>
                                                                <option value="#">Option 1</option>
                                                                <option value="#">Option 2</option>
                                                                <option value="#">Option 3</option>
                                                                <option value="#">Option 4</option>
                                                                <option value="#">Option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-1">
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Ayah/ Ibu memiliki karies yang tidak ditambal?</p>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="radioDefault"
                                                id="radioDefault">
                                            <label class="form-check-label" for="radioDefault">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-3" >
                                            <input type="radio" class="form-check-input" name="radioDefault"
                                                id="radioDefault1">
                                            <label class="form-check-label" for="radioDefault1">
                                                Tidak
                                            </label>
                                        </div>
                                    </form>
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Orang tua memiliki sosioekonomi rendah?</p>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault2">
                                        <label class="form-check-label" for="radioDefault2">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault13">
                                        <label class="form-check-label" for="radioDefault3">
                                            Tidak
                                        </label>
                                    </div>
                                    </form>
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Anak makan makanan ringan dan minuman manis (termasuk minuman bersoda) lebih dari 3x perhari?</p>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault4">
                                        <label class="form-check-label" for="radioDefault4">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault5">
                                        <label class="form-check-label" for="radioDefault5">
                                            Tidak
                                        </label>
                                    </div>
                                    </form>
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Anak minum susu botol atau ASI sebagai pengantar tidur?</p>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault6">
                                        <label class="form-check-label" for="radioDefault6">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault7">
                                        <label class="form-check-label" for="radioDefault7">
                                            Tidak
                                        </label>
                                    </div>
                                    </form>
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Anak baru pindah dari daerah tertentu? </p>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="radioDefault"
                                                id="radioDefault10">
                                            <label class="form-check-label" for="radioDefault10">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input type="radio" class="form-check-input" name="radioDefault"
                                                id="radioDefault11">
                                            <label class="form-check-label" for="radioDefault11">
                                                Tidak
                                            </label>
                                        </div>
                                    </form>
                                    <form action="#" method="post">
                                        <p style="font-weight:500;" class="mb-2">Anak mengkonsumsi vitamin mengandung fluoride?</p>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault12">
                                        <label class="form-check-label" for="radioDefault12">
                                            Tidak
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" name="radioDefault"
                                            id="radioDefault13">
                                        <label class="form-check-label" for="radioDefault13">
                                            Ya
                                        </label>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </section>

                        <h2>Hasil Pemeriksaan</h2>
                        <section>
                            <form class="forms-sample">
                                <div class="row mb-3">
                                    <label for="diagnosa" class="col-sm-2 col-form-label">Resiko Karies</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="exampleInputD"
                                            placeholder="isi diagnosa...">
                                    </div>
                                </div>
                            </form>
                            <form class="forms-sample">
                                <div class="row mb-3">
                                    <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="exampleInputD"
                                            placeholder="isi rekomendasi...">
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" id="keterangan">
                <div class="card-body">
                    <p class="text-muted">KETERANGAN: </p>
                    <form class="forms-sample">
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Belum Erupsi</label>
                            <div class="col-sm-9">
                                <input type="text" name="belum-erupsi" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Erupsi Sebagian</label>
                            <div class="col-sm-9">
                                <input type="text" name="erupsi-sebagian" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Karies</label>
                            <div class="col-sm-9">
                                <input type="text" name="karies" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Non Vital</label>
                            <div class="col-sm-9">
                                <input type="text" name="non-vital" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Tambalan Logam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tambalan-logam" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Tambalan Non Logam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tambalan-non-logam" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Mahkota Logam</label>
                            <div class="col-sm-9">
                                <input type="text" name="mahkota-logam" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Sisa Akar</label>
                            <div class="col-sm-9">
                                <input type="text" name="sisa-akar" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Gigi Hilang</label>
                            <div class="col-sm-9">
                                <input type="text" name="gigi-hilang" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Jembatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="jembatan" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Gigi Tiruan Lepas</label>
                            <div class="col-sm-9">
                                <input type="text" name="gigi-tiruan-lepas" class="form-control" readonly>
                                <span class="posisi-gigi"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-style')
<style>
    .wizard > .content {
        min-height: 75vh !important;
    }
</style>
@endpush
@push('after-script')
<script>
    $(document).ready(function(){
        let action, jml, posisi, x, y, filled;
        let arrayAksi = {}, belumErupsi = [], erupsiSebagian = [], karies = [], nonVital = [], tambalanLogam = [], tambalanNonLogam = [], mahkotaLogam = [], mahkotaNonLogam = [], sisaAkar = [], gigiHilang = [], jembatan = [], gigiTiruanLepas = [];
        $('.btn-aksi').click(function(){
            action = $(this).attr('id');
            if (action != 'hapus-aksi') {
                $('.btn-aksi').removeClass('btn-success').addClass('btn-light');
                $(this).removeClass('btn-light').addClass('btn-success');
            }
        });

        $('polygon').click(function (evt) {
            let color,type,element;
			var odontogram = $(evt.target);
			var odontogramParent = odontogram.parent().attr('id');
            var odontogramId = odontogramParent + '-' +odontogram.attr('id');

            let foundParent = Object.keys(arrayAksi).filter(function(key) {
                return arrayAksi[key].includes(odontogramParent);
            });

            let foundParentId = Object.keys(arrayAksi).filter(function(key) {
                return arrayAksi[key].includes(odontogramId);
            });

            switch (action) {
                case 'belum-erupsi':
                    if (foundParent < 1) {
                        type = 'insert-text';
                        x = 1.5; y = 15;
                        color = '#5D5FEF';
                        style = 'font-size: 10pt;font-weight:bold';
                        element = 'UE';
                        belumErupsi.push(odontogramParent);
                        arrayAksi['belumErupsi'] = belumErupsi;
                        jml = belumErupsi.length;
                        posisi = belumErupsi;
                        filled = true;
                    }
                    break;
                case 'erupsi-sebagian':
                    if (foundParent < 1) {
                        type = 'insert-text';
                        x = 1.5; y = 15;
                        color = '#5D5FEF';
                        style = 'font-size: 10pt;font-weight:bold';
                        element = 'PE'
                        erupsiSebagian.push(odontogramParent);
                        arrayAksi['erupsiSebagian'] = erupsiSebagian;
                        jml = erupsiSebagian.length;
                        posisi = erupsiSebagian;
                        filled = true;
                    }
                    break;
                case 'karies':
                    if (foundParentId < 1) {
                        color = 'grey';
                        karies.push(odontogramId);
                        arrayAksi['karies'] = karies;
                        jml = karies.length;
                        posisi = karies;
                        filled = true;
                    }
                    break;
                case 'non-vital':
                    if (foundParent < 1) {
                        type = 'insert-non-vital';
                        nonVital.push(odontogramParent);
                        arrayAksi['nonVital'] = nonVital;
                        jml = nonVital.length;
                        posisi = nonVital;
                        style = 'stroke-width:2';
                        color = '#C71616';
                        filled = true;
                    }
                    break;
                case 'tambalan-logam':
                    if (foundParentId < 1) {
                        color = 'pink';
                        tambalanLogam.push(odontogramId);
                        arrayAksi['tambalanLogam'] = tambalanLogam;
                        jml = tambalanLogam.length;
                        posisi = tambalanLogam;
                        filled = true;
                    }
                    break;
                case 'tambalan-non-logam':
                    if (foundParentId < 1) {
                        color = 'blue';
                        tambalanNonLogam.push(odontogramId);
                        arrayAksi['tambalanNonLogam'] = tambalanNonLogam;
                        jml = tambalanNonLogam.length;
                        posisi = tambalanNonLogam;
                        filled = true;
                    }
                    break;
                case 'mahkota-logam':
                    if (foundParentId < 1) {
                        color = 'green';
                        mahkotaLogam.push(odontogramId);
                        arrayAksi['mahkotaLogam'] = mahkotaLogam;
                        jml = mahkotaLogam.length;
                        posisi = mahkotaLogam;
                        filled = true;
                    }
                    break;
                case 'mahkota-non-logam':
                    if (foundParentId < 1) {
                        color = '#66D1D1';
                        mahkotaNonLogam.push(odontogramId);
                        arrayAksi['mahkotaNonLogam'] = mahkotaNonLogam;
                        jml = mahkotaNonLogam.length;
                        posisi = mahkotaNonLogam;
                        filled = true;
                    }
                    break;
                case 'sisa-akar':
                    if (foundParent < 1) {
                        type = 'insert-text';
                        x = 3.5; y = 17;
                        color = '#5D5FEF';
                        style = 'font-size: 15pt;font-weight:bold';
                        element = 'V'
                        sisaAkar.push(odontogramParent);
                        arrayAksi['sisaAkar'] = sisaAkar;
                        jml = sisaAkar.length;
                        posisi = sisaAkar;
                        filled = true;
                    }
                    break;
                case 'gigi-hilang':
                    if (foundParent < 1) {
                        type = 'insert-text';
                        x = 3.5; y = 17;
                        color = '#C71616';
                        style = 'font-size: 15pt;font-weight:bold';
                        element = 'X'
                        gigiHilang.push(odontogramParent);
                        arrayAksi['gigiHilang'] = gigiHilang;
                        jml = gigiHilang.length;
                        posisi = gigiHilang;
                        filled = true;
                    }
                    break;
                case 'jembatan':
                    if (foundParent < 1) {
                        type = 'insert-line';
                        color = '#048A3F';
                        style = 'stroke-width:2';
                        jembatan.push(odontogramParent);
                        arrayAksi['jembatan'] = jembatan;
                        jml = jembatan.length;
                        posisi = jembatan;
                        filled = true;
                    }
                    break;
                case 'gigi-tiruan-lepas':
                    if (foundParent < 1) {
                        type = 'insert-line';
                        color = '#E4AA04';
                        style = 'stroke-width:2';
                        gigiTiruanLepas.push(odontogramParent);
                        arrayAksi['gigiTiruanLepas'] = gigiTiruanLepas;
                        jml = gigiTiruanLepas.length;
                        posisi = gigiTiruanLepas;
                        filled = true;
                    }
                    break;
                case 'hapus-aksi':
                    Object.keys(arrayAksi).filter(function(key) {
                        return arrayAksi[key].filter(function(e) { return e !== odontogramParent });
                    });
                    break;
            }

            console.log(arrayAksi);

            if (type == 'insert-text') {
                d3.select('g#'+odontogramParent).append('text').attr('id',odontogramParent).attr('x', x).attr('y', y).attr('stroke', color).attr('fill', color).attr('stroke-width', '0.1').attr('style', style).text(element);
            } else if (type == 'insert-line') {
                d3.select('g#'+odontogramParent).append('line').attr('id',odontogramParent).attr('x1', '20').attr('y1', '10').attr('x2', '0').attr('y2', '10').attr('stroke',color).attr('style', style);
            } else if (type == 'insert-non-vital') {
                d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('x1', '5').attr('y1', '15').attr('x2', '0').attr('y2', '15').attr('stroke',color).attr('style', style);
                d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('x1', '15').attr('y1', '5').attr('x2', '5').attr('y2', '15').attr('stroke',color).attr('style', style);
                d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('x1', '20').attr('y1', '5').attr('x2', '15').attr('y2', '5').attr('stroke',color).attr('style', style);
            } else {
                odontogram.attr('fill', color);
            }

            if (filled) {
                filled = false;
                $("#keterangan form").find("input[name='"+action+"']").val(jml);
                $("#keterangan form").find("input[name='"+action+"']").parent().find('span').text(posisi.toString().toUpperCase());
            }
		});
    });
</script>
@endpush

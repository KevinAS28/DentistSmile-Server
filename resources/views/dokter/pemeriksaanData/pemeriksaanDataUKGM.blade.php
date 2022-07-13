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
                                            <input type="checkbox" class="form-check-input" id="validation-skrining">
                                            <label class="form-check-label" for="validation-skrining">
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
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="belum-erupsi"><img src="{{asset('pemeriksaan/belum-erupsi.png')}}" alt="">&nbsp<span class="align-middle">Belum Erupsi</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="erupsi-sebagian"><img src="{{asset('pemeriksaan/erupsi-sebagian.png')}}" alt="">&nbsp<span class="align-middle">Erupsi Sebagian</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="karies"><img src="{{asset('pemeriksaan/karies.png')}}" alt="">&nbsp<span class="align-middle">Karies</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="non-vital"><img src="{{asset('pemeriksaan/non-vital.png')}}" alt="">&nbsp<span class="align-middle">Non Vital</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="tambalan-logam"><img src="{{asset('pemeriksaan/tambalan-logam.png')}}" alt="">&nbsp<span class="align-middle">Tambalan Logam</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="tambalan-non-logam"><img src="{{asset('pemeriksaan/tambalan-non-logam.png')}}" alt="">&nbsp<span class="align-middle">Tambalan Non Logam</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="mahkota-logam"><img src="{{asset('pemeriksaan/mahkota-logam.png')}}" alt="">&nbsp<span class="align-middle">Mahkota Logam</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="mahkota-non-logam"><img src="{{asset('pemeriksaan/mahkota-non-logam.png')}}" alt="">&nbsp<span class="align-middle">Mahkota Non Logam</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="sisa-akar"><img src="{{asset('pemeriksaan/sisa-akar.png')}}" alt="">&nbsp<span class="align-middle">Sisa Akar</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="gigi-hilang"><img src="{{asset('pemeriksaan/gigi-hilang.png')}}" alt="">&nbsp<span class="align-middle">Gigi Hilang</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="jembatan"><img src="{{asset('pemeriksaan/jembatan.png')}}" alt="">&nbsp<span class="align-middle">Jembatan</span></button>
                                                <button type="button" class="btn btn-light btn-group-aksi btn-aksi" style="text-align:left;" id="gigi-tiruan-lepas"><img src="{{asset('pemeriksaan/gigi-tiruan-lepas.png')}}" alt="">&nbsp<span class="align-middle">Gigi Tiruan Lepas</span></button>
                                                <button type="button" class="btn btn-danger btn-group-aksi" id="hapus-aksi">HAPUS AKSI</button>
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
<script src="{{asset('assets/js/skrining-odontogram.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            labels: {
                finish: "Submit",
                next: "Lanjut",
                previous: "Kembali"
            },
            onStepChanging:function(){
                let validation = $("#validation-skrining").is(':checked');
                if (!validation) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Silahkan lakukan validasi terlebih dahulu',
                        showConfirmButton: false,
                    });
                    return false;
                } else {
                    return true;
                }
            },
            onStepChanged:function(event, currentIndex, newIndex){
                if(currentIndex == 0){
                    document.getElementById("keterangan").style.display = "";
                }else{
                    document.getElementById("keterangan").style.display = "none";
                }
                return true;
            },
        });

    });
</script>
@endpush

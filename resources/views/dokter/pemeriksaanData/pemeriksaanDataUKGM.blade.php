@extends('layout.master')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dokter.periksaUKGM')}}">Pemeriksaan Gigi</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ucwords($ukgm->anak->nama)}}
            </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="wizard" >
                        <h2>Pengisian Odontogram</h2>
                        <section>
                            <div class="row">
                                <div class="col-md-9">
                                    <div>
                                        <strong>PENGISIAN ODONTOGRAM</strong>
                                        <p>Pilih posisi gigi dan klik aksi yang seseuai dengan kondisi gigi anak</p>
                                        <div class="w-100 mb-1 d-flex list-image-pemeriksaan">
                                            @for($i=1; $i<=5; $i++)
                                            @php $img = 'gambar'.$i;  @endphp
                                            <div>
                                                @if(!empty($ukgm[$img]))
                                                <img src='{{@asset("storage/gigi/$ukgm[$img]")}}' data-bs-toggle="modal" data-bs-target="#modal-image" class="rounded img-thumbnail w-100 h-100" alt="...">
                                                @else
                                                <img src='{{@asset("assets/images/others/placeholder.jpg")}}' data-bs-toggle="modal" data-bs-target="#modal-image" class="rounded img-thumbnail w-100 h-100" alt="...">
                                                @endif
                                            </div>
                                            @endfor
                                        </div>
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
                                                    <input type="number" name="def_d" class="form-control skor-d"
                                                        value="0" min="0">
                                                </div>
                                                <label for="e" class="col-sm-1 col-form-label">e</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="def_e" class="form-control skor-e"
                                                        value="0" min="0">
                                                </div>
                                                <label for="f" class="col-sm-1 col-form-label">f</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="def_f" class="form-control skor-f"
                                                        value="0" min="0">
                                                </div>
                                            </div>
                                        </form>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="readonlyDEFT" class="col-sm-1 col-form-label">def-t</label>
                                                <div class="col-sm-1">
                                                    <input type="number" name="def_t" class="form-control total-skor" readonly
                                                        value="0">
                                                </div>
                                            </div>
                                        </form>
                                        <h6 class="card-title">SKOR DMF-T</h6>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="d" class="col-sm-1 col-form-label">d</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="dmf_d" class="form-control skor-d"
                                                        value="0" min="0">
                                                </div>
                                                <label for="m" class="col-sm-1 col-form-label">e</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="dmf_e" class="form-control skor-e"
                                                        value="0" min="0">
                                                </div>
                                                <label for="f" class="col-sm-1 col-form-label">f</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="dmf_f" class="form-control skor-f"
                                                        value="0" min="0">
                                                </div>
                                            </div>
                                        </form>
                                        <form class="forms-sample">
                                            <div class="row mb-3">
                                                <label for="readonlyDMFT" class="col-sm-1 col-form-label">DMF-T</label>
                                                <div class="col-sm-1">
                                                    <input type="number" name="dmf_t" class="form-control total-skor" readonly
                                                        value="0">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h2>Peneliaian Resiko Karies</h2>
                        <section >
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
                                                            <select class="form-select"
                                                                data-width="100%" placeholder="Pilih Resiko">
                                                                <option value="#">Tinggi</option>
                                                                <option value="#">Sedang</option>
                                                                <option value="#">Rendah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-1">
                                    @include('dokter.pemeriksaanData.resikokaries')


                                </div>
                            </div>
                        </section>

                        <h2>Hasil Pemeriksaan</h2>
                        <section>
                            <form class="forms-sample">
                                <div class="row mb-3">
                                    <label for="diagnosa" class="col-sm-2 col-form-label">Resiko Karies</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnosa" class="form-control w-100" id="" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                            <form class="forms-sample">
                                <div class="row mb-3">
                                    <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi</label>
                                    <div class="col-sm-10">
                                        <textarea name="rekomendasi" class="form-control w-100" id="" rows="2"></textarea>
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
                            <label for="" class="col-sm-3 col-form-label">Mahkota Non Logam</label>
                            <div class="col-sm-9">
                                <input type="text" name="mahkota-non-logam" class="form-control" readonly>
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
<!-- modal -->
<div class="modal fade" id="modal-image" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <div class="w-100 text-center">
            <img src="" alt="" id="img-in-modal" class="img-fluid">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
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
    var imageSrc;
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

        $(document).on("change","input[name=def_d],input[name=def_e],input[name=def_f]", function(){
            let total = parseInt($("input[name=def_d]").val()) + parseInt($("input[name=def_e]").val()) + parseInt($("input[name=def_f]").val());
            $("input[name=def_t]").val(total);
        });

        $(document).on("change","input[name=dmf_d],input[name=dmf_e],input[name=dmf_f]", function(){
            let total = parseInt($("input[name=dmf_d]").val()) + parseInt($("input[name=dmf_e]").val()) + parseInt($("input[name=dmf_f]").val());
            $("input[name=dmf_t]").val(total);
        });

        $('.list-image-pemeriksaan img').click(function() {
            imageSrc = $(this).attr('src');
        });
        console.log(imageSrc);

        $('#modal-image').on('shown.bs.modal', function (e) {
            $("#img-in-modal").attr('src', imageSrc  );
            });
        });

        $('#myModal').on('hide.bs.modal', function (e) {
            $("#img-in-modal").attr('src','');
        })

</script>
<script src="{{asset('assets/js/skrining-odontogram.js')}}"></script>
@endpush

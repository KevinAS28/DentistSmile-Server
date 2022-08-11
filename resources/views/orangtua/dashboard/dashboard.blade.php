@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="d-flex justify-content-between align-items-baseline">
                            <h3> Selamat Datang, Bu Julia </h3>
                            <button type="button" class="btn btn-primary">Tambah Data Anak</button>
                        </div>


                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <p class="text-muted mb-3">nama anak</p>
                                <h3 class="mb-2">3,897</h3>
                            </div>
                        </div> -->

                        <table class="table table-borderless table-sm">
                            <thead>
                                <tr style="color: black; line-height: 14px;">
                                    <td colspan="5">
                                        <div class="d-flex justify-content-between w-100">
                                            <div>
                                                <h3><b>Selamat Datang, {{$user->nama}}</b></h3>
                                            </div>
                                            <div class="w-25">
                                                <select name="anak" class="form-control" id="pilih-anak"
                                                    data-width="100%">
                                                    <option selected disabled>Pilih Anak</option>
                                                    @foreach($user->anak as $anak)
                                                    <option data-t="{{ucwords($anak->tempat_lahir)}}"
                                                        data-tl="{{$anak->tanggal_lahir->translatedFormat('j F Y')}}"
                                                        data-age="{{$anak->tanggal_lahir->diffInYears(\Carbon\Carbon::now())}}"
                                                        data-jk="{{ucwords($anak->jenis_kelamin)}}"
                                                        value="{{$anak->id}}">{{$anak->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="color: black; line-height: 5px; font-size:small">
                                    <td>Nama anak</td>
                                    <td>Jenis kelamin</td>
                                    <!-- <td>Nama posyandu</td> -->
                                    <td>TTL</td>
                                    <td>Usia anak</td>
                                </tr>
                                <tr style="color: black; line-height: 10px; font-size:larger;" id="row-data-anak">
                                    <td>-</td>
                                    <td>-</td>
                                    <!-- <td>Seruni</td> -->
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title">KONDISI KESEHATAN ANAK</h6>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Ideal</h5>
                                        <p class="card-text">07/12/2021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Ideal</h5>
                                        <p class="card-text">07/12/2021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Ideal</h5>
                                        <p class="card-text">07/12/2021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Ideal</h5>
                                        <p class="card-text">07/12/2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Grafik Tinggi Badan Anak</h6>
                    <div class="flot-chart-wrapper">
                        <canvas id="chart-tb"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Grafik Berat Badan Anak</h6>
                    <div class="flot-chart-wrapper">
                        <canvas id="chart-bb"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-grow-1">
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title">ARTIKEL REKOMENDASI</h6>
                    </div>
                        <div class="row">
                            @foreach ($artikel as $artikel)
                        <div class="col-md-6">
                            <img class ="img-fluid"  src="{{url('storage/artikel/'.$artikel->gambar)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <p id="judul">{{$artikel->judul}}</p>
                            <a class ="btn" id="modal-artikel">Baca Artikel</a>
                        </div>

                            @endforeach
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title">VIDEO REKOMENDASI</h6>
                    </div>
                    <div class="row">
                        @foreach($video as $video)
                        <div class="col-md-7">
                        <iframe class="" width="240" height="180"
                        src="{{$video->link}}">
                            </iframe>
                        </div>
                        <div class="col-md-4">
                            <p>{{$video->judul}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('orangtua.dashboard.artikel')
</div>



@endsection
@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var idAnak = null;
    $(document).ready(function() {
        $('#pilih-anak').select2({
            placeholder: 'Pilih anak',
        });

        var chartTb = new Chart($('#chart-tb'), configChart('Tinggi Badan'));
        var chartBb = new Chart($('#chart-bb'), configChart('Berat Badan'));

        $('#pilih-anak').on('change', function() {
            idAnak = $(this).val();
            var ttl = $(this).find(':selected').data('t') + ', ' + $(this).find(':selected').data('tl');
            var jk = $(this).find(':selected').data('jk');
            var age = $(this).find(':selected').data('age');
            $('#row-data-anak').find('td').eq(0).html($(this).find(':selected').text());
            $('#row-data-anak').find('td').eq(1).html(jk);
            $('#row-data-anak').find('td').eq(2).html(ttl);
            $('#row-data-anak').find('td').eq(3).html(age + ' Tahun');
            chart(chartTb,'tb');
            chart(chartBb,'bb');
        });
    });
    function chart(model,type) {
    $.ajax({
            type: "GET",
            url: "{{ route('viewDashboard.orangtua') }}"+"?type="+type+"&id="+idAnak,
            success: function (response) {
                if (response.type == 'tb') {
                    var labels = response.label.map(function (e) {
                        return e
                    });
                    var data = response.data.map(function (e) {
                        return e
                    });
                    model.data.labels = labels;
                    model.data.datasets[0].data = data;
                    model.update();
                } else if (response.type == 'bb') {
                    var labels = response.label.map(function (e) {
                        return e
                    });
                    var data = response.data.map(function (e) {
                        return e
                    });
                    model.data.labels = labels;
                    model.data.datasets[0].data = data;
                    model.update();
                }
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
    }

    function configChart(type){
        return config = {
            type: 'line',
            data: {
                datasets: [{
                    label: type,
                    backgroundColor: 'rgba(75, 192, 192, 1)',

                }]
            }
        };
    }
</script>
@endpush

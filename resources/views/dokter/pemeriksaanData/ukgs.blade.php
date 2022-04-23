@extends('layout.master')

@section('content')





<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pemeriksaan Gigi</a></li>
            <li class="breadcrumb-item active" aria-current="page">UKGS</li>
        </ol>
    </nav>

    {{-- data box --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-1">DATA PASIEN PER WILAYAH</h6>
                <span class="h9 text-facebook">Masukan wilayah yang ingin ditampilkan datanya</span>
                
                <form class="forms-sample mt-3">
                
                    
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Wilayah Kelurahan</label>
                        <div class="col-sm-5 ">
                            <select name="kelurahan" id="kelurahan" class="js-example-basic-single form-select" data-width="100%"
                                placeholder="Pilih wilayah">
                                <option selected disabled>Pilih Wilayah</option>
                                @foreach ($kelurahan as $id => $nama)
                                    <option value="{{$id}}">{{$nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Sekolah</label>
                        <div class="col-sm-5 ">
                            <select name="sekolah" id="sekolah" class="js-example-basic-single form-select " data-width="100%"
                                placeholder="Pilih wilayah">
                                <option selected disabled>Pilih Sekolah</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-5">
                            <select name="kelas" id="kelas" class="js-example-basic-single form-select" data-width="100%"
                                placeholder="Pilih Kelas">
                                <option selected disabled>Pilih Kelas</option>
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            
            </div>
        </div>
    </div>
    {{-- end of data box --}}

    {{-- tabel data --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <span class="h9 text-facebook">Berikut merupakan tabel pasien gigi di Pulo</span>
                <div class="table-responsive mt-2">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TANGGAL SKRINING</th>
                                <th>WAKTU</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>NAMA SEKOLAH</th>
                                <th>KELAS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>07/02/2020</td>
                                <td>14:00</td>
                                <td>Adisty Sahida </td>
                                <td>Laki-laki</td>
                                <td>SDN Pulo 07</td>
                                <td>5</td>
                                <td><a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> <a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="{{route('dokter.pemeriksaanDataUKGS')}}">Periksa  <i class="mdi mdi-tooth"></i></a></td>
                            </tr>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- end of tabel data --}}
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

$(function(){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
    $('#kelurahan').on('change', function() {
        
        $.ajax({
            url: '{{ route('dokter.sekolahUKGS') }}',
            method: 'POST',
            data : {id: $(this).val()},

            

            success:function(response){
                
                $('#sekolah').empty();

                $.each(response, function (id, name) {
                    $('#sekolah').append(new Option(name, id))
                })
            }
            
        })
        
    });
});

$(function(){
    
    $('#sekolah').on('change', function() {
        alert(1);
        
        $.ajax({
            url: '{{ route('dokter.kelasUKGS') }}',
            method: 'POST',
            data : {id: $(this).val()},

            

            success:function(response){
                
                $('#kelas').empty();

                $.each(response, function (id, name) {
                    $('#kelas').append(new Option(name, id))
                })
            }
            
        })
        
    });
});







</script>



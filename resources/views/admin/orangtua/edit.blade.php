@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tambah Orangtua</h6>
                <form action="{{ route('orangtua.update', $orangtua->id) }}" class="forms-sample" id="orangtua-store"
                    method="post" nctype="multipart/form-data" files=true>
                    <input type="hidden" id="id" value="{{$orangtua->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{$orangtua->user->email}}">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch mb-2">
                            <input type="checkbox" class="form-check-input" id="chk" type="reset" value="Reset">
                            <label class="form-check-label" id="labelchk" for="formSwitch1">Tidak mengubah
                                Password</label>
                        </div>
                    </div>
                    <div id="ubah_password">

                    </div>

                    <!-- <div class="form-check mb-2" id="show_password">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                Show Password
                            </label>
                        </div> -->


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                            placeholder="Nama" value="{{$orangtua->nama}}">
                    </div>
                    <div class="row col-md-10">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tempat
                                    Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    autocomplete="off" placeholder="Tempat Lahir" value="{{$orangtua->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal
                                    Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    autocomplete="off" placeholder="masukkan tanggal lahir" value="{{$orangtua->tanggal_lahir}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select class="form-select" name="id_kecamatan" id="id_kecamatan" data-width="100%">
                            <option class="mb-2" value=" ">---Pilih Kecamatan---</option>
                            @foreach(\App\Models\Kecamatan::orderBy('nama','asc')->get() as
                            $value => $key)

                            <option value="{{$key->id}}" {{$key->id == $orangtua->id_kecamatan ? 'selected' : ''}}>
                                {{$key->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelurahan</label>
                        <select class="form-select" name="id_kelurahan" id="kelurahan" data-width="100%">
                            <option class="mb-2" value=" ">---Pilih Kelurahan---</option>
                            @foreach(\App\Models\Kelurahan::orderBy('nama','asc')->get() as
                            $value => $key)

                            <option value="{{$key->id}}" {{$key->id == $orangtua->id_kelurahan ? 'selected' : ''}}>
                                {{$key->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off"
                            placeholder="alamat" value="{{$orangtua->alamat}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan</label>
                        <select class="form-select" name="pendidikan" id="pendidikan" data-width="100%" required>
                            <option selected disabled>Pilih Pendidikan</option>
                            <option value="SD" {{$orangtua->pendidikan=="SD" ? 'selected' : ''}}>SD</option>
                            <option value="SMP" {{$orangtua->pendidikan=="SMP" ? 'selected' : ''}}>SMP</option>
                            <option value="SMA" {{$orangtua->pendidikan=="SMA" ? 'selected' : ''}}>SMA/SMK</option>
                            <option value="D1" {{$orangtua->pendidikan=="D1" ? 'selected' : ''}}>D1</option>
                            <option value="D2" {{$orangtua->pendidikan=="D2" ? 'selected' : ''}}>D2</option>
                            <option value="D3" {{$orangtua->pendidikan=="D3" ? 'selected' : ''}}>D3</option>
                            <option value="D4" {{$orangtua->pendidikan=="D4" ? 'selected' : ''}}>D4</option>
                            <option value="S1" {{$orangtua->pendidikan=="S1" ? 'selected' : ''}}>S1</option>
                            <option value="S2" {{$orangtua->pendidikan=="S2" ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{$orangtua->pendidikan=="S3" ? 'selected' : ''}}>S3</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{URL::previous()}}" type="button" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampleCheck1').click(function () {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
        $('#show_password').hide();
        $('#chk').on('change', function () {
            if ($(this).is(':checked')) {
                var html = `<div class="mb-3" id="pss">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                value="" placeholder="Password">
                        </div>`
                $('#ubah_password').append(html);
                $('#show_password').show();

                $('#labelchk').text('Ubah Password');



            } else {

                $('#show_password').hide();
                $('#pss').remove();
                $('#labelchk').text('Tidak mengubah password');
            }
        });

    });

</script>
@endpush

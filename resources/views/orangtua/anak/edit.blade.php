@extends('layout.master')

@section('title') Edit Anak @endsection
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Anak</h6>
                <form action="{{ route('orangtua-anak.update',$anak->id) }}" class="forms-sample" method="post" nctype="multipart/form-data" files=true >
                    <input type="hidden" id="id" value="{{$anak->id}}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="{{$anak->nama}}"
                            placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label class="col-md-12 mb-2"> Jenis Kelamin </label>
                        <div class="form-check form-check-inline">
                            
                            <input type="radio" class="form-check-input" value="laki-laki" name="jenis_kelamin"
                                id="radioInline" {{ ($anak->jenis_kelamin=="laki-laki")? "checked" : "" }} >
                                
                            <label class="form-check-label" for="radioInline">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" value="perempuan" class="form-check-input" name="jenis_kelamin"
                                id="radioInline1" {{ ($anak->jenis_kelamin=="perempuan")? "checked" : "" }}>
                            <label class="form-check-label" for="radioInline1">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="row col-md-10">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    autocomplete="off" placeholder="Tempat Lahir" value="{{$anak->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    autocomplete="off" placeholder="masukkan tanggal lahir" value="{{$anak->tanggal_lahir}}">
                            </div>
                        </div>
                    </div>
                    

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{URL::previous()}}" type="button" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
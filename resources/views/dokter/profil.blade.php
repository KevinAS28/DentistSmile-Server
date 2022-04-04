@extends('layout.master')

@section('content')
<style>
    profile-photo .img {
        position: absolute;
        width: 111.34px;
        height: 100px;
        left: 24px;
        top: 179px;
    }

    .text-p {
        position: relative;
        padding: 5px;
        left: 130px;
    }

</style>
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="" class="forms-horizontal" id="" method="post" nctype="multipart/form-data" files=true>
                    @csrf
                    <div class="form-group">

                        {{-- foto profil --}}
                        <div class="position-relative">
                            <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                                <img src="https://via.placeholder.com/1560x370" class="rounded-top" alt="profile cover">
                            </figure>
                            <div
                                class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                                <div class="profil-photo">
                                    <img class="wd-100 mt-3 rounded-square" src="https://via.placeholder.com/100x100"
                                        alt="profile">
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-icon-text">
                                        <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Tag nama --}}
                        <div class="text-p">
                            <span class="h4 text-dark">drg. Dhinintya Hyta Narissi</span>
                            <br>
                            <span class="h9 text-facebook">3422100116179051</span>
                        </div>

                        {{-- form profil --}}
                        <div class="mt-5">
                            <form class="forms-sample mt-5">
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempattanggallahir" class="col-sm-3 col-form-label">Tempat Tanggal
                                        Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempattanggallahir"
                                            autocomplete="off" placeholder="Tempat Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nik"
                                            placeholder="Nomor Induk Kependudukan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jenis-kelamin" class="col-sm-3 col-form-label">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single form-select" name="jenis-kelamin"
                                            data-width="100%">
                                            <option value="TX">Laki-Laki</option>
                                            <option value="NY">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nohp" class="col-sm-3 col-form-label">No Hp</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nohp"
                                            placeholder="Nomor Handphone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nostr" class="col-sm-3 col-form-label">No STR</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nostr"
                                            placeholder="No STR">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

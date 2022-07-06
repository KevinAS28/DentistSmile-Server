@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Anak</h6>
                <form action="{{ route('anak.update',$anak->id) }}" class="forms-sample" id="dokter-update" method="post" nctype="multipart/form-data" files=true >
                    <input type="hidden" id="id" value="{{$anak->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Orangtua</label>
                        <select class="js-example-basic-single form-select" name="orangtua" data-width="100%">
                            @foreach(\App\Models\Orangtua::get() as $value => $key)
                      
                            <option value="{{$key->id}}">{{$key->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="{{$anak->nama}}"
                            placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label class="col-md-12 mb-2"> Jenis Kelamin </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="laki-laki" name="jenis_kelamin"
                                id="radioInline" {{ ($anak->jenis_kelamin=="laki-laki")? "checked" : "" }}>
                            <label class="form-check-label" for="radioInline">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" value="perempuan" class="form-check-input" name="jenis_kelamin"
                                id="radioInline1"  {{ ($anak->jenis_kelamin=="perempuan")? "checked" : "" }}>
                            <label class="form-check-label" for="radioInline1">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="row col-md-10">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tempat
                                    Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    autocomplete="off" placeholder="Tempat Lahir" value="{{$anak->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal
                                    Lahir</label>
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

@push('after-script')


{{-- <script type="text/javascript">
    $(document).ready(function () {
        /* save data */
        $('#dokter-store').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                'type': 'POST',
                'url': "{{ route('dokter.store') }}",
                'data': new FormData(this),
                'processData': false,
                'contentType': false,
                'dataType': 'JSON',
                'success': function (data) {
                    if (data.success) {
                        window.location.href = "/dokter"
                    } else {
                        for (var count = 0; count < data.errors.length; count++) {
                            swal(data.errors[count], {
                                icon: "error",
                                timer: false,
                            });
                        }
                    }
                },

            });
        });
    });

</script> --}}
@endpush

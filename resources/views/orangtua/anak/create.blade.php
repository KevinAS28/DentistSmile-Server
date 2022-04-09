@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tambah Orangtua</h6>
                <form action="{{ route('tambahanak.store') }}" class="forms-sample" id="anak-store" method="post"
                    nctype="multipart/form-data" files=true>
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                            placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            autocomplete="off" placeholder="masukkan tanggal lahir">
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="kecamatan" id="">
                            @foreach(\App\Models\Sekolah::get() as $value => $key)
                            <option class="mb-2" value="{{$key->id}}">{{$key->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch mb-2">
                            <input type="checkbox" class="form-check-input" id="chk">
                            <label class="form-check-label" id="labelChk" for="formSwitch1">Belum Sekolah</label>
                        </div>
                    </div>
                    <div id="kelas" class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Kelas</label>
                        <input type="text" class="form-control"  name="kelas" autocomplete="off"
                            placeholder="masukkan kelas">
                    </div>
                    <div id="sekolah" class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Sekolah</label>
                        <input type="text" class="form-control"  name="kelas" autocomplete="off"
                            placeholder="masukkan kelas">
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#sekolah').hide();
        $('#chk') .on('change', function () {
            if ($(this).is(':checked')) {
                $('#kelas').hide();
                $('#sekolah').show();
            } else {
                $('#kelas').show();
                $('#sekolah').hide();
            }
        });
       

    });

</script>
@endpush

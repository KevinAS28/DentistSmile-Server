@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Rekap Data Pasien</a></li>
        <li class="breadcrumb-item active" aria-current="page">UKGS</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body">
        <h6 class="card-title">REKAP DATA PER WILAYAH</h6>
        <p class="text-muted mb-3">Masukkan wilayah yang ingin ditampilkan datanya</p>
        <form class="forms-sample">
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Wilayah Kelurahan</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Kelurahan</option>
                            <option>12-18</option>
                            <option>18-22</option>
                            <option>22-30</option>
                            <option>30-60</option>
                            <option>Above 60</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sekolah</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="option-data-sekolah">
                            <option selected disabled>Pilih Sekolah</option>
                            <option>Sekolah</option>
                            <option>18-22</option>
                            <option>22-30</option>
                            <option>30-60</option>
                            <option>Above 60</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Kelas</option>
                            <option>12-18</option>
                            <option>18-22</option>
                            <option>22-30</option>
                            <option>30-60</option>
                            <option>Above 60</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="nama-sekolah">
                <div class="card border-primary">
                    <div class="card-body">
                        <div class="row">
                            <p class="card-title">SDN Pulo 07 (Jl. Brawijaya XII)</p>
                        </div>
                        <table class="table-sm table-borderless">
                            <tr>
                                <td>Jumlah Siswa</td>
                                <td>:</td>
                                <td>Jumlah laki-laki</td>
                                <td>88</td>
                                <td>Nama Guru UKS</td>
                                <td>:</td>
                                <td>Sukardi, S.Pd.</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Jumlah perempuan</td>
                                <td>86</td>
                                <td>Nama Dokter Kecil</td>
                                <td>:</td>
                                <td>Reina S</td>
                            </tr>
                            <tr>
                                <td>Jumlah Siswa Sudah Diskrining</td>
                                <td>:</td>
                                <td>Jumlah laki-laki</td>
                                <td>85</td>
                                <td></td>
                                <td></td>
                                <td>Daffa Ajira</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Jumlah perempuan</td>
                                <td>86</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <p class="text-muted mb-3">Berikut merupakan tabel pasien gigi di</p>
        <div class="table-responsive mt-2">
            <table id="dataTableExample" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>NAMA SEKOLAH</th>
                        <th>KELAS</th>
                        <th>STATUS SKRINING</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>5</td>
                        <td>2011/04/25</td>
                        <td><a class="btn btn-primary btn-icon-text btn-xs" href="{{route('dokter.rekapDetailUKGS')}}" role="button">Lihat Rekap<i class="btn-icon-append" data-feather="book-open"></i></a> <a class="btn btn-info btn-icon btn-xs text-white" href="#" role="button"><i class="mdi mdi-tooth"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>   
    </div>
</div>
@endsection

@push('after-script')

<script  type="text/javascript"> 
var tableData;

$(document).ready(function () {
        tableData = $('#table-dokter').DataTable({
            processing: true,
			serverSide: true,
            responsive: true,
            language: {
                search: "INPUT",
                searchPlaceholder: "Cari"
            },
			"searching": true,
            "bPaginate": true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: "{{ url('admin/table/data-dokter') }}",
                type: "GET",
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false
                },
				{
					data: 'DT_RowIndex', name:'DT_RowIndex', visible:true
				},

                {
                    data: 'nik',
                    name: 'nik',
                    visible: true
                },
                {
                    data: 'nama',
                    name: 'nama',
                    visible: true
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                    visible: true
                },
                 { data: 'action', name:'action', visible:true},

            ],

        });
        $('#table-dokter tbody').on( 'click', '#btn-delete', function () {
        var data = tableData.row( $(this).parents('tr') ).data();
       Swal.fire({
            title: 'Harap Konfirmasi',
            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((willDelete) => {
          if (willDelete.isConfirmed) {
            $.ajax({
              url: "{{ url('delete/dokter') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableData.ajax.reload();
                Swal.fire(
                'Hapus',
                  'Data Berhasil di hapus.',
                 'success'
                 )
              }

            });
          }
        });
      });


})
</script>
@endpush
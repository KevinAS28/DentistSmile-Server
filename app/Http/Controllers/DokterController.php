<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Anak;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PemeriksaanFisik;
use App\Models\PemeriksaanMata;
use App\Models\PemeriksaanTelinga;
use App\Models\PemeriksaanGigi;
use Carbon\Carbon;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // HALAMAN ADMIN UNTUK DOKTER

    // function untuk menampilkan data data akun dokter yang terdaftar DI HALAMAN ADMIN
    public function data(){
        $dokter = Dokter::all();
        return datatables()->of($dokter)
        ->addColumn('action', function($row){
            $btn = '<div class="btn-group btn-group-sm">';
            $btn .= '<a href="'.route('dokter.edit',$row->id).'" type="button" id="btn-edit" class="btn btn-warning btn-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $btn .= '<button title="Delete" id="btn-delete" class="delete-modal btn btn-danger btn-icon"><i class="fa fa-trash " ></i></button>';

            $btn .= '</div>';
            return $btn;
        })
        ->rawColumns(['action'])->addIndexColumn()->make(true);
    }

    // function untuk menampilkan halaman index akun dokter DI HALAMAN ADMIN
    public function index()
    {

        return view('admin.dokter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function untuk menampilkan halaman create akun dokter DI HALAMAN ADMIN
    public function create()
    {
        return view('admin.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  FUNCTION UNTUK MENDAFTARKAN AKUN DOKTER DI HALAMAN ADMIN
    public function store(Request $request)
    {
        $messages = [
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK tidak boleh sama.',
            'nik.min' => 'NIK harus 16 digit.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 3 huruf.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
            'Tempat_lahir.required' => 'Tempat lahir harus diisi',
            'Tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terpakai.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 4 karaketer.',
            'no_telp.required' => 'No telepon wajib diisi.',

            'no_str.required' => 'No Str wajib diisi',

        ];
        $validator = $request->validate([
            'nik' => ['required', 'min:16',
                        Rule::unique('dokter', 'NIK')],
            'nama' => 'required',
            'email' => ['required', 'email',
                        Rule::unique('users', 'email')],
            'password' => 'required',
            'no_telp' => 'required',

            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_str' => 'required',

        ], $messages);
        DB::beginTransaction();


        try{
        $user = New User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role ="dokter";
        $user->save();

            $dokter = new Dokter();
            $dokter->id_users=$user->id;
            $dokter->id_kecamatan = $request->kecamatan;
            $dokter->nik = $request->nik;
            $dokter->nama = $request->nama;
            $dokter->jenis_kelamin = $request->jenis_kelamin;
            $dokter->tempat_lahir = $request->tempat_lahir;
            $dokter->tanggal_lahir = $request->tanggal_lahir;
            $dokter->no_telp = $request->no_telp;
            $dokter->no_str= $request->no_str;
            $dokter->save();


            DB::commit();
            return redirect()->route('dokter.index');

        }catch(\Exception $e){
        DB::rollback();
        return redirect()->route('dokter.create')->with('error',$messages);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::find($id);

        return view('admin.dokter.edit',compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // function untuk mengupdate data akun dokter yang terdaftar di HALAMAN ADMIN
    public function update(Request $request, $id)
    {
        $dokter = Dokter::find($id);
        if(!empty($request->password)){
            $user = User::where('id', $dokter->id_users)->update([

                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => "dokter"
            ]);
        }else{
            $user = User::where('id', $dokter->id_users)->update([

                'email' => $request->email,
                'role' => "dokter"
            ]);
        }



        if($user){
            $dokter = $dokter->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'no_str' => $request->no_str

            ]);
            return redirect()->route('dokter.index');

        }

    }

    // function untuk menghapus data dokter dihalaman dokter
    public function destroy($id)
    {

        $dokter = Dokter::find($id);
        $dokter ->delete();
        return response()->json(['data'=>'success delete data']);
    }



    // -------- HALAMAN DOKTER --------------

    // function untuk menampilkan dashboard pada HALAMAN DOKTER
    public function viewDashboard()
    {
        return view('dokter.dashboard');
    }

    // function untuk menampilkan halaman profil pada HALAMAN DOKTER
    public function profil()
    {
        return view('dokter.profil');
    }
    // function untuk menampilkan halaman ubah profil pada HALAMAN DOKTER
    public function profil_edit($id)
    {
        $logdokter = Auth::user()->dokter;
        $dokter = $logdokter->find($id);
        return view('dokter.profil-edit',compact('dokter'));
    }

    // function untuk mengupdate data profil pada HALAMAN DOKTER
    public function profil_update(Request $request, $id)
    {

        $logdokter = Auth::user()->dokter;
        $dokter = $logdokter->find($id);
        $dokter->nik = $request->nik;
        $dokter->nama =$request->nama;
        $dokter->jenis_kelamin = $request->jenis_kelamin;
        $dokter->tempat_lahir=  $request->tempat_lahir;
        $dokter->tanggal_lahir= $request->tanggal_lahir;
        $dokter->no_telp = $request->no_telp;
        $dokter->no_str= $request->no_str;
        if($request->hasfile('avatar'))
        {
            $destination = 'dokter/avatar/'.$dokter->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('dokter/avatar/', $filename);
            $dokter->avatar = $filename;
        }
        if($request->hasfile('header'))
        {
            $destination = 'dokter/header/'.$dokter->header;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('header');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('dokter/header/', $filename);
            $dokter->header = $filename;
        }


        $dokter->save();
        return redirect()->route('dokter.profil');

    }

    // function untuk menampilkan halaman riwayat pemeriksaan pada HALAMAN DOKTER
    public function pemeriksaan_ukgs(){
        //$kelurahan = Kelurahan::all();
        $user = Auth::user();
        $dokter = Dokter::Where('id_users', Auth::user()->id)->value('id_kecamatan');
        $kelurahan = Kelurahan::where('id_kecamatan', $dokter)->pluck('nama','id');
        $sekolah = Sekolah::pluck('nama','id');
        //$sekolah   = Sekolah::all();
        return view('dokter.pemeriksaanData.ukgs',[
            'kelurahan' => $kelurahan, 'sekolah '=> $sekolah,
        ]);
    }
    

    

    

    public function pemeriksaan_data_ukgs(){
        // $data = PemeriksaanGigi::findOrFail($id);
        $odontograms = [
            'b1k1' => ['p18','p17','p16','p15','p14','p13','p12','p11'],
            'b2k1' => ['p55','p54','p53','p52','p51'],
            'b3k1' => ['p85','p84','p83','p82','p81'],
            'b4k1' => ['p48','p47','p46','45','p44','p43','p42','p41'],
            'b1k2' => ['p21','p22','p23','p24','p25','p26','p27','p28'],
            'b2k2' => ['p61','p62','p63','p64','p65'],
            'b3k2' => ['p71','p72','p73','p74','p75'],
            'b4k2' => ['p31','p32','p33','p34','p35','p36','p37','p38']
        ];
        return view ('dokter.pemeriksaanData.pemeriksaanDataUKGS',compact('odontograms'));
    }

    public function pemeriksaan_data_ukgm(){
        // $data = PemeriksaanGigi::findOrFail($id);
        $odontograms = [
            'b1k1' => ['p18','p17','p16','p15','p14','p13','p12','p11'],
            'b2k1' => ['p55','p54','p53','p52','p51'],
            'b3k1' => ['p85','p84','p83','p82','p81'],
            'b4k1' => ['p48','p47','p46','45','p44','p43','p42','p41'],
            'b1k2' => ['p21','p22','p23','p24','p25','p26','p27','p28'],
            'b2k2' => ['p61','p62','p63','p64','p65'],
            'b3k2' => ['p71','p72','p73','p74','p75'],
            'b4k2' => ['p31','p32','p33','p34','p35','p36','p37','p38']
        ];
        return view ('dokter.pemeriksaanData.pemeriksaanDataUKGM',compact('odontograms'));
    }
    public function rekap_ukgs(){
        $dokter = Dokter::Where('id_users', Auth::user()->id)->value('id_kecamatan');
        $kelurahan = Kelurahan::where('id_kecamatan', $dokter)->pluck('nama','id');
        $sekolah = Sekolah::pluck('nama','id');
        return view('dokter.rekapData.ukgs', compact('dokter', 'kelurahan', 'sekolah'));
    }

    public function rekap_ukgm(){
        return view('dokter.rekapData.ukgm');
    }
    public function rekap_detail_ukgs(){
        return view ('dokter.rekapData.rekapDataUKGS');
    }

    public function rekap_detail_ukgs_id($id){
        $anak = Anak::with('sekolah','kelas')->find($id);
        $pemeriksaanFisik = PemeriksaanFisik::where('id_anak', $id)->orderBy('waktu_pemeriksaan', 'desc')->first();
        $pemeriksaanMata = PemeriksaanMata::where('id_anak', $id)->orderBy('waktu_pemeriksaan', 'desc')->first();
        $pemeriksaanTelinga = PemeriksaanTelinga::where('id_anak', $id)->orderBy('waktu_pemeriksaan', 'desc')->first();
        $pemeriksaanGigi = PemeriksaanGigi::where('id_anak', $id)->orderBy('waktu_pemeriksaan', 'desc')->first();
        return view ('dokter.rekapData.rekapDataUKGSID', compact('anak', 'pemeriksaanFisik', 'pemeriksaanMata', 'pemeriksaanTelinga', 'pemeriksaanGigi'));
    }

    public function rekap_detail_ukgm(){
        return view ('dokter.rekapData.rekapDataUKGM');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // function untuk menampilkan list list kelurahan
    public function listKelurahan(){
        $user = Auth::user();
        $dokter = Dokter::Where('id_users', Auth::user()->id)->value('id_kecamatan');
        $kelurahan = Kelurahan::where('id_kecamatan', $dokter)->get();
        return view('dokter.pemeriksaanData.ukgs',compact('kelurahan'));
        
    }

    // function untuk menampilkan list anak yang telah melakukan pemeriksaanfisik berdasarkan id kelas
    public function listAnak(Request $request){
        $pemeriksaanfisik = PemeriksaanFisik::with('anak')->where('id_kelas',$request->id_kelas)->orderBy('id', 'DESC')->latest();
        
        return datatables()->of($pemeriksaanfisik)
        ->addColumn('action', function($row){
            $btn = '';
            $btn .= '<a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> ';
            $btn .= '<a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="'.route('dokter.pemeriksaanDataUKGS').'">Periksa  <i class="mdi mdi-tooth"></i></a>';


            return $btn;
        })

        ->addColumn('tanggal', function($pemeriksaanfisik){
            return $tanggal = date('d-m-Y', strtotime($pemeriksaanfisik->waktu_pemeriksaan));
        })
        ->addColumn('waktu', function($pemeriksaanfisik){
            return $waktu = date('H:i', strtotime($pemeriksaanfisik->waktu_pemeriksaan));
        })
        ->addColumn('nama', function($pemeriksaanfisik){
            return $pemeriksaanfisik->anak->nama;
        })
        ->addColumn('kelas', function($pemeriksaanfisik){
            return $pemeriksaanfisik->kelas->kelas;
        })
        ->addColumn('sekolah', function($pemeriksaanfisik){
            return $pemeriksaanfisik->kelas->sekolah->nama;
        })
        ->addColumn('jenis_kelamin', function($pemeriksaanfisik){
            return $pemeriksaanfisik->anak->jenis_kelamin;
        })
        ->addIndexColumn()
       ->make(true);

    }

    // function untuk menampilkan list anak berdasarkan id kelas
    public function listAnakRekap(Request $request){
        $anak = DB::table('anak')
        ->leftJoin('sekolah', 'sekolah.id', '=', 'anak.id_sekolah')
        ->leftJoin('kelas', 'kelas.id', '=', 'anak.id_kelas')
        ->leftJoin(DB::raw('(SELECT
            id_anak,
            max(waktu_pemeriksaan) as waktu_pemeriksaan
            FROM pemeriksaan_fisik GROUP BY id_anak) pf'),
            function($join)
            {
            $join->on('anak.id', '=', 'pf.id_anak');
            })
        ->select('anak.id', 'anak.nama', 'anak.jenis_kelamin', 'sekolah.nama as sekolah', 'kelas.kelas', 'pf.waktu_pemeriksaan')
        ->get();

        return datatables()->of($anak)
        ->addColumn('action', function($row){
            $btn = '';
            $btn .= '<a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data" href="'.route('dokter.rekapDetailUKGSID', $row->id).'">Lihat Rekap <i class="mdi mdi-book-open-page-variant"></i></a> ';
            $btn .= '<a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="'.route('dokter.pemeriksaanDataUKGS').'"><i class="mdi mdi-tooth"></i></a>';

            return $btn;
        })
        ->addColumn('skrining', function($anak){
            if($anak->waktu_pemeriksaan==null)
                return "Belum";
            else
                return "Sudah (".date('d/m/Y', strtotime($anak->waktu_pemeriksaan)).")";
        })
        ->addIndexColumn()
        ->make(true);

    }

    //----------UKGM--------------//
    public function pemeriksaan_ukgm(){

        $user = Auth::user();
        $dokter = Dokter::Where('id_users', Auth::user()->id)->value('id_kecamatan');
        $kelurahan = Kelurahan::where('id_kecamatan', $dokter)->pluck('nama','id');
        $sekolah = Sekolah::pluck('nama','id');
        //$sekolah   = Sekolah::all();
        return view('dokter.pemeriksaanData.ukgm',[
            'kelurahan' => $kelurahan, 'sekolah '=> $sekolah,
        ]);
        
    }

    public function listAnakUkgm(Request $request){


        $pemeriksaanGigi = PemeriksaanGigi::with('anak')->where('id_sekolah',$request->id_sekolah)->orderBy('id', 'DESC')-> latest();
        
        return datatables()->of($pemeriksaanGigi)
        ->addColumn('action', function($row){
            $btn = '';
            $btn .= '<a type="button" class="btn btn-primary btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Rekap Data"><i class="mdi mdi-book-open-page-variant"></i></a> ';
            $btn .= '<a type="button" class="btn btn-info btn-xs text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Periksa" href="'.route('dokter.pemeriksaanDataUKGM',$row->id).'">Periksa  <i class="mdi mdi-tooth"></i></a>';
            
            
            return $btn;
        })
        
        ->addColumn('tanggal', function($pemeriksaanGigi){
            return $tanggal = date('d-m-Y', strtotime($pemeriksaanGigi->waktu_pemeriksaan));
        })
        ->addColumn('waktu', function($pemeriksaanGigi){
            return $waktu = date('H:i', strtotime($pemeriksaanGigi->waktu_pemeriksaan));
        })
        ->addColumn('nama', function($pemeriksaanGigi){
            return $pemeriksaanGigi->anak->nama;
        })

        ->addColumn('posyandu', function($pemeriksaanGigi){
            return $pemeriksaanGigi->sekolah->nama;
        })
        ->addColumn('jenis_kelamin', function($pemeriksaanGigi){
            return $pemeriksaanGigi->anak->jenis_kelamin;
        })
        ->addColumn('umur', function($pemeriksaanGigi){
            $born=Carbon::parse($pemeriksaanGigi->anak->tanggal_lahir);
            $age = $born->diff(Carbon::now())
            ->format('%y tahun %m bulan ');

            return $age;
        })

        ->addIndexColumn()
       ->make(true);
        
    }
    public function pemeriksaan_data_ukgm($id)
    {
        $ukgm=PemeriksaanGigi::with('resikoKaries')->find($id);
        return view('dokter.pemeriksaanData.pemeriksaanDataUKGM',compact('ukgm'));
    }

    //------ Dashboard ----------//
    public function dashboard(){
        
    }
    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaanFisik;
use App\Models\PemeriksaanMata;
use App\Models\PemeriksaanTelinga;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\Anak;
use App\Models\Sekolah;
use App\Models\Kelas;
use Auth;
use Carbon\Carbon;

//----------------- HALAMAN ORANGTUA-----------------//

class PemeriksaanFisikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // menambah data pemeriksaan fisik diHALAMAN ORANGTUA
    public function create()
    {
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();  //mendapatkan list anak berdasarkan id orangtua yang login
        
        return view('orangtua.pemeriksaan.create',compact('anak'));
    }
    public function listAnak($anak){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
          //mendapatkan list anak berdasarkan id orangtua yang login
        $kelas = Kelas::Where('id_sekolah',$anak)->get();
        return response()->json($kelas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();

        $waktu_pemeriksaan = Carbon::now(); //mendapatkan waktu sekarang

        $pFisik = new PemeriksaanFisik();
        $pFisik->id_anak =  $request->anak;
        $pFisik->tinggi_badan = $request->tinggi_badan;
        $pFisik->berat_badan = $request->berat_badan;
        if($request->tinggi_badan > 0 && $request->berat_badan > 0){
            $pFisik->imt = $request->berat_badan/((($request->tinggi_badan)/100)*(($request->tinggi_badan)/100)); // perhitungan IMT
        }
        $pFisik->sistole = $request->sistole;
        $pFisik->diastole = $request->diastole;
        $pFisik->waktu_pemeriksaan = $waktu_pemeriksaan;
        $pFisik->save(); // MENYIMPAN PEMERIKSAAN FISIK
        $pMata = new PemeriksaanMata();
        $pMata->id_anak =  $request->anak;
        $pMata->soal1=$request->soal1; // menyimpan jawaban soal mata
        $pMata->soal2=$request->soal2; // menyimpan jawaban soal mata
        $pMata->soal3=$request->soal3; // menyimpan jawaban soal mata
        $pMata->soal4=$request->soal4; // menyimpan jawaban soal mata
        $pMata->soal5=$request->soal5; // menyimpan jawaban soal mata
        $pMata->soal6=$request->soal6; // menyimpan jawaban soal mata
        $pMata->waktu_pemeriksaan=$waktu_pemeriksaan;
        $pMata->save(); // MENYIMPAN PEMERIKSAAN MATA
        $pTelinga = new PemeriksaanTelinga();
        $pTelinga->id_anak =  $request->anak;
        $pTelinga->soal1=$request->soal1;
        $pTelinga->soal2=$request->soal2;
        $pTelinga->soal3=$request->soal3;
        $pTelinga->soal4=$request->soal4;
        $pTelinga->soal5=$request->soal5;
        $pTelinga->soal6=$request->soal6;
        $pTelinga->soal7=$request->soal7;
        $pTelinga->waktu_pemeriksaan=$waktu_pemeriksaan;
        $pTelinga->save(); // MENYIMPAN PEMERIKSAAN TELINGA


        return redirect()->route('viewDashboard.orangtua');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ----------- HALAMAN ORANGTUA - > RIWAYAT --------------//
    public function riwayat(){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
        return view('orangtua.pemeriksaan.riwayat',compact('anak'));
    }

    // ----------- HALAMAN ORANGTUA - > RIWAYAT -> RIWAYAT FISIK --------------//
    public function riwayatfisik(Request $request){
        // MENAMPILKAN DATA PEMERIKSAAN FISIK
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');  // MENDAPATKAN ID ORANGTUA
        $anak = Anak::Where('id_orangtua',$orangtua)->get(); // MENDAPATKAN LIST ANAK BERDASARKAN ID ORANGTUA
        if(!empty($request->anak)){ 
        $pemeriksaanFisik = PemeriksaanFisik::Where('id_anak',$request->anak)->get(); // MENDAPATKAN LIST PEMERIKSAAN FISIK BERDASARKAN ID ANAK
       }else{
        $pemeriksaanFisik = PemeriksaanFisik::where(''); // MENDAPATKAN LIST PEMERIKSAAN FISIK
        }
        return datatables()->of($pemeriksaanFisik)
        ->addColumn('imt', function($pemeriksaanFisik){
            if($pemeriksaanFisik->imt < 18.5){
                $data= 'Kurus';
            }else if($pemeriksaanFisik->imt >= 18.5 && $pemeriksaanFisik->imt <= 25.0){
                $data = 'Ideal';
            }else if($pemeriksaanFisik->imt >= 25.1 && $pemeriksaanFisik->imt <= 29.9){
                $data = 'Gemuk';
            }else{
                $data = 'Obesitas';
            }
            return $data;
        })
        ->addColumn('tanggal', function($pemeriksaanFisik){
            return $tanggal = date('d-m-Y', strtotime($pemeriksaanFisik->waktu_pemeriksaan));
        })
        ->addColumn('jam', function($pemeriksaanFisik){
            return $jam = date('H:i', strtotime($pemeriksaanFisik->waktu_pemeriksaan));
        })
       ->addIndexColumn()
       ->make(true);
       
    }

    public function riwayatmata(Request $request){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
        if(!empty($request->anak)){
            $pemeriksaanMata = PemeriksaanMata::Where('id_anak',$request->anak)->get(); // mendatkan data pemeriksaan mata berdarkan request anak
           }
            return datatables()->of($pemeriksaanMata)
            ->addColumn('tanggal', function($pemeriksaanMata){
               return $tanggal = date('d-m-Y', strtotime($pemeriksaanMata->created_at));
                
            })
            ->addColumn('jam',function($pemeriksaanMata){
                return $jam = date('H:i', strtotime($pemeriksaanMata->created_at));
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function riwayattelinga(Request $request){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
        if(!empty($request->anak)){
            $pemeriksaanTelinga = PemeriksaanTelinga::Where('id_anak',$request->anak)->get();
           }else{
            $pemeriksaanTelinga = PemeriksaanTelinga::all();
            }
            return datatables()->of($pemeriksaanTelinga)
            ->addColumn('tanggal', function($pemeriksaanTelinga){
               return $tanggal = date('d-m-Y', strtotime($pemeriksaanTelinga->created_at));
                
            })
            ->addColumn('jam',function($pemeriksaanTelinga){
                return $jam = date('H:i', strtotime($pemeriksaanTelinga->created_at));
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function riwayatgigi(){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
        $pemeriksaanGigi = PemeriksaanGigi::Where('id_anak',$anak)->get();
        return view('orangtua.pemeriksaan.riwayatgigi',compact('anak','pemeriksaanGigi'));
    }

}

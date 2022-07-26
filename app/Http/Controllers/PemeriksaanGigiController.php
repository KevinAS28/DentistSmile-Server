<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanGigi;
use Illuminate\Http\Request;
use File;
use Auth;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\Anak;
use App\Models\Kelurahan;
use App\Models\ResikoKaries;
use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Notification;

class PemeriksaanGigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();
        $kelurahan=Kelurahan::all()->pluck('nama','id');
        return view('orangtua.pemeriksaan.pemeriksaanGigi',compact('anak','kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [

            'gambar1.required' => 'Gambar 1 wajib diisi.',
            'gambar2.required' => 'Gambar 2 wajib diisi.',
            'gambar3.required' => 'Gambar 3 wajib diisi.',


        ];
        $validator = $request->validate([
            'gambar1' => 'required',
            'gambar2' => 'required',
            'gambar3' => 'required'


        ], $messages);
        $waktu_pemeriksaan = Carbon::now();

        $pgigi = new PemeriksaanGigi();
        $pgigi->id_anak = $request->anak;
        $pgigi->id_sekolah= $request->id_sekolah ?: $request->id_posyandu;
        $pgigi->id_kelas = $request->kelas;
        $pgigi->waktu_pemeriksaan = $waktu_pemeriksaan;
        if(!empty($request->gambar1)){
             $file = $request->file('gambar1');
             $extension = strtolower($file->getClientOriginalExtension());
             $filename1 = uniqid() . '.' . $extension;

            Storage::put('public/gigi/' . $filename1, File::get($file));
            $pgigi->gambar1=$filename1;
        }
        if(!empty($request->gambar2)){
            $file = $request->file('gambar2');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename2 = uniqid() . '.' . $extension;

           Storage::put('public/gigi/' . $filename2, File::get($file));
           $pgigi->gambar2=$filename2;
       }
       if(!empty($request->gambar3)){
        $file = $request->file('gambar3');
        $extension = strtolower($file->getClientOriginalExtension());
        $filename3 = uniqid() . '.' . $extension;

       Storage::put('public/gigi/' . $filename3, File::get($file));
       $pgigi->gambar3=$filename3;
        }
        if(!empty($request->gambar4)){
            $file = $request->file('gambar4');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename4 = uniqid() . '.' . $extension;

           Storage::put('public/gigi/' . $filename4, File::get($file));
           $pgigi->gambar4=$filename4;
        }
        if(!empty($request->gambar5)){
            $file = $request->file('gambar5');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename5 = uniqid() . '.' . $extension;

           Storage::put('public/gigi/' . $filename5, File::get($file));
           $pgigi->gambar5=$filename5;
        }

        $pgigi->gsoal1= $request->gsoal1;
        $pgigi->gsoal2= $request->gsoal2;

        $pgigi->save();

        // rk = resiko karies
        if($pgigi->id_kelas==NULL){
        $rk= new ResikoKaries();
        $rk->id_pemeriksaan_gigi=$pgigi->id;
        $rk->rksoal1=$request->rksoal1;
        $rk->rksoal2=$request->rksoal2;
        $rk->rksoal3=$request->rksoal3;
        $rk->rksoal4=$request->rksoal4;
        $rk->rksoal5=$request->rksoal5;
        $rk->rksoal6=$request->rksoal6;
        $rk->rksoal7=$request->rksoal7;
        $rk->rksoal8=$request->rksoal8;
        $rk->rksoal9=$request->rksoal9;
        $rk->rksoal10=$request->rksoal10;
        $rk->rksoal11=$request->rksoal11;
        $rk->rksoal12=$request->rksoal12;
        $rk->rksoal13=$request->rksoal13;
        $rk->save();
        }
        $kecamatan = $pgigi->sekolah->kelurahan->kecamatan->id;
        $dokter = User::whereHas('dokter',function($query) use($kecamatan){
            $query->where('id_kecamatan',$kecamatan);
        })->get();
        Notification::send($dokter, new \App\Notifications\PemeriksaanGigiNotification(PemeriksaanGigi::with('anak')->find($pgigi->id)));
        return redirect()->route('view-riwayat')->with('success','sukses mengisi data pemeriksaan gigi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemeriksaanGigi  $pemeriksaanGigi
     * @return \Illuminate\Http\Response
     */
    public function show(PemeriksaanGigi $pemeriksaanGigi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemeriksaanGigi  $pemeriksaanGigi
     * @return \Illuminate\Http\Response
     */
    public function edit(PemeriksaanGigi $pemeriksaanGigi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemeriksaanGigi  $pemeriksaanGigi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemeriksaanGigi $pemeriksaanGigi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemeriksaanGigi  $pemeriksaanGigi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemeriksaanGigi $pemeriksaanGigi)
    {
        //
    }
}

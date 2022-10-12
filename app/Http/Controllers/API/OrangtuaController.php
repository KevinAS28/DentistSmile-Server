<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orangtua;
use App\Models\Anak;
use Auth;
use Validator;

class OrangtuaController extends BaseContoller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $orangtua = new Orangtua();
        $orangtua->id_users=$user;
        $orangtua->nama = $request->nama;
        $orangtua->id_kecamatan = $request->id_kecamatan;
        $orangtua->id_kelurahan = $request->id_kelurahan;
        $orangtua->tempat_lahir = $request->tempat_lahir;
            $orangtua->tanggal_lahir = $request->tanggal_lahir;
            $orangtua->alamat = $request->alamat;
            $orangtua->pendidikan= $request->pendidikan;

        $orangtua->save();

        return response()->json([
            'message'=> 'data berhasil ditambahkan',
            'data'=> $orangtua
        ]);

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function dataAnak(Request $request){
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = Anak::Where('id_orangtua',$orangtua)->get();

        return response()->json([
            'message'=>'Success',
            'data'=>$anak
        ]);
    }

    public function anak($id){
        $anak = Anak::find($id);
        return response()->json([
            'message'=>'success',
            'data' => $anak
        ]);
    }

    
    public function tambahAnak(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'nama' =>['required'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'jenis_kelamin' => ['required']
            
        ]);

        if($validator->fails()){
            return $this->responseError('Register failed', 422, $validator->errors());
        }

        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        $anak = new Anak();
        $anak->id_orangtua= $orangtua;
        $anak->nama = $request->nama;
        $anak->jenis_kelamin = $request->jenis_kelamin;
        $anak->tempat_lahir = $request->tempat_lahir;
        $anak->tanggal_lahir = $request->tanggal_lahir;


        $anak->save();
        return response()->json([
            'message'=> 'success',
            'data'=> $anak
        ]);
    }

    public function updateAnak(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nama' =>['required'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'jenis_kelamin' => ['required']
            
        ]);

        if($validator->fails()){
            return $this->responseError('Register failed', 422, $validator->errors());
        }

        $anak = Anak::find($id);
        $user = Auth::user();
        $orangtua = Orangtua::Where('id_users', Auth::user()->id)->value('id');
        
        $anak->id_orangtua = $orangtua;
        $anak->nama = $request->nama;
        $anak->jenis_kelamin=$request->jenis_kelamin;
        $anak->tempat_lahir=$request->tempat_lahir;
        $anak->tanggal_lahir=$request->tanggal_lahir;


        $anak->save();
        return response()->json([
            'messages' => "Success",
            'data' => $anak
        ]);
    }

    


    
}

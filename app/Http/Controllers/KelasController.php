<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data($id){
        $sekolah = Sekolah::find($id);
        $kelas = Kelas::where('sekolah_id',$sekolah)->get();
        return datatables()->of($kelas)
        ->addColumn('action', function($row){
            $btn = '<div class="btn-group btn-group-sm">';
            $btn .= '<button type="button" id="btn-edit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
            $btn .= '<button type="button" id="btn-delete" class="btn btn-danger"><i class="fa fa-trash " ></i></button>';
            $btn .= '</div>';

           return $btn;
        })
        ->addColumn('sekolah',function($row){
            return $row->sekolah->nama;
        });
    }
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
        //
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
}

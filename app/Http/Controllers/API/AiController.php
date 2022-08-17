<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemeriksaanGigi;
use App\Models\SkriningIndeks;

class AiController extends Controller
{
    public function diagnosa(Request $request)
    {
        // $d = array_key_exists('GigiBerlubang', $request->diagnosa) ? $request->diagnosa['GigiBerlubang'] : 0;
        // $e = array_key_exists('GigiHilang', $request->diagnosa) ? $request->diagnosa['GigiHilang'] : 0 + array_key_exists('SisaAkar', $request->diagnosa) ? $request->diagnosa['SisaAkar'] : 0;
        // $f = 0;

        // $diagnosa = 'Terdapat ';

        // foreach ($request->diagnosa as $key => $value) {
        //     $diagnosa .= $key . ' sebanyak ' . $value;
        //     if (last($request->diagnosa) != $value) {
        //         $diagnosa .= ', ';
        //     }
        // }
        // SkriningIndeks::updateOrCreate(
        //     [
        //         'id_pemeriksaan' => $request->id_pemeriksaan
        //     ],
        //     [
        //         'def_d' => $d,
        //         'def_e' => $e,
        //         'def_f' => $f,
        //         'dmf_d' => $d,
        //         'dmf_e' => $e,
        //         'dmf_f' => $f,
        //         'diagnosa' => $diagnosa
        //     ]
        // );

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}

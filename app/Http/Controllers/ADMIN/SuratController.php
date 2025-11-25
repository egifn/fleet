<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class SuratController extends Controller
{
    public function view()
    {
        $data['dt_kendaraan_surat'] = DB::table('dt_kendaraan_surat')
                                      ->join('dt_kendaraan','dt_kendaraan_surat.no_polisi','=','dt_kendaraan.no_polisi')
                                      ->get();
        return view('app_page.administrator.surat', $data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_surat['no_polisi']            = $request->no_polisi;
        $data_surat['no_stnk']              = $request->no_stnk;
        $data_surat['bulan_exp_stnk']       = $request->bulan_exp_stnk;
        $data_surat['tgl_pajak_stnk']       = $request->tgl_pajak_stnk;
        $data_surat['tgl_baru_stnk']        = $request->tgl_baru_stnk;
        $data_surat['status_dokumen_stnk']  = $request->status_dokumen_stnk;
        $data_surat['no_kir_1']             = $request->no_kir_1;
        $data_surat['no_kir_2']             = $request->no_kir_2;
        $data_surat['masa_berlaku_kir']     = $request->masa_berlaku_kir;
        $data_surat['no_kontrol_kir']       = $request->no_kontrol_kir;
        $data_surat['status_kir']           = $request->status_kir;

        $data = json_encode($data_surat);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan_surat')->insert([
            'no_polisi'             => $request->no_polisi,
            'no_stnk'               => $request->no_stnk,
            'bulan_exp_stnk'        => $request->bulan_exp_stnk,
            'tgl_pajak_stnk'        => $request->tgl_pajak_stnk,
            'tgl_baru_stnk'         => $request->tgl_baru_stnk,
            'status_dokumen_stnk'   => $request->status_dokumen_stnk,
            'bulan_no_kir_1'        => $request->no_kir_1,
            'bulan_no_kir_2'        => $request->no_kir_2,
            'masa_berlaku_kir'      => $request->masa_berlaku_kir,
            'no_kontrol_kir'        => $request->no_kontrol_kir,
            'status_kir'            => $request->status_kir,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_surat', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_surat', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.surat.view');
    }    
}

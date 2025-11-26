<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class KendaraanSewaController extends Controller
{
    public function view()
    { 
        
        $data['dt_kendaraan_sewa'] = DB::table('dt_kendaraan_sewa')
            ->join('dt_branch','dt_kendaraan_sewa.penempatan','=','dt_branch.code_branch')
            ->join('dt_vendor', 'dt_kendaraan_sewa.kode_vendor','=','dt_vendor.kode_vendor')
            ->select('dt_kendaraan_sewa.id','dt_kendaraan_sewa.no_polisi','dt_kendaraan_sewa.merek',
                'dt_kendaraan_sewa.type','dt_branch.name_branch','dt_kendaraan_sewa.kategori','dt_kendaraan_sewa.penempatan',
                'dt_kendaraan_sewa.perusahaan','dt_kendaraan_sewa.status_kendaraan','dt_kendaraan_sewa.kode_vendor','dt_vendor.nama_vendor',
                'dt_kendaraan_sewa.tgl_sewa','dt_kendaraan_sewa.tgl_akhir_sewa')
            ->get();
        
        return view('app_page.administrator.kendaraan_sewa',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_kendaraan['no_polisi']        = $request->no_polisi;
        $data_kendaraan['merek']            = $request->merek;
        $data_kendaraan['type']             = $request->type;
        $data_kendaraan['kategori']         = $request->kategori;
        $data_kendaraan['penempatan']       = $request->penempatan;
        $data_kendaraan['perusahaan']       = $request->perusahaan;
        $data_kendaraan['status_kendaraan'] = $request->status_kendaraan;
        $data_kendaraan['kode_vendor']      = $request->vendor;
        

        $data = json_encode($data_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan')->insert([
            'no_polisi'         => $request->no_polisi,
            'merek'             => $request->merek,
            'type'              => $request->type,
            'kategori'          => $request->kategori,
            'penempatan'        => $request->penempatan,
            'perusahaan'        => $request->perusahaan,
            'status_kendaraan'  => $request->status_kepemilikan,
            'kode_vendor'       => $request->vendor,
            
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil disimpan');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal disimpan');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.kendaraan_sewa.view');
    }

    public function kendaraan_sewa_excel(Request $request)
    {
        $data['dt_kendaraan_sewa_excel'] = DB::table('dt_kendaraan_sewa')
        ->join('dt_branch','dt_kendaraan_sewa.penempatan','=','dt_branch.code_branch')
        ->join('dt_vendor', 'dt_kendaraan_sewa.kode_vendor','=','dt_vendor.kode_vendor')
        ->select('dt_kendaraan_sewa.id','dt_kendaraan_sewa.no_polisi','dt_kendaraan_sewa.merek',
            'dt_kendaraan_sewa.type','dt_branch.name_branch','dt_kendaraan_sewa.kategori','dt_kendaraan_sewa.penempatan',
            'dt_kendaraan_sewa.perusahaan','dt_kendaraan_sewa.status_kendaraan','dt_kendaraan_sewa.kode_vendor','dt_vendor.nama_vendor',
            'dt_kendaraan_sewa.tgl_sewa','dt_kendaraan_sewa.tgl_akhir_sewa')
        ->get();
        
        return view('app_page.administrator.kendaraan_sewa_excel',$data);
    }
}

<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class SegmenKendaraanController extends Controller
{
    public function view()
    {

        $data['dt_segmen_kendaraan'] = DB::table('dt_segmen_kendaraan')->get();
        return view('app_page.administrator.segmen_kendaraan',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_segmen_kendaraan['nama_segmen_ken']   = $request->nama_segmen_ken;
        $data_segmen_kendaraan['keterangan']              = $request->keterangan;

        $data = json_encode($data_segmen_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_segmen_kendaraan')->insert([
            'nama_segmen_kendaraan'     => $request->nama_segmen_ken,
            'keterangan'                => $request->keterangan,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_segmen_kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_segmen', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.segmen_kendaraan.view');
    }
}

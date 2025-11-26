<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class SegmenController extends Controller
{
    public function view()
    {
        $data['dt_segmen'] = DB::table('dt_segmen')->get();
        return view('app_page.administrator.segmen',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_segmen['nama_segmen']     = $request->nama_segmen;
        $data_segmen['keterangan']      = $request->keterangan;

        $data = json_encode($data_segmen);

        # Simpan Ke database
        $action = DB::table('dt_segmen')->insert([
            'nama_segmen'       => $request->nama_segmen,
            'keterangan'        => $request->keterangan,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_segmen', $data, $status);
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
        return redirect()->route('admin.segmen.view');
    }
}

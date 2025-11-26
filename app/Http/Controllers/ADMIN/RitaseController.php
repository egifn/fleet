<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class RitaseController extends Controller
{
    public function view()
    {
        $data['dt_ritase'] = DB::table('dt_ritase')
                            ->join('dt_segmen','dt_ritase.id_segmen_rit','=','dt_segmen.id')
                            ->select('dt_ritase.id','dt_ritase.id_segmen_rit','dt_segmen.nama_segmen','dt_ritase.ritase','dt_ritase.vol_ideal')
                            ->get();                     
        return view('app_page.administrator.ritase',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_segmen['id_segmen_rit']   = $request->id_segmen;
        $data_segmen['ritase']          = $request->ritase;
        $data_segmen['vol_ideal']       = $request->vol_ideal;

        $data = json_encode($data_segmen);

        # Simpan Ke database
        $action = DB::table('dt_ritase')->insert([
            'id_segmen_rit'     => $request->id_segmen,
            'ritase'            => $request->ritase,
            'vol_ideal'         => $request->vol_ideal,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_ritase', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_ritase', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.ritase.view');
    }
}

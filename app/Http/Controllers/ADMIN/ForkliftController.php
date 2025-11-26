<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class ForkliftController extends Controller
{
    public function view()
    { 
        $data['dt_branch']  =  DB::table('dt_branch')->whereNotNull('code_branch')->get();
        
        $data['dt_forklift'] = DB::table('dt_forklift')
            ->join('dt_branch','dt_forklift.penempatan','=','dt_branch.code_branch')
            ->select('dt_forklift.id','dt_forklift.no_forklift','dt_forklift.merek',
            'dt_forklift.daya_angkut','dt_forklift.penempatan',
            'dt_branch.name_branch',
            'dt_forklift.perusahaan','dt_forklift.keterangan','dt_forklift.id_user_input')
            ->get();
        
        return view('app_page.administrator.forklift',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_forklift['no_forklift']      = $request->no_forklift;
        $data_forklift['merek']            = $request->merek;
        $data_forklift['daya_angkut']  = $request->daya_angkut;
        $data_forklift['penempatan']       = $request->penempatan;
        $data_forklift['perusahaan']       = $request->perusahaan;
        $data_forklift['keterangan']       = $request->keterangan;

        $data = json_encode($data_forklift);

        # Simpan Ke database
        $action = DB::table('dt_forklift')->insert([
            'no_forklift'         => $request->no_forklift,
            'merek'             => $request->merek,
            'daya_angkut'   => $request->daya_angkut,
            'penempatan'        => $request->penempatan,
            'perusahaan'        => $request->perusahaan,
            'keterangan'        => $request->keterangan,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_forklift', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_forklift', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.forklift.view');
    }

    public function update(REQUEST $request)
    {
        # data in this process 
        $data_forklift['no_forklift']      = $request->no_forklift_update;
        $data_forklift['merek']            = $request->merek_update;
        $data_forklift['daya_angkut']  = $request->daya_angkut_update;
        $data_forklift['penempatan']       = $request->penempatan_update;
        $data_forklift['perusahaan']       = $request->perusahaan_update;
        $data_forklift['keterangan']       = $request->keterangan_update;

        $data = json_encode($data_forklift);

        # Simpan Ke database
        $action = DB::table('dt_forklift')->where('id', $request->id_update)->update([
            'no_forklift'       => $request->no_forklift_update,
            'merek'             => $request->merek_update,
            'daya_angkut'       => $request->daya_angkut_update,
            'penempatan'        => $request->penempatan_update,
            'perusahaan'        => $request->perusahaan_update,
            'keterangan'        => $request->keterangan_update,
            ]);
        
            # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_forklift', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_forklift', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.forklift.view');
    }

    public function view_excel(Request $request)
    {
        $data['dt_forklift_excel'] = DB::table('dt_forklift')
            ->join('dt_branch','dt_forklift.penempatan','=','dt_branch.code_branch')
            ->select('dt_forklift.id','dt_forklift.no_forklift','dt_forklift.merek',
            'dt_forklift.daya_angkut','dt_forklift.penempatan',
            'dt_branch.name_branch',
            'dt_forklift.perusahaan','dt_forklift.keterangan','dt_forklift.id_user_input')
            ->get();
        
        return view('app_page.administrator.forklift_excel',$data);
    }
}

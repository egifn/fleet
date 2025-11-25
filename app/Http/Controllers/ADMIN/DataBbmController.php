<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class DataBbmController extends Controller
{
    public function view()
    {
        $data['dt_bbm'] = DB::table('dt_bbm')
                        //->join('dt_branch','dt_bbm.code_branch','=','dt_branch.code_branch')
                        ->join('users','dt_bbm.id_user_input','=','users.id')
                        ->select('dt_bbm.id','dt_bbm.jenis_bbm','dt_bbm.harga_perliter','dt_bbm.id_user_input','users.id as id_user')
                        //->orderby('dt_bbm.code_branch', 'asc')
                        ->get();
        return view('app_page.administrator.bbm',$data);
    }

    public function data_branch(REQUEST $request)
    {
        # START QUERY
        $data  =  DB::table('dt_branch')->whereNotNull('code_branch')->get();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $data  
        ]);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_bbm['jenis_bbm']     = $request->nama_bbm;
        $data_bbm['harga_perliter']      = $request->harga;

        $data = json_encode($data_bbm);

        # Simpan Ke database
        $action = DB::table('dt_bbm')->insert([
            'jenis_bbm'       => $request->nama_bbm,
            'harga_perliter'  => $request->harga,
            //'code_branch'     => $request->penempatan,
            'id_user_input'   => Auth::user()->id
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_bbm', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_bbm', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.databbm.view');
    }

    public function update(REQUEST $request)
    {
        # data in this process 
        $data_bbm['id']                 = $request->id_bbm;
        $data_bbm['jenis_bbm']          = $request->nama_bbm_update;
        $data_bbm['harga_perliter']     = $request->harga_update;

        $data = json_encode($data_bbm);

        # Simpan Ke database
        $action = DB::table('dt_bbm')->where('id', $request->id_bbm)->update([
            // 'no_polisi'          => $request->nopol_update,
            'jenis_bbm'             => $request->nama_bbm_update,
            'harga_perliter'        => $request->harga_update,
            'id_user_input'         => Auth::user()->id,
            ]);
        
            # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_bbm', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_bbm', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.databbm.view');
    }
}

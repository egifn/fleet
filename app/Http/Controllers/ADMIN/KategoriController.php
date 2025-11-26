<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class KategoriController extends Controller
{
    public function view(REQUEST $request)
    {
        $data['dt_kendaraan_kategori'] = DB::table('dt_kendaraan_kategori')
                    ->join('dt_segmen','dt_kendaraan_kategori.id_segmen','=','dt_segmen.id')
                    ->join('dt_segmen_kendaraan','dt_kendaraan_kategori.id_segmen_kendaraan','=','dt_segmen_kendaraan.id')
                    ->select('dt_kendaraan_kategori.id','dt_kendaraan_kategori.no_polisi','dt_kendaraan_kategori.id_segmen','dt_segmen.nama_segmen',
                    'dt_kendaraan_kategori.id_segmen_kendaraan','dt_segmen_kendaraan.nama_segmen_kendaraan','dt_kendaraan_kategori.kategori',
                    'dt_kendaraan_kategori.muatan',
                    'dt_kendaraan_kategori.kapasitas_muatan','dt_kendaraan_kategori.id_user_input')
        ->get();
        
        return view('app_page.administrator.kategori',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_segmen_kendaraan['no_polisi']             = $request->nopol;
        $data_segmen_kendaraan['id_segmen']             = $request->id_segmen;
        $data_segmen_kendaraan['id_segmen_kendaraan']   = $request->id_segmen_kendaraan;
        $data_segmen_kendaraan['kategori']              = $request->kategori;
        $data_segmen_kendaraan['muatan']                = $request->muatan;
        $data_segmen_kendaraan['kapasitas_muatan']      = $request->kapasitas_muatan;

        $data = json_encode($data_segmen_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan_kategori')->insert([
            'no_polisi'             => $request->nopol,
            'id_segmen'             => $request->id_segmen,
            'id_segmen_kendaraan'   => $request->id_segmen_kendaraan,
            'kategori'              => $request->kategori,
            'muatan'                => $request->muatan,
            'kapasitas_muatan'      => $request->kapasitas_muatan,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('simpan kategori kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('simpan kategori kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        
        if (Auth::user()->roles == 'Superadmin'){
            return redirect()->route('admin.kategori.view');
        }elseif (Auth::user()->roles == 'Admin'){
            return redirect()->route('user.kategori.view');
        }
    }

    public function update(REQUEST $request)
    {
        # data in this process 
        //$data_segmen_kendaraan['no_polisi']             = $request->nopol;
        $data_segmen_kendaraan['id_segmen']             = $request->id_segmen;
        $data_segmen_kendaraan['id_segmen_kendaraan']   = $request->id_segmen_kendaraan;
        $data_segmen_kendaraan['kategori']              = $request->kategori;
        $data_segmen_kendaraan['muatan']                = $request->muatan;
        $data_segmen_kendaraan['kapasitas_muatan']      = $request->kapasitas_muatan;

        $data = json_encode($data_segmen_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan_kategori')->where('id', $request->id_kategori_update)->update([
            // 'no_polisi'             => $request->nopol_update,
            'id_segmen'             => $request->id_segmen_update,
            'id_segmen_kendaraan'   => $request->id_segmen_kendaraan_update,
            'kategori'              => $request->kategori_update,
            'muatan'                => $request->muatan_update,
            'kapasitas_muatan'      => $request->kapasitas_muatan_update,
            ]);
        
            # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update kategori kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update kategori kendaraan', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        if (Auth::user()->roles == 'Superadmin'){
            return redirect()->route('admin.kategori.view');
        }elseif (Auth::user()->roles == 'Admin'){
            return redirect()->route('user.kategori.view');
        }
    }
}

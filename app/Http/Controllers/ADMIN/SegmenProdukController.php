<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class SegmenProdukController extends Controller
{
    public function view()
    {
        $data['dt_segmen_produk'] = DB::table('dt_segmen_produk')
            ->join('dt_segmen','dt_segmen_produk.id_segmen','=','dt_segmen.id')
            ->join('dt_branch','dt_segmen_produk.code_branch','=','dt_branch.code_branch')   
            ->select('dt_segmen_produk.id','dt_segmen_produk.id_segmen','dt_segmen.nama_segmen','dt_segmen_produk.code_branch','dt_branch.name_branch','dt_segmen_produk.jenis','dt_segmen_produk.jasa_harga')                         
            ->get();
        return view('app_page.administrator.segmen_produk',$data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_segmen_p['id_segmen']     = $request->id_segmen;
        $data_segmen_p['branch_id']     = $request->branch_id;
        $data_segmen_p['jenis']         = $request->jenis;
        $data_segmen_p['harga']         = $request->harga;
        

        $data = json_encode($data_segmen_p);

        # Simpan Ke database
        $action = DB::table('dt_segmen_produk')->insert([
            'id_segmen'     => $request->id_segmen,
            'code_branch'   => $request->branch_id,
            'jenis'         => $request->jenis,
            'jasa_harga'    => $request->harga,
            
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_segmen_produk', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_segmen_produk', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.segmen_produk.view');
    }
}

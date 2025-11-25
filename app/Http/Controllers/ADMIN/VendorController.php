<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class VendorController extends Controller
{
    public function view()
    {
        // $data = [
        //     'sum_depo' => DB::table('dt_branch')->where('type_branch', 'DEPO')->count(),
        //     'sum_pool' => DB::table('dt_branch')->where('type_branch', 'POOL')->count(),
        //     'sum_bengkel' => DB::table('dt_branch')->where('type_branch', 'BENGKEL')->count(),
        //     'sum_ho' => DB::table('dt_branch')->where('type_branch', 'HO')->count(),
        //     'sum_supplier' => DB::table('dt_branch')->where('type_branch', 'PABRIK')->count(),
        // ];
        $data['dt_vendor'] = DB::table('dt_vendor')->get();
        
        return view('app_page.administrator.vendor',$data);
    }

    public function insert(REQUEST $request)
    {
        $getRow = DB::table('dt_vendor')
        ->select(DB::raw('MAX(kode_vendor) as urut_no'))
        ->first();

        $rowCount = $getRow->urut_no + 1;

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                    $kode = "00000".''.($rowCount + 1);
            } else if ($rowCount < 99) {
                    $kode = "0000".''.($rowCount + 1);
            } else if ($rowCount < 999) {
                    $kode = "000".''.($rowCount + 1);
            } else if ($rowCount < 9999) {
                    $kode = "00".''.($rowCount + 1);
            } else if ($rowCount < 99999) {
                    $kode = "0".''.($rowCount + 1);
            } else {
                    $kode = ($rowCount + 1);
            }
        } 

        # data in this process 
        $data_vendor['kode_vendor']     = $kode;
        $data_vendor['nama_vendor']     = $request->nama_vendor;
        $data_vendor['alamat']          = $request->alamat;
        $data_vendor['telepon']         = $request->telepon;
        $data_vendor['email']           = $request->email;

        $data = json_encode($data_vendor);

        # Simpan Ke database
        $action = DB::table('dt_vendor')->insert([
            'kode_vendor'       => $kode,
            'nama_vendor'       => $request->nama_vendor,
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'email'             => $request->email,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_vendor', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_vendor', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.vendor.view');
    }
}

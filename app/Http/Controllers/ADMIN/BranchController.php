<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class BranchController extends Controller
{
    # BRANCH
    public function view()
    {
        $data = [
            'sum_depo' => DB::table('dt_branch')->where('type_branch', 'DEPO')->count(),
            'sum_pool' => DB::table('dt_branch')->where('type_branch', 'POOL')->count(),
            'sum_bengkel' => DB::table('dt_branch')->where('type_branch', 'BENGKEL')->count(),
            'sum_ho' => DB::table('dt_branch')->where('type_branch', 'HO')->count(),
            'sum_supplier' => DB::table('dt_branch')->where('type_branch', 'PABRIK')->count(),
        ];
        $data['dt_branch'] = DB::table('dt_branch')->get();
        
        return view('app_page.administrator.branch',$data);
    }
    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_al['name_branch']    = $request->name_branch;
        $data_al['company_branch'] = $request->company_branch;
        $data_al['longitude']      = $request->longitude;
        $data_al['address_branch'] = $request->address_branch;
        $data_al['type_branch']    = $request->type_branch;

        $data = json_encode($data_al);

        # Simpan Ke database
        $action = DB::table('dt_branch')->insert([
            'code_branch'    => null,
            'name_branch'    => $request->name_branch,
            'company_branch' => $request->company_branch,
            'langitude'      => $request->langitude,
            'longitude'      => $request->longitude,
            'address_branch' => $request->address_branch,
            'type_branch'    => $request->type_branch,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.branch.view');
    }
    public function update(REQUEST $request)
    {
        # data in this process 
        $data_al['name_branch']    = $request->name_branch;
        $data_al['company_branch'] = $request->company_branch;
        $data_al['longitude']      = $request->longitude;
        $data_al['address_branch'] = $request->address_branch;
        $data_al['type_branch']    = $request->type_branch;

        $data = json_encode($data_al);

        # Simpan Ke database
        $action = DB::table('dt_branch')->where('id', $request->id)->update([
                'code_branch'    => null,
                'name_branch'    => $request->name_branch,
                'company_branch' => $request->company_branch,
                'langitude'      => $request->langitude,
                'longitude'      => $request->longitude,
                'address_branch' => $request->address_branch,
                'type_branch'    => $request->type_branch,
            ]);
        
            # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
            return redirect()->route('admin.branch.view');
    }
    public function delete($id)
    {
        # data in this process 
        $data = DB::table('dt_branch')->where('id', $id)->first();
        $data = json_encode($data);
        # proses delete
        $action   = DB::table('dt_branch')->where('id', $id)->delete();

        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('delete branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'data berhasil dihapus');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('delete branch', $data, $status);
            # sweetalert2 success
            Session:: flash('message', 'data gagal dihapus');
        }
        # ------------------------- Cek Action End ------------------------- 
        return redirect()->route('admin.branch.view');
    }
}

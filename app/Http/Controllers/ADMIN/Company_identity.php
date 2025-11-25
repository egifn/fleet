<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Helpers\Activities_log;

class Company_identity extends Controller
{
    public function view()
    {
        $data['data_company_identity'] = DB::table('data_company_identity')->get();
        return view('app_page.administrator.company_identity', $data);
    }
    public function update(REQUEST $request)
    {
        # data in this process 
        $data_al['company_name'] = $request->company_name;
        $data_al['address']      = $request->address;
        $data_al['phone']        = $request->phone;
        $data_al['email']        = $request->email;
        $data_al['logo']         = $request->logo;

        $data = json_encode($data_al);

        $action = DB::table('data_company_identity')->where('id', '28')->update([
            'company_name' => $request->company_name,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'logo'         => $request->logo,
        ]);
        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update data_company_identity', $data, $status);
            # sweetalert2 success
            Session:: flash('sukses', 'Data berhasil diupdate');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update data_company_identity', $data, $status);
            # sweetalert2 success
            Session:: flash('sukses', 'Data gagal diupdate');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.company_identity.view');
    }
}
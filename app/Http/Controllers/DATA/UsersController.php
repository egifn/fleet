<?php

namespace App\Http\Controllers\DATA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Activities_log;

class UsersController extends Controller
{
    public function update(REQUEST $request)
    {
        # data in this process 
        $data_al['name']      = $request->name;
        $data_al['email']     = $request->email;
        $data_al['roles']     = $request->roles;
        $data_al['branch_id'] = $request->branch_id;

        $data = json_encode($data_al);

        # Simpan Ke database
        $action = DB::table('users')->where('id', $request->id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);
        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('update user', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('update user', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        
        Auth::logout();
        // echo "<script>Swal.fire('success!','ubah account','success')</script>";
        return redirect()->route('login');
    }
}

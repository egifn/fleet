<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Activities_log;
use Illuminate\Support\Str;


class UsersController extends Controller
{
    # USER
    public function view()
    {
        $data = [
            'sum_users' => DB::table('users')->count(),
        ];
        $data['dt_branch'] = DB::table('dt_branch')->get();
        return view('app_page.administrator.users', $data);
    }
    public function details()
    {
        $data['users'] = DB::table('users')->where('id', Auth::user()->id)
            ->join('dt_branch', 'users.branch_id', '=', 'dt_branch.id')
            ->get();

        $data['dt_branch'] = DB::table('dt_branch')->get();
        return view('app_page.administrator.users_details', $data);
    }
    public function insert(REQUEST $request)
    {
        # Simpan Ke database
        $action = DB::table('users')->insert([
            'code_employee'  => null,
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => bcrypt($request->password),
            'roles'          => $request->roles,
            'position'       => $request->position,
            'branch_id'      => $request->branch_id,
            'status_account' => "Aktif"
        ]);
        if ($action) {
            # sweetalert2 success
            Session::flash('message', 'Data berhasil insert');
        } else {
            # sweetalert2 faild
            Session::flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.users.view');
    }
    public function update(REQUEST $request)
    {
        // dd($request);
        # data in this process 
        $data_al['name']  = $request->name;
        $data_al['email'] = $request->email;

        $data = json_encode($data_al);

        # Simpan Ke database
        $action = DB::table('users')->where('id', $request->id)->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
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
        return redirect()->route('admin.users.view');
    }
    public function updatestatus(REQUEST $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'status_account' => $request->status_account,
        ]);
    }
    public function delete($id)
    {
        # data in this process 
        $data = DB::table('users')->where('id', $id)->first();
        $data = json_encode($data);
        # proses delete
        $action = DB::table('users')->where('id', $id)->delete();

        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('delete branch', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'data berhasil dihapus');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('delete branch', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'data gagal dihapus');
        }
        # ------------------------- Cek Action End ------------------------- 
        return redirect()->route('admin.users.view');
    }
}

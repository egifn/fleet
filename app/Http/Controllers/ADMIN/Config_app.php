<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Helpers\Activities_log;

class Config_app extends Controller
{
    public function view()
    {
        return view('app_page.administrator.config-app');
    }
    public function update(REQUEST $request)
    {
        # data in this process 
        $data_al['id']              = $request->id;
        $data_al['app_name']        = $request->app_name;
        $data_al['code_activation'] = $request->code_activation;
        $data_al['app_description'] = $request->app_description;
        $data_al['app_keyword']     = $request->app_keyword;
        $data_al['app_author']      = $request->app_author;
        $data_al['app_logo']        = $request->app_logo;
        $data_al['update_at']       = $request->update_at;

        $data = json_encode($data_al);

        $action = DB::table('data_config_app')->where('id', '28')->update([
            'app_name'        => $request->app_name,
            'code_activation' => $request->code_activation,
            'app_description' => $request->app_description,
            'app_keyword'     => $request->app_keyword,
            'app_author'      => $request->app_author,
            'app_logo'        => $request->app_logo
        ]);
        # data in this process 
        # ------------------------------ Cek Action ------------------------------ 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log:: addToLog('update Config_app', $data, $status);
            # sweetalert2 success
            Session:: flash('sukses', 'data berhasil diupdate');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log:: addToLog('update Config_app', $data, $status);
            # sweetalert2 success
            Session:: flash('sukses', 'data gagal diupdate');
        }
        #------------------------------ Cek Action End ------------------------------ 
        return redirect()->route('admin.config_app.view');
    }
}

<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\File_Upload;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class BbmForkliftController extends Controller
{
    public function view()
    {
        if(Auth::user()->roles == 'Superadmin'){
            $data['dt_bbm'] = DB::table('dt_tr_bbm_forklift')
                // ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_bbm_forklift.id','dt_tr_bbm_forklift.kode_bbm','dt_tr_bbm_forklift.tanggal_bbm','dt_tr_bbm_forklift.waktu_bbm',
                        'dt_tr_bbm_forklift.no_forklift','dt_tr_bbm_forklift.code_branch','dt_tr_bbm_forklift.perusahaan','dt_tr_bbm_forklift.week','dt_tr_bbm_forklift.salesman',
                        'dt_tr_bbm_forklift.segmen','dt_tr_bbm_forklift.tipe','dt_tr_bbm_forklift.jenis_bbm','dt_tr_bbm_forklift.harga_perliter','dt_tr_bbm_forklift.liter_qty','dt_tr_bbm_forklift.biaya_bbm',
                        'dt_tr_bbm_forklift.hour','dt_tr_bbm_forklift.ratio_actual','dt_tr_bbm_forklift.ratio_ideal','dt_tr_bbm_forklift.keterangan_bbm',
                        'dt_tr_bbm_forklift.no_vocer','dt_tr_bbm_forklift.id_user_input','dt_file_upload.kode','dt_file_upload.description','dt_file_upload.filename')
                ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.name_branch')
                ->leftJoin('dt_file_upload','dt_tr_bbm_forklift.kode_bbm','=','dt_file_upload.kode')
                ->orderby('dt_tr_bbm_forklift.tanggal_bbm', 'desc')
                ->get();
        }else{
            $data['dt_bbm'] = DB::table('dt_tr_bbm_forklift')
                // ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_bbm_forklift.id','dt_tr_bbm_forklift.kode_bbm','dt_tr_bbm_forklift.tanggal_bbm','dt_tr_bbm_forklift.waktu_bbm',
                        'dt_tr_bbm_forklift.no_forklift','dt_tr_bbm_forklift.code_branch','dt_tr_bbm_forklift.perusahaan','dt_tr_bbm_forklift.week','dt_tr_bbm_forklift.salesman',
                        'dt_tr_bbm_forklift.segmen','dt_tr_bbm_forklift.tipe','dt_tr_bbm_forklift.jenis_bbm','dt_tr_bbm_forklift.harga_perliter','dt_tr_bbm_forklift.liter_qty','dt_tr_bbm_forklift.biaya_bbm',
                        'dt_tr_bbm_forklift.hour','dt_tr_bbm_forklift.ratio_actual','dt_tr_bbm_forklift.ratio_ideal','dt_tr_bbm_forklift.keterangan_bbm',
                        'dt_tr_bbm_forklift.no_vocer','dt_tr_bbm_forklift.id_user_input','dt_file_upload.kode','dt_file_upload.description','dt_file_upload.filename')
                ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.name_branch')
                ->leftJoin('dt_file_upload','dt_tr_bbm_forklift.kode_bbm','=','dt_file_upload.kode')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->orderby('dt_tr_bbm_forklift.tanggal_bbm', 'desc')
                ->get();
        }

        return view('app_page.bbm_forklift.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.bbm_forklift.create');
    }

    public function getkm(REQUEST $request)
    {
        $data = DB::table('dt_tr_bbm_forklift')
                ->select('hour')
                ->where('no_forklift', $request->cari_forklift)
                ->orderBy('tanggal_bbm', 'desc')
                ->limit(1)
                ->first();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    public function insert(REQUEST $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = (now()->format('H:i:s')); 

        $date = (date('dmy'));
        $getRow = DB::table('dt_tr_bbm_forklift')->select(DB::raw('MAX(RIGHT(kode_bbm,4)) as NoUrut'))
                                        ->where('kode_bbm', 'like', "%".$date."%");
        $rowCount = $getRow->count();

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                    $kode = "FB".''."-".''.$date."000".''.($rowCount + 1);
            } else if ($rowCount < 99) {
                    $kode = "FB".''."-".''.$date."00".''.($rowCount + 1);
            } else if ($rowCount < 999) {
                    $kode = "FB".''."-".''.$date."0".''.($rowCount + 1);
            } else if ($rowCount < 9999) {
                    $kode = "FB".''."-".''.$date.($rowCount + 1);
            }
        }else{
            $kode = "FB".''."-".''.$date.sprintf("%04s", 1);
        } 

        DB::table('dt_tr_bbm_forklift')->insert([
            'kode_bbm' => $kode,
            'tanggal_bbm' => Carbon::now()->format('Y-m-d'),
            'waktu_bbm' => $time,
            'no_forklift' => $request->no_forklift,
            'code_branch' => $request->depo,
            'perusahaan' => $request->wilayah,
            'week' => $request->week,
            // 'salesman' => $request->salesman,
            // 'segmen' => $request->segmen,
            // 'tipe' => $request->tipe,
            'jenis_bbm' => $request->jenis_bbm,
            'harga_perliter' => $request->harga_perliter,
            'liter_qty' => $request->liter_qty,
            'biaya_bbm' => $request->biaya_bbm,
            'hour' => $request->kilometer,
            'ratio_actual' => $request->ratio_aktual_temp,
            'ratio_ideal' => $request->ratio_ideal,
            'keterangan_bbm' => $request->keterangan_bbm,
            'no_vocer' => $request->no_vocer,
            'id_user_input' => Auth::user()->id
        ]);

        if($request->hasfile('file_upload')) { 
            foreach ($request->file('file_upload') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);

                    File_Upload::create([
                         'kode' => $kode,
                         'no_description_detail' => 0,
                         'description' => $request->keterangan_bbm,
                         'filename' => $filename,
                    ]);
                }
            }
            echo 'Success';
        }else{
            echo 'Gagal';
        }

        if (Auth::user()->roles == 'Superadmin'){
            return redirect()->route('admin.bbm_forklift.view');
        }elseif (Auth::user()->roles == 'Admin'){
            return redirect()->route('user.bbm_forklift.view');
        }   
    }

    public function view_excel(Request $request)
    {
            $data['dt_bbm_excel'] = DB::table('dt_tr_bbm_forklift')
                // ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_bbm_forklift.id','dt_tr_bbm_forklift.kode_bbm','dt_tr_bbm_forklift.tanggal_bbm','dt_tr_bbm_forklift.waktu_bbm',
                        'dt_tr_bbm_forklift.no_forklift','dt_tr_bbm_forklift.code_branch','dt_tr_bbm_forklift.perusahaan','dt_tr_bbm_forklift.week','dt_tr_bbm_forklift.salesman',
                        'dt_tr_bbm_forklift.segmen','dt_tr_bbm_forklift.tipe','dt_tr_bbm_forklift.jenis_bbm','dt_tr_bbm_forklift.harga_perliter','dt_tr_bbm_forklift.liter_qty','dt_tr_bbm_forklift.biaya_bbm',
                        'dt_tr_bbm_forklift.hour','dt_tr_bbm_forklift.ratio_actual','dt_tr_bbm_forklift.ratio_ideal','dt_tr_bbm_forklift.keterangan_bbm',
                        'dt_tr_bbm_forklift.no_vocer','dt_tr_bbm_forklift.id_user_input')
                ->get();

            return view('app_page.bbm_forklift.view_excel', $data);
    }
}

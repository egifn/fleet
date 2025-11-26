<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class UtilitasController extends Controller
{
    public function view()
    {
        $data['dt_utilitas'] = DB::table('dt_tr_utilitas')
                ->join('dt_branch','dt_tr_utilitas.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_utilitas.id','dt_tr_utilitas.kode_utilitas','dt_tr_utilitas.tanggal_utilitas','dt_tr_utilitas.waktu_utilitas',
                        'dt_tr_utilitas.no_polisi','dt_tr_utilitas.code_branch','dt_tr_utilitas.perusahaan','dt_tr_utilitas.week','dt_tr_utilitas.salesman','dt_branch.name_branch',
                        'dt_tr_utilitas.jugs_sps','dt_tr_utilitas.segmen','dt_tr_utilitas.kapasitas','dt_tr_utilitas.ritase_ideal_perhari','dt_tr_utilitas.ritase_real','dt_tr_utilitas.volume_penjualan_real',
                        'dt_tr_utilitas.ritase_real_perhari','dt_tr_utilitas.lost_ritase','dt_tr_utilitas.lost_volume','dt_tr_utilitas.volume_ideal','dt_tr_utilitas.keterangan','dt_tr_utilitas.id_user_input')
                ->get();

        return view('app_page.utilitas.index',$data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.utilitas.create');
    }

    public function store(REQUEST $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = (now()->format('H:i:s')); 

        $date = (date('dmy'));
        $getRow = DB::table('dt_tr_utilitas')->select(DB::raw('MAX(RIGHT(kode_utilitas,4)) as NoUrut'))
                                        ->where('kode_utilitas', 'like', "%".$date."%");
        $rowCount = $getRow->count();

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                    $kode = "UT".''."-".''.$date."000".''.($rowCount + 1);
            } else if ($rowCount < 99) {
                    $kode = "UT".''."-".''.$date."00".''.($rowCount + 1);
            } else if ($rowCount < 999) {
                    $kode = "UT".''."-".''.$date."0".''.($rowCount + 1);
            } else if ($rowCount < 9999) {
                    $kode = "UT".''."-".''.$date.($rowCount + 1);
            }
        }else{
            $kode = "UT".''."-".''.$date.sprintf("%04s", 1);
        } 

        DB::table('dt_tr_utilitas')->insert([
            'kode_utilitas' => $kode,
            'tanggal_utilitas' => Carbon::now()->format('Y-m-d'),
            'waktu_utilitas' => $time,
            'no_polisi' => $request->no_polisi,
            'code_branch' => $request->id_depo,
            'perusahaan' => $request->wilayah,
            'week' => $request->week,
            'salesman' => $request->salesman,
            'jugs_sps' => $request->jsh,
            'segmen' => $request->segmen,
            'kapasitas' => $request->kapasitas,
            'ritase_ideal_perhari' => $request->ritase_ideal,
            'ritase_real' => $request->ritase_real,
            'volume_penjualan_real' => $request->vol_penjualan_real,
            'ritase_real_perhari' => $request->ritase_real_hari,
            'lost_ritase' => $request->lost_ritase,
            'lost_volume' => $request->lost_volume,
            'volume_ideal' => $request->volume_ideal,
            'keterangan' => $request->keterangan,
            'id_user_input' => Auth::user()->id
        ]);

        if (Auth::user()->roles == 'Superadmin'){
            return redirect()->route('admin.utilitas.view');
        }elseif (Auth::user()->roles == 'Admin'){
            return redirect()->route('user.utilitas.view');
        }
        
    }
}

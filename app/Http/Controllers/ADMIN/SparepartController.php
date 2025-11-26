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

class SparepartController extends Controller
{
    public function view()
    {
        if(Auth::user()->roles == 'Superadmin'){
            $data['dt_sparepart'] = DB::table('dt_tr_sparepart')
                // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_sparepart.id','dt_tr_sparepart.kode','dt_tr_sparepart.tanggal','dt_tr_sparepart.waktu',
                        'dt_tr_sparepart.no_polisi','dt_tr_sparepart.code_branch','dt_tr_sparepart.perusahaan','dt_tr_sparepart.week','dt_tr_sparepart.salesman',
                        'dt_tr_sparepart.jenis','dt_tr_sparepart.segmen','dt_tr_sparepart.tipe','dt_tr_sparepart.kilometer','dt_tr_sparepart.ratio_actual','dt_tr_sparepart.ratio_ideal',
                        'dt_tr_sparepart.biaya_sparepart','dt_tr_sparepart.keterangan_sparepart','dt_tr_sparepart.no_lkm','dt_tr_sparepart.no_pmb','dt_tr_sparepart.id_user_input','dt_file_upload.kode as kode_file','dt_file_upload.description','dt_file_upload.filename')
                ->leftJoin('dt_file_upload','dt_tr_sparepart.kode','=','dt_file_upload.kode')
                ->get();
        }else{
            $data['dt_sparepart'] = DB::table('dt_tr_sparepart')
                // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_sparepart.id','dt_tr_sparepart.kode','dt_tr_sparepart.tanggal','dt_tr_sparepart.waktu',
                        'dt_tr_sparepart.no_polisi','dt_tr_sparepart.code_branch','dt_tr_sparepart.perusahaan','dt_tr_sparepart.week','dt_tr_sparepart.salesman',
                        'dt_tr_sparepart.jenis','dt_tr_sparepart.segmen','dt_tr_sparepart.tipe','dt_tr_sparepart.kilometer','dt_tr_sparepart.ratio_actual','dt_tr_sparepart.ratio_ideal',
                        'dt_tr_sparepart.biaya_sparepart','dt_tr_sparepart.keterangan_sparepart','dt_tr_sparepart.no_lkm','dt_tr_sparepart.no_pmb','dt_tr_sparepart.id_user_input','dt_file_upload.kode as kode_file','dt_file_upload.description','dt_file_upload.filename')
                ->leftJoin('dt_file_upload','dt_tr_sparepart.kode','=','dt_file_upload.kode')
                ->join('dt_branch','dt_tr_sparepart.code_branch','=','dt_branch.name_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->get();
        }

        return view('app_page.sparepart.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.sparepart.create');
    }

    public function insert(REQUEST $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = (now()->format('H:i:s')); 

        $date = (date('dmy'));
        $getRow = DB::table('dt_tr_sparepart')->select(DB::raw('MAX(RIGHT(kode,4)) as NoUrut'))
                                        ->where('kode', 'like', "%".$date."%");
        $rowCount = $getRow->count();

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                    $kode = "ST".''."-".''.$date."000".''.($rowCount + 1);
            } else if ($rowCount < 99) {
                    $kode = "ST".''."-".''.$date."00".''.($rowCount + 1);
            } else if ($rowCount < 999) {
                    $kode = "ST".''."-".''.$date."0".''.($rowCount + 1);
            } else if ($rowCount < 9999) {
                    $kode = "ST".''."-".''.$date.($rowCount + 1);
            }
        }else{
            $kode = "ST".''."-".''.$date.sprintf("%04s", 1);
        } 

        DB::table('dt_tr_sparepart')->insert([
            'kode' => $kode,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'waktu' => $time,
            'no_polisi' => $request->no_polisi,
            'code_branch' => $request->depo,
            'perusahaan' => $request->wilayah,
            'week' => $request->week,
            'salesman' => $request->salesman,
            'jenis' => $request->jenis,
            'segmen' => $request->segmen,
            'tipe' => $request->tipe,
            'kilometer' => $request->kilometer,
            'ratio_actual' => 0.0,
            'ratio_ideal' => $request->ratio_ideal,
            'biaya_sparepart' => $request->biaya_sparepart,
            'keterangan_sparepart' => $request->keterangan_sparepart,
            'no_lkm' => $request->no_lkm,
            'no_pmb' => $request->no_pmb,
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
            return redirect()->route('admin.sparepart.view');
        }elseif (Auth::user()->roles == 'Admin'){
            return redirect()->route('user.sparepart.view');
        }
        
    }

    public function view_excel(Request $request)
    {
        $data['dt_sparepart_excel'] = DB::table('dt_tr_sparepart')
            // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
            ->select('dt_tr_sparepart.id','dt_tr_sparepart.kode','dt_tr_sparepart.tanggal','dt_tr_sparepart.waktu',
                    'dt_tr_sparepart.no_polisi','dt_tr_sparepart.code_branch','dt_tr_sparepart.perusahaan','dt_tr_sparepart.week','dt_tr_sparepart.salesman',
                    'dt_tr_sparepart.jenis','dt_tr_sparepart.segmen','dt_tr_sparepart.tipe','dt_tr_sparepart.kilometer','dt_tr_sparepart.ratio_actual','dt_tr_sparepart.ratio_ideal',
                    'dt_tr_sparepart.biaya_sparepart','dt_tr_sparepart.keterangan_sparepart','dt_tr_sparepart.id_user_input')
            ->get();

    return view('app_page.sparepart.view_excel', $data);
    }
}

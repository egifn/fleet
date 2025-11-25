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

class SparepartAkuntingController extends Controller
{
    public function view(Request $request)
    {
        $depo = $request->input('penempatan');
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data['dt_branch'] = DB::table('dt_branch')
        ->whereNotNull('code_branch') // Pastikan data valid
        ->orderBy('name_branch', 'ASC')
        ->get();

        $query = DB::table('dt_tr_sparepart')
                ->select('dt_tr_sparepart.id','dt_tr_sparepart.kode','dt_tr_sparepart.tanggal','dt_tr_sparepart.waktu',
                        'dt_tr_sparepart.no_polisi','dt_tr_sparepart.code_branch','dt_tr_sparepart.perusahaan','dt_tr_sparepart.week','dt_tr_sparepart.salesman',
                        'dt_tr_sparepart.jenis','dt_tr_sparepart.segmen','dt_tr_sparepart.tipe','dt_tr_sparepart.kilometer','dt_tr_sparepart.ratio_actual','dt_tr_sparepart.ratio_ideal',
                        'dt_tr_sparepart.biaya_sparepart','dt_tr_sparepart.keterangan_sparepart','dt_tr_sparepart.no_lkm','dt_tr_sparepart.no_pmb','dt_tr_sparepart.id_user_input','dt_file_upload.kode as kode_file','dt_file_upload.description','dt_file_upload.filename')
                ->leftJoin('dt_file_upload','dt_tr_sparepart.kode','=','dt_file_upload.kode')
                ->join('dt_branch','dt_tr_sparepart.code_branch','=','dt_branch.name_branch');
                $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_sparepart.tanggal', [$tanggalAwal, $tanggalAkhir]);
                $data['dt_sparepart'] = $query->get();

        $query = DB::table('dt_tr_sparepart')
                ->select(
                        DB::raw('SUM(dt_tr_sparepart.biaya_sparepart) as total')
                    )
                ->join('dt_branch', 'dt_tr_sparepart.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_sparepart.kode', '=', 'dt_file_upload.kode');
                $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_sparepart.tanggal', [$tanggalAwal, $tanggalAkhir]);
                $data['total_biaya'] = $query->first();

        return view('app_page.sparepart_akunting.index', $data);
    }
}

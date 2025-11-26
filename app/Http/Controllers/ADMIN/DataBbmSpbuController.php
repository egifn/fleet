<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Excel;
use App\Imports\Import_Spbu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class DataBbmSpbuController extends Controller
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

        $query = DB::table('dt_tr_bbm_spbu')
            ->select(
                    'dt_tr_bbm_spbu.id',
                    'dt_tr_bbm_spbu.kode',
                    'dt_tr_bbm_spbu.tgl_bbm',
                    'dt_tr_bbm_spbu.no_polisi',
                    'dt_tr_bbm_spbu.liter_qty',
                    'dt_tr_bbm_spbu.harga_perliter',
                    'dt_tr_bbm_spbu.biaya_bbm',
                    'dt_tr_bbm_spbu.jenis_bbm',
                    //'dt_tr_bbm_spbu.code_branch',
                    //'dt_tr_bbm_spbu.perusahaan',
                    'dt_tr_bbm_spbu.id_user_input'
                )
            ->leftJoin('dt_branch', 'dt_tr_bbm_spbu.code_branch', '=', 'dt_branch.code_branch');
            $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_spbu.tgl_bbm', [$tanggalAwal, $tanggalAkhir]);
            $data['dt_bbm'] = $query->get();

        $query = DB::table('dt_tr_bbm_spbu')
            ->select(
                    DB::raw('SUM(dt_tr_bbm_spbu.biaya_bbm) as total')
                )
            ->leftJoin('dt_branch', 'dt_tr_bbm_spbu.code_branch', '=', 'dt_branch.name_branch');
            $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_spbu.tgl_bbm', [$tanggalAwal, $tanggalAkhir]);
            $data['total_biaya'] = $query->first();

        return view('app_page.import_spbu.index', $data);
    }

    public function create(REQUEST $request)
    {
        $data['dt_branch'] = DB::table('dt_branch')
            ->whereNotNull('code_branch') // Pastikan data valid
            ->orderBy('name_branch', 'ASC')
            ->get();

        return view('app_page.import_spbu.create', $data);
    }

    public function store(REQUEST $request)
    {
        if($request->hasFile('file'))
        {
            $startRow = $request->input('start_row', 2); // Dapatkan nilai startRow dari request
            $file = $request->file('file');
            $import = new Import_Spbu($startRow); // Inisialisasi dengan 2 argumen

            $importResult = Excel::import($import, $file);
        }

        return redirect()->route('user.bbm_spbu.view');
    }
}

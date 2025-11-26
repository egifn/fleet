<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class DataBbmSaldoSpbuController extends Controller
{
    public function view(Request $request)
    {
        $depo = $request->input('penempatan');
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data['dt_branch'] = DB::table('dt_branch')
            //->whereNotNull('code_branch')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->orderBy('name_branch', 'ASC')
            //->get();
            ->first();

        // $query = DB::table('dt_tr_bbm_spbu')
        //     ->select(
        //             'dt_tr_bbm_spbu.id',
        //             'dt_tr_bbm_spbu.kode',
        //             'dt_tr_bbm_spbu.tgl_bbm',
        //             'dt_tr_bbm_spbu.no_polisi',
        //             'dt_tr_bbm_spbu.liter_qty',
        //             'dt_tr_bbm_spbu.harga_perliter',
        //             'dt_tr_bbm_spbu.biaya_bbm',
        //             'dt_tr_bbm_spbu.jenis_bbm',
        //             //'dt_tr_bbm_spbu.code_branch',
        //             //'dt_tr_bbm_spbu.perusahaan',
        //             'dt_tr_bbm_spbu.id_user_input'
        //         )
        //     ->leftJoin('dt_branch', 'dt_tr_bbm_spbu.code_branch', '=', 'dt_branch.code_branch');
        //     $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_spbu.tgl_bbm', [$tanggalAwal, $tanggalAkhir]);
        //     $data['dt_bbm'] = $query->get();

        // $query = DB::table('dt_tr_bbm_spbu')
        //     ->select(
        //             DB::raw('SUM(dt_tr_bbm_spbu.biaya_bbm) as total')
        //         )
        //     ->leftJoin('dt_branch', 'dt_tr_bbm_spbu.code_branch', '=', 'dt_branch.name_branch');
        //     $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_spbu.tgl_bbm', [$tanggalAwal, $tanggalAkhir]);
        //     $data['total_biaya'] = $query->first();

        return view('app_page.bbm_saldo_spbu.index', $data);
    }

    public function create(REQUEST $request)
    {
        $data['dt_branch'] = DB::table('dt_branch')
            //->whereNotNull('code_branch')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->orderBy('name_branch', 'ASC')
            //->get();
            ->first();

        // $query = DB::table('dt_tr_bbm')
        //     ->select(
        //             DB::raw('SUM(dt_tr_bbm_spbu.biaya_bbm) as total_spbu')
        //         )
        //     ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
        //     ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
        //     ->leftJoin('dt_tr_bbm_spbu', 'dt_tr_bbm.no_polisi', '=', 'dt_tr_bbm_spbu.no_polisi');
        // $query->where('dt_branch.id', Auth::user()->branch_id)->orderBy('dt_tr_bbm_spbu.created_at', 'DESC');
        // $data['total_biaya'] = $query->first();

        $data['dt_tr_bbm_spbu'] = DB::table('dt_tr_bbm_spbu')
                ->select(DB::raw('SUM(dt_tr_bbm_spbu.biaya_bbm) as total_spbu'))
                ->join('dt_branch','dt_tr_bbm_spbu.code_branch','=','dt_branch.code_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->groupBy('dt_tr_bbm_spbu.tgl_bbm')
                ->orderBy('dt_tr_bbm_spbu.tgl_bbm', 'DESC')
                ->first();

        $data['dt_tr_bbm_spbu_saldo'] = DB::table('dt_tr_bbm_spbu_saldo')
             ->join('dt_branch','dt_tr_bbm_spbu_saldo.code_branch','dt_branch.code_branch')
             ->where('dt_branch.id', Auth::user()->branch_id)
             ->orderBy('dt_tr_bbm_spbu_saldo.created_at', 'DESC')
             ->first();

            if (!$data['dt_tr_bbm_spbu_saldo']) {
                // Kalau null, buat object dummy dengan saldo_akhir = 0
                $data['dt_tr_bbm_spbu_saldo'] = (object)[
                    'saldo_akhir' => 0
                ];
            }

        return view('app_page.bbm_saldo_spbu.create', $data);
    }

    public function store(REQUEST $request)
    {
        $tagihan = str_replace(',', '', $request->tagihan ?? 0);
        $sisa_saldo = str_replace(',', '', $request->sisa_saldo ?? 0);
        $tambah_saldo = str_replace(',', '', $request->tambah_saldo ?? 0);
        $saldo_akhir = str_replace(',', '', $request->saldo_akhir ?? 0);

        DB::table('dt_tr_bbm_spbu_saldo')->insert([
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'code_branch' => $request->penempatan,
            'perusahaan' => '',
            'tagihan' => $tagihan,
            'sisa_saldo' => $sisa_saldo,
            'top_up_saldo' => $tambah_saldo,
            'saldo_akhir' => $saldo_akhir,
            'id_user_input' =>  Auth::user()->id
        ]);

        return redirect()->route('user.bbm_saldo_spbu.view');
    }
}

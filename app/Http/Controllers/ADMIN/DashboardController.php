<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Activities_log;


class DashboardController extends Controller
{
    public function view()
    {

        // $currentDay = date('d');
        // $currentMonth = date('Y-m');

        // if ($currentDay == '27') {
        //     // Cek apakah sudah ada data yang diinsert untuk bulan ini pada tanggal 1
        //     $stnkExists = DB::table('dt_tr_stnk')
        //         ->whereDate('created_at', Carbon::today())
        //         ->exists();


        //     $kirExists = DB::table('dt_tr_kir')
        //         ->whereDate('created_at', Carbon::today())
        //         ->exists();
        //     // Jika belum ada data di kedua tabel, jalankan proses insert
        //     if (!$stnkExists && !$kirExists) {
        //         $this->insertSTNKData();
        //         $this->insertKIRData();
        //     } else {
        //         $status = 'Scheduler untuk insert data STNK dan KIR sudah dijalankan hari ini';
        //     }
        // }

        $dataConfigApp = DB::table('data_config_app')->where('id', 28)->limit(1)->first();
        $dataBranch = DB::table('dt_branch')->whereNotNull('code_branch')->get();
        $latestYear = date('Y');
        $nextMonth = Carbon::now()->addMonth()->format('m');

        // if (Auth::user()->roles == 'Superadmin') {
        // Data STNK
        $stnkNextMonth = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
            ->count();

        $stnkNewPlat = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
            ->count();

        $TotalSelesaistnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '=', 'Selesai');
            })
            ->count();

        // primary 
        $TotalPrimarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status');
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->count();

        $primarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status');
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->count();

        $primaryNewPlat = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->count();

        $TotalSelesaiPrimarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '=', 'Selesai');
            })
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->count();

        // secondary
        $TotalSecondarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status');
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->count();

        $secondarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status');
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->count();

        $secondaryNewPlat = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_stnk.status');
            })
            ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->count();

        $TotalSelesaiSecondarystnk = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_stnk.status', '=', 'Selesai');
            })
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->count();

        // Data Kir
        $twoWeeksLater = Carbon::now()->addWeeks(2)->format('Y-m-d');

        $Totalkir = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_kir.status');
            })
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();

        $TotalKirSelesai = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '=', 'Selesai');
            })
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();

        // dd($TotalKirSelesai);

        $primarykir =  DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_kir.status');
            })
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();

        $selesaiPrimarykir =  DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '=', 'Selesai');
            })
            ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();

        $secondarykir = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '!=', 'Selesai')
                    ->orWhereNull('dt_tr_kir.status');
            })
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();

        $selesaiSecondarykir = DB::table('dt_kendaraan_surat')
            ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) {
                $query->where('dt_tr_kir.status', '=', 'Selesai');
            })
            ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
            ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
            ->count();
        // } elseif (Auth::user()->roles == 'Admin') {
        // Data STNK
        // $stnkNextMonth = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
        //     ->count();

        // $stnkNewPlat = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
        //     ->count();

        // $TotalSelesaistnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '=', 'Selesai');
        //     })
        //     ->count();

        // // primary 
        // $TotalPrimarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status');
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->count();

        // $primarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status');
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->count();

        // $primaryNewPlat = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status'); // Memastikan data tetap muncul meskipun tidak ada di dt_tr_stnk
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->count();

        // $TotalSelesaiPrimarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '=', 'Selesai');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->count();

        // // secondary
        // $TotalSecondarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status');
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->count();

        // $secondarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status');
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->count();

        // $secondaryNewPlat = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_stnk.status');
        //     })
        //     ->whereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->count();

        // $TotalSelesaiSecondarystnk = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_stnk', 'dt_tr_stnk.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_stnk.status', '=', 'Selesai');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->count();

        // // Data Kir
        // $twoWeeksLater = Carbon::now()->addWeeks(2)->format('Y-m-d');

        // $Totalkir = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->count();

        // $TotalKirSelesai = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '=', 'Selesai');
        //     })
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->count();

        // // dd($TotalKirSelesai);

        // $primarykir =  DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->count();

        // $selesaiPrimarykir =  DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '=', 'Selesai');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->count();

        // $secondarykir = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->where('dt_branch.id', Auth::user()->branch_id);
        //     ->count();

        // $selesaiSecondarykir = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '=', 'Selesai');
        //     })
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->whereRaw("DATE(bulan_no_kir_1) = ?", [$twoWeeksLater])
        //     ->where('dt_branch.id', Auth::user()->branch_id);
        //     ->count();
        // //      $where('dt_kendaraan.no_polisi', 'like', '%' . $keyword . '%')
        // //     ->where('dt_branch.id', Auth::user()->branch_id);
        // }


        // dd($Totalkir);


        // $Totalkir = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->whereRaw("(MONTH(bulan_no_kir_1) = ? AND YEAR(bulan_no_kir_1) = ?)", [$nextMonth, $latestYear])
        //     ->count();

        // $primarykir =  DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->whereRaw("(MONTH(bulan_no_kir_1) = ? AND YEAR(bulan_no_kir_1) = ?)", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'PRIMARY')
        //     ->count();

        // $secondarykir = DB::table('dt_kendaraan_surat')
        //     ->leftJoin('dt_tr_kir', 'dt_tr_kir.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->leftJoin('dt_kendaraan', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
        //     ->where(function ($query) {
        //         $query->where('dt_tr_kir.status', '!=', 'Selesai')
        //             ->orWhereNull('dt_tr_kir.status');
        //     })
        //     ->whereRaw("(MONTH(bulan_no_kir_1) = ? AND YEAR(bulan_no_kir_1) = ?)", [$nextMonth, $latestYear])
        //     ->where('dt_kendaraan.kategori', '=', 'SECONDARY')
        //     ->count();

        // dd($twoWeeksLater);

        $data = [
            // 'status'                  => $status,
            'data_config_app'            => $dataConfigApp,
            'data_branch'                => $dataBranch,
            'stnkNextMonth'              => $stnkNextMonth,
            'stnkNewPlat'                => $stnkNewPlat,
            'TotalSelesaistnk'           => $TotalSelesaistnk,
            'TotalPrimarystnk'           => $TotalPrimarystnk,
            'primarystnk'                => $primarystnk,
            'primaryNewPlat'             => $primaryNewPlat,
            'TotalSelesaiPrimarystnk'    => $TotalSelesaiPrimarystnk,
            'TotalSecondarystnk'         => $TotalSecondarystnk,
            'secondarystnk'              => $secondarystnk,
            'secondaryNewPlat'           => $secondaryNewPlat,
            'TotalSelesaiSecondarystnk'  => $TotalSelesaiSecondarystnk,
            'Totalkir'                   => $Totalkir,
            'primarykir'                 => $primarykir,
            'secondarykir'               => $secondarykir,
            'TotalKirSelesai'            => $TotalKirSelesai,
            'selesaiPrimarykir'          => $selesaiPrimarykir,
            'selesaiSecondarykir'        => $selesaiSecondarykir,
        ];


        return view('app_page.administrator.dashboard', $data);
    }

    private function insertSTNKData()
    {

        $latestYear = date('Y');
        $nextMonth = Carbon::now()->addMonth()->format('m');

        // Query untuk kendaraan yang perlu perpanjangan STNK
        // Join tabel dt_kendaraan dan dt_kendaraan_surat berdasarkan no_polisi
        $vehicles = DB::table('dt_kendaraan')
            ->join('dt_kendaraan_surat', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->select(
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.name_branch',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.kategori as jenis',
                'dt_kendaraan.nama_segmen as segmen',
                'dt_kendaraan.type as tipe',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan_surat.tgl_pajak_stnk',
                'dt_kendaraan.penempatan',
                'dt_kendaraan.id_segmen',
                'dt_kendaraan.model',
                'dt_kendaraan_surat.tgl_pajak_stnk',
                'dt_kendaraan_surat.tgl_baru_stnk'
            )
            // ->where('dt_kendaraan.status_kepemilikan', 'DI JUAL')
            // ->orWhereNull('dt_kendaraan.status_kepemilikan')
            ->where(function ($query) use ($nextMonth, $latestYear) {
                $query->WhereRaw("MONTH(dt_kendaraan_surat.tgl_pajak_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_pajak_stnk) = ?", [$nextMonth, $latestYear])
                    ->orWhereRaw("MONTH(dt_kendaraan_surat.tgl_baru_stnk) = ? AND YEAR(dt_kendaraan_surat.tgl_baru_stnk) = ?", [$nextMonth, $latestYear]);
            })
            ->distinct('dt_kendaraan.no_polisi')
            ->get();

        // dd($vehicles);
        foreach ($vehicles as $vehicle) {
            // Membuat kode STNK
            $date = Carbon::now()->format('ym');
            $time = Carbon::now()->format('H:i:s');
            $ByDate = (date('Y-m'));

            $getRow = DB::table('dt_tr_stnk')->select(DB::raw('MAX(RIGHT(kode_stnk,4)) as NoUrut'))
                ->join('dt_branch', 'dt_tr_stnk.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->where(
                    'dt_tr_stnk.tanggal_stnk',
                    'like',
                    "%" . $ByDate . "%"
                );
            $rowCount = $getRow->count();

            $getkode = DB::table('dt_branch')->select('dt_branch.code_branch')->where('dt_branch.id', Auth::user()->branch_id)->first();
            $code_branch = $getkode->code_branch;

            // Generate kode STNK
            if ($rowCount > 0) {
                if ($rowCount < 9) {
                    $kode = "ST" . $code_branch . "-" . '' . $date . "00" . '' . ($rowCount + 1);
                } else if ($rowCount < 99) {
                    $kode = "ST" . $code_branch . "-" . '' . $date . "0" . '' . ($rowCount + 1);
                } else if ($rowCount < 999) {
                    $kode = "ST" . $code_branch . "-" . '' . $date . ($rowCount + 1);
                }
            } else {
                $kode = "ST" . $code_branch . "-" . '' . $date . sprintf("%03s", 1);
            }


            // Insert data ke dt_tr_stnk
            DB::table('dt_tr_stnk')->insert([
                'kode_stnk' => $kode,
                'tanggal_stnk' => Carbon::now()->format('Y-m-d'),
                'waktu_stnk' => $time,
                'no_polisi' => $vehicle->no_polisi,
                'code_branch' => $vehicle->name_branch ?? null,
                'perusahaan' => $vehicle->perusahaan ?? null,
                'jenis' => $vehicle->jenis ?? null,
                'segmen' => $vehicle->segmen ?? null,
                'tipe' => $vehicle->tipe ?? null,
                'no_rangka' => $vehicle->no_rangka ?? null,
                'no_mesin' => $vehicle->no_mesin ?? null,
                'bulan_exp_stnk' => $vehicle->bulan_exp_stnk,
                'tgl_pajak_stnk' => $vehicle->tgl_pajak_stnk,
                'tgl_baru_stnk' => $vehicle->tgl_baru_stnk,
                'biaya_stnk' => 0, // Default biaya, bisa diupdate nanti
                'status' => 'Proses',
                'id_user_input' => null, // Gunakan ID user default / system
                'created_at' => Carbon::now()
            ]);
        }
    }

    private function insertKIRData()
    {
        $latestYear = date('Y');
        $nextMonth = Carbon::now()->addMonth()->format('m');

        // Query untuk kendaraan yang perlu perpanjangan KIR
        // Join tabel dt_kendaraan dan dt_kendaraan_surat berdasarkan no_polisi
        $vehicles = DB::table('dt_kendaraan')
            ->select(
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.name_branch',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.penempatan',
                'dt_kendaraan_surat.bulan_no_kir_1',
            )
            ->leftJoin('dt_kendaraan_surat', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->where(function ($query) use ($nextMonth, $latestYear) {
                $query->WhereRaw("MONTH(dt_kendaraan_surat.bulan_no_kir_1) = ? AND YEAR(dt_kendaraan_surat.bulan_no_kir_1) = ?", [$nextMonth, $latestYear])
                    ->orWhereRaw("MONTH(dt_kendaraan_surat.bulan_no_kir_2) = ? AND YEAR(dt_kendaraan_surat.bulan_no_kir_2) = ?", [$nextMonth, $latestYear]);
            })
            ->distinct('dt_kendaraan.no_polisi')
            ->count();

        dd($vehicles);

        foreach ($vehicles as $vehicle) {
            // Membuat kode KIR
            $date = Carbon::now()->format('ym');

            $getRow = DB::table('dt_tr_kir')
                ->select(DB::raw('MAX(RIGHT(kode_kir,4)) as NoUrut'))
                ->join('dt_branch', 'dt_tr_kir.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->where('dt_tr_kir.tanggal_kir', 'like', "%" . Carbon::now()->format('Y-m') . "%");

            $rowCount = $getRow->count();

            // Generate kode KIR
            if ($rowCount > 0) {
                if ($rowCount < 9) {
                    $kode = "KR" . $code_branch . "-" . '' . $date . "00" . '' . ($rowCount + 1);
                } else if ($rowCount < 99) {
                    $kode = "KR" . $code_branch . "-" . '' . $date . "0" . '' . ($rowCount + 1);
                } else if ($rowCount < 999) {
                    $kode = "KR" . $code_branch . "-" . '' . $date . ($rowCount + 1);
                }
            } else {
                $kode = "KR" . $code_branch . "-" . '' . $date . sprintf("%03s", 1);
            }

            // Tanggal expiration
            $tgl_exp_kir = $vehicle->tgl_exp_kir ?? $vehicle->bulan_no_kir_1 ?? $vehicle->bulan_no_kir_2 ?? null;

            // Insert data ke dt_tr_kir
            DB::table('dt_tr_kir')->insert([
                'kode_kir' => $kode,
                // 'tanggal_kir' => Carbon::now()->format('Y-m-d'),
                'no_polisi' => $vehicle->no_polisi,
                // 'code_branch' => $vehicle->name_branch ?? null,
                'wilayah' => $vehicle->name_branch ?? null,
                'no_kir_1' => $vehicle->no_kir_1 ?? null,
                'no_kir_2' => $vehicle->no_kir_2 ?? null,
                'tgl_uji_kir' => Carbon::now()->format('Y-m-d'),
                'tgl_exp_kir' => $tgl_exp_kir,
                'biaya_kir' => 0, // Default biaya, bisa diupdate nanti
                'dishub' => $vehicle->dishub ?? null,
                'keterangan' => 'Perpanjangan KIR otomatis - tanggal 1 ' . Carbon::now()->format('F Y'),
                'status' => 'Proses',
                'id_user_input' => 1, // Gunakan ID user default / system
                'created_at' => Carbon::now()
            ]);
        }
    }
}

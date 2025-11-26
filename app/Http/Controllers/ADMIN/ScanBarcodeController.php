<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\carbon;
//use App\StokOpname_H;
//use App\StokOpname_D;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScanBarcodeController extends Controller
{
    public function view()
    {
        return view ('app_page.scan_barcode.index');
    }

    public function getArmadaDetail($barcode)
    {
        $armada = DB::table('dt_kendaraan')
                ->where('dt_kendaraan.no_polisi', $barcode)
                ->first();

        if ($armada) {
            return response()->json($armada);
        } else {
            return response()->json([], 404);
        }
    }

    public function store(Request $request)
{
    date_default_timezone_set('Asia/Jakarta');
    $time = now()->format('H:i:s'); 

    // Mengambil data tgl_keluar, tgl_masuk, dan keterangan berdasarkan no_pol
    $keluar = DB::table('dt_keluar_masuk')
        ->select('kode','tgl_keluar', 'tgl_masuk')
        ->where('no_pol', $request->no_pol)
        ->orderBy('kode', 'desc')
        ->limit(1)
        ->first();

        // dd($keluar->kode);
    // die;
    if ($keluar == NULL) {
        // Jika data tidak ada sama sekali, insert data keluar
        DB::table('dt_keluar_masuk')->insert([
            'no_pol' => $request->no_pol,
            'tgl_keluar' => Carbon::now()->format('Y-m-d'),
            'waktu_keluar' => $time,
            'id_user_input' => Auth::user()->id,
        ]);
    } elseif ($keluar->tgl_keluar != null && $keluar->tgl_masuk ==  null) {
        // Jika tgl_keluar sudah ada, tetapi tgl_masuk belum ada, update tgl_masuk
        DB::table('dt_keluar_masuk')
            ->where('no_pol', $request->no_pol)
            ->where('kode', $keluar->kode)
            ->update([
                'tgl_masuk' => Carbon::now()->format('Y-m-d'),
                'waktu_masuk' => $time,
                'id_user_input' => Auth::user()->id,
                'keterangan' => 'selesai',
            ]);
    } else {
        // Jika kedua tgl_keluar dan tgl_masuk sudah terisi, insert data baru
        DB::table('dt_keluar_masuk')->insert([
            'no_pol' => $request->no_pol,
            'tgl_keluar' => Carbon::now()->format('Y-m-d'),
            'waktu_keluar' => $time,
            'id_user_input' => Auth::user()->id,
        ]);
    }

    $output = [
        'msg'  => 'Data Berhasil disimpan',
        'res'  => true,
        'type' => 'success'
    ];
    
    return redirect()->route('admin.barcode_sca n.view');
    return response()->json($output, 200);
}

}

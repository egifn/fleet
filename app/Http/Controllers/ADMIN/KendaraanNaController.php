<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class KendaraanNaController extends Controller
{
    public function view()
    {
        $limit = 20;
        $data['dt_kendaraan'] = DB::table('dt_kendaraan')
            ->join('dt_branch','dt_kendaraan.penempatan','=','dt_branch.code_branch')
            ->leftJoin('dt_segmen','dt_kendaraan.id_segmen','=','dt_segmen.id')
            ->select('dt_kendaraan.id','dt_kendaraan.no_polisi','dt_kendaraan.no_rangka','dt_kendaraan.no_mesin','dt_kendaraan.nama_pemilik','dt_kendaraan.merek',
            'dt_kendaraan.type','dt_branch.name_branch','dt_kendaraan.rasio_ideal','dt_kendaraan.model','dt_kendaraan.tahun','dt_kendaraan.warna','dt_kendaraan.kapasitas_mesin','dt_kendaraan.kategori','dt_kendaraan.penempatan',
            'dt_kendaraan.perusahaan','dt_kendaraan.id_segmen','dt_segmen.nama_segmen','dt_kendaraan.status_kendaraan','dt_kendaraan.status_kepemilikan','dt_kendaraan.keterangan')
            ->whereIn('dt_kendaraan.status_kendaraan', ['DI JUAL','JUAL'])
            ->limit($limit)
            ->get();

        return view('app_page.administrator.kendaraan_na',$data);
    }

    public function kendaraan_na_excel(Request $request)
    {
        $limit = 20;
        $data['dt_kendaraan_excel'] = DB::table('dt_kendaraan')
            ->join('dt_branch','dt_kendaraan.penempatan','=','dt_branch.code_branch')
            ->leftJoin('dt_segmen','dt_kendaraan.id_segmen','=','dt_segmen.id')
            ->select('dt_kendaraan.id','dt_kendaraan.no_polisi','dt_kendaraan.no_rangka','dt_kendaraan.no_mesin','dt_kendaraan.nama_pemilik','dt_kendaraan.merek',
            'dt_kendaraan.type','dt_branch.name_branch','dt_kendaraan.rasio_ideal','dt_kendaraan.model','dt_kendaraan.tahun','dt_kendaraan.warna','dt_kendaraan.kapasitas_mesin','dt_kendaraan.kategori','dt_kendaraan.penempatan',
            'dt_kendaraan.perusahaan','dt_kendaraan.id_segmen','dt_segmen.nama_segmen','dt_kendaraan.status_kendaraan','dt_kendaraan.status_kepemilikan','dt_kendaraan.keterangan')
            ->whereIn('dt_kendaraan.status_kendaraan', ['DI JUAL','JUAL'])
            ->limit($limit)
            ->get();
        
        return view('app_page.administrator.kendaraan_na_excel',$data);
    }
    
}

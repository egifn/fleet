<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class KendaraanController extends Controller
{
    public function view()
    {
        $data['dt_branch']  =  DB::table('dt_branch')->whereNotNull('code_branch')->get();

        //$limit = 20;
        $data['dt_kendaraan'] = DB::table('dt_kendaraan')
            ->leftjoin('dt_branch', 'dt_kendaraan.penempatan', '=', 'dt_branch.code_branch')
            ->leftJoin('dt_segmen', 'dt_kendaraan.id_segmen', '=', 'dt_segmen.id')
            ->select(
                'dt_kendaraan.id',
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan.nama_pemilik',
                'dt_kendaraan.merek',
                'dt_kendaraan.type',
                'dt_branch.name_branch',
                'dt_kendaraan.rasio_ideal',
                'dt_kendaraan.model',
                'dt_kendaraan.tahun',
                'dt_kendaraan.warna',
                'dt_kendaraan.kapasitas_mesin',
                'dt_kendaraan.kategori',
                'dt_kendaraan.penempatan',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.id_segmen',
                'dt_segmen.nama_segmen',
                'dt_kendaraan.status_kendaraan',
                'dt_kendaraan.status_kepemilikan',
                'dt_kendaraan.keterangan'
            )
            //->whereNotIn('dt_kendaraan.status_kendaraan', ['DI JUAL', 'JUAL'])
            //->limit($limit)
            ->get();

        return view('app_page.administrator.kendaraan', $data);
    }

    public function master_tank()
    {
        $data['dt_branch']  =  DB::table('dt_branch')->whereNotNull('code_branch')->get();

        //$limit = 20;
        $data['dt_kendaraan'] = DB::table('dt_kendaraan')
            ->join('dt_branch', 'dt_kendaraan.penempatan', '=', 'dt_branch.code_branch')
            ->leftJoin('dt_segmen', 'dt_kendaraan.id_segmen', '=', 'dt_segmen.id')
            ->select(
                'dt_kendaraan.id',
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan.nama_pemilik',
                'dt_kendaraan.merek',
                'dt_kendaraan.type',
                'dt_branch.name_branch',
                'dt_kendaraan.rasio_ideal',
                'dt_kendaraan.model',
                'dt_kendaraan.tahun',
                'dt_kendaraan.warna',
                'dt_kendaraan.kapasitas_mesin',
                'dt_kendaraan.kapasitas_tanki',
                'dt_kendaraan.kategori',
                'dt_kendaraan.penempatan',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.id_segmen',
                'dt_segmen.nama_segmen',
                'dt_kendaraan.status_kendaraan',
                'dt_kendaraan.status_kepemilikan',
                'dt_kendaraan.keterangan',
                'dt_kendaraan.kapasitas_tanki'
            )
            ->whereNotIn('dt_kendaraan.status_kendaraan', ['DI JUAL', 'JUAL'])
            ->where('dt_kendaraan.kapasitas_tanki', '!=', 0)
            //->limit($limit)
            ->get();

        return view('app_page.administrator.master_tank', $data);
    }

    public function insert(REQUEST $request)
    {
        # data in this process 
        $data_kendaraan['no_polisi']        = $request->no_polisi;
        $data_kendaraan['no_rangka']        = $request->no_rangka;
        $data_kendaraan['no_mesin']         = $request->no_mesin;
        $data_kendaraan['nama_pemilik']     = $request->nama_pemilik;
        $data_kendaraan['merek']            = $request->merek;
        $data_kendaraan['type']             = $request->type;
        $data_kendaraan['rasio_ideal']      = $request->rasio_ideal;
        $data_kendaraan['model']            = $request->model;
        $data_kendaraan['tahun']            = $request->tahun;
        $data_kendaraan['warna']            = $request->warna;
        $data_kendaraan['kapasitas_mesin']  = $request->kapasitas_mesin;
        $data_kendaraan['kategori']         = $request->kategori;
        $data_kendaraan['penempatan']       = $request->penempatan;
        $data_kendaraan['id_segmen']        = $request->id_segmen;
        $data_kendaraan['perusahaan']       = $request->perusahaan;
        $data_kendaraan['status_kendaraan'] = $request->status_kendaraan;
        $data_kendaraan['status_kepemilikan'] = $request->status_kepemilikan;
        $data_kendaraan['kode_vendor']      = $request->vendor;
        $data_kendaraan['keterangan']       = $request->keterangan;

        $data = json_encode($data_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan')->insert([
            'no_polisi'         => $request->no_polisi,
            'no_rangka'         => $request->no_rangka,
            'no_mesin'          => $request->no_mesin,
            'nama_pemilik'      => $request->nama_pemilik,
            'merek'             => $request->merek,
            'type'              => $request->type,
            'rasio_ideal'       => $request->rasio_ideal,
            'model'             => $request->model,
            'tahun'             => $request->tahun,
            'warna'             => $request->warna,
            'kapasitas_mesin'   => $request->kapasitas_mesin,
            'kategori'          => $request->kategori,
            'penempatan'        => $request->penempatan,
            'perusahaan'        => $request->perusahaan,
            'id_segmen'         => $request->id_segmen,
            'status_kendaraan'  => $request->status_kendaraan,
            'status_kepemilikan'  => $request->status_kepemilikan,
            'kode_vendor'       => $request->vendor,
            'keterangan'        => $request->keterangan,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data berhasil insert');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data gagal insert');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.kendaraan.view');
    }

    public function update(REQUEST $request)
    {
        # data in this process 
        $data_kendaraan['no_polisi']        = $request->no_polisi_upate;
        $data_kendaraan['no_rangka']        = $request->no_rangka_upate;
        $data_kendaraan['no_mesin']         = $request->no_mesin_upate;
        $data_kendaraan['nama_pemilik']     = $request->nama_pemilik_upate;
        $data_kendaraan['merek']            = $request->merek_upate;
        $data_kendaraan['type']             = $request->type_upate;
        $data_kendaraan['rasio_ideal']      = $request->rasio_ideal_upate;
        $data_kendaraan['model']            = $request->model_upate;
        $data_kendaraan['tahun']            = $request->tahun_upate;
        $data_kendaraan['warna']            = $request->warna_upate;
        $data_kendaraan['kapasitas_mesin']  = $request->kapasitas_mesin_upate;
        $data_kendaraan['kategori']         = $request->kategori_upate;
        $data_kendaraan['penempatan']       = $request->penempatan_upate;
        $data_kendaraan['id_segmen']        = $request->id_segmen_upate;
        $data_kendaraan['perusahaan']       = $request->perusahaan_upate;
        $data_kendaraan['status_kendaraan'] = $request->status_kendaraan_upate;
        $data_kendaraan['status_kepemilikan'] = $request->status_kepemilikan_upate;
        $data_kendaraan['keterangan']       = $request->keterangan_upate;

        $data = json_encode($data_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan')->where('id', $request->id_upate)->update([
            'no_polisi'         => $request->no_polisi_upate,
            'no_rangka'         => $request->no_rangka_upate,
            'no_mesin'          => $request->no_mesin_upate,
            'nama_pemilik'      => $request->nama_pemilik_upate,
            'merek'             => $request->merek_upate,
            'type'              => $request->type_upate,
            'rasio_ideal'       => $request->rasio_ideal_upate,
            'model'             => $request->model_upate,
            'tahun'             => $request->tahun_upate,
            'warna'             => $request->warna_upate,
            'kapasitas_mesin'   => $request->kapasitas_mesin_upate,
            'kategori'          => $request->kategori_upate,
            'penempatan'        => $request->penempatan_upate,
            'perusahaan'        => $request->perusahaan_upate,
            'id_segmen'         => $request->id_segmen_upate,
            'status_kendaraan'  => $request->status_kendaraan_upate,
            'status_kepemilikan'  => $request->status_kepemilikan_upate,
            'keterangan'        => $request->keterangan_upate,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('update data_kendaraan', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.kendaraan.view');
    }

    public function update_add_tank(REQUEST $request)
    {
        # data in this process 
        $data_kendaraan['no_polisi']        = $request->no_polisi_upate;
        $data_kendaraan['kapasitas_tanki']  = $request->kapasitas_tank_add;

        $data = json_encode($data_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan')->where('id', $request->id_kendaraan)->update([
            'kapasitas_tanki' => $request->kapasitas_tank_add,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('update Kapasitas Tank', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('update Kapasitas Tank', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------

        return redirect()->route('admin.kendaraan.master_tank');
    }

    public function update_tank(REQUEST $request)
    {
        # data in this process 
        $data_kendaraan['no_polisi']        = $request->no_polisi_upate;
        $data_kendaraan['kapasitas_tanki']  = $request->kapasitas_tank;

        $data = json_encode($data_kendaraan);

        # Simpan Ke database
        $action = DB::table('dt_kendaraan')->where('id', $request->id_upate)->update([
            'kapasitas_tanki' => $request->kapasitas_tank,
        ]);

        # data in this process 
        # ------------------------- Cek Action ------------------------- 
        if ($action) {
            # Activities_log
            $status = "success";
            Activities_log::addToLog('update Kapasitas Tank', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data berhasil update');
        } else {
            # Activities_log
            $status = "failed";
            Activities_log::addToLog('update Kapasitas Tank', $data, $status);
            # sweetalert2 success
            Session::flash('message', 'Data gagal update');
        }
        # ------------------------- Cek Action End -------------------------
        return redirect()->route('admin.kendaraan.master_tank');
    }

    public function view_excel(Request $request)
    {
        $limit = 20;
        $data['dt_kendaraan_excel'] = DB::table('dt_kendaraan')
            ->join('dt_branch', 'dt_kendaraan.penempatan', '=', 'dt_branch.code_branch')
            ->leftJoin('dt_segmen', 'dt_kendaraan.id_segmen', '=', 'dt_segmen.id')
            ->select(
                'dt_kendaraan.id',
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan.nama_pemilik',
                'dt_kendaraan.merek',
                'dt_kendaraan.type',
                'dt_branch.name_branch',
                'dt_kendaraan.rasio_ideal',
                'dt_kendaraan.model',
                'dt_kendaraan.tahun',
                'dt_kendaraan.warna',
                'dt_kendaraan.kapasitas_mesin',
                'dt_kendaraan.kategori',
                'dt_kendaraan.penempatan',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.id_segmen',
                'dt_segmen.nama_segmen',
                'dt_kendaraan.status_kendaraan',
                'dt_kendaraan.status_kepemilikan',
                'dt_kendaraan.keterangan'
            )
            ->whereNotIn('dt_kendaraan.status_kendaraan', ['DI JUAL', 'JUAL'])
            ->limit($limit)
            ->get();

        return view('app_page.administrator.kendaraan_excel', $data);
    }
}

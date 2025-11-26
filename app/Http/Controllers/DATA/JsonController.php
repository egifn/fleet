<?php

namespace App\Http\Controllers\DATA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Activities_log;
use Carbon\Carbon;

class JsonController extends Controller
{
    public function data_users(REQUEST $request)
    {
        $keyword = ($request->keyword) ? $request->keyword : '';
        # START QUERY USER
        $query = DB::table('users')
            ->join('dt_branch', 'users.branch_id', '=', 'dt_branch.id')
            ->select(
                'dt_branch.name_branch',
                'users.id',
                'users.code_employee',
                'users.name',
                'users.email',
                'users.roles',
                'users.branch_id',
                'users.status_account',
                'users.last_login',
                'users.created_at',
                'users.updated_at',
            )
            ->orderBy('users.last_login', 'DESC');
        if ($keyword == '') {
            //$query->limit(10);
        } else {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $data = $query->get();

        $count = ($query->count() == 0) ? 0 : $data->count();
        # END QUERY USER

        # CUSTOME
        foreach ($data as $value) {
            $data_al['id']                        = $value->id;
            $data_al['code_employee']             = $value->code_employee;
            $data_al['name']                      = $value->name;
            $data_al['email']                     = $value->email;
            $data_al['roles']                     = $value->roles;
            $data_al['branch_id']                 = $value->branch_id;
            $data_al['name_branch']               = $value->name_branch;
            $data_al['status_account']            = $value->status_account;
            $data_al['last_login']                = $value->last_login;
            $data_al['created_at']                = $value->created_at;
            $data_al['updated_at']                = $value->updated_at;
            $data_al['attributes_status_account'] = ($value->status_account == 'Aktif') ? 'checked' : '';

            $data_result[] = $data_al;
        }

        # CREATE DATA JSON
        if (isset($data_result)) {
            return response()->json([
                'status'  => true,
                'message' => 'success',
                'count'   => $count,
                'data'    => $data_result
            ]);
        } else {
            return response()->json([
                'status'  => true,
                'message' => 'success',
                'count'   => 0,
                'data'    => []
            ]);
        }
    }
    public function data_users_details(REQUEST $request)
    {
        $query = DB::table('users')
            ->join('dt_branch', 'users.branch_id', '=', 'dt_branch.id')
            ->select(
                'dt_branch.name_branch',
                'users.id',
                'users.code_employee',
                'users.name',
                'users.email',
                'users.roles',
                'users.branch_id',
                'users.status_account',
                'users.last_login',
                'users.created_at',
                'users.updated_at',
            )->where('users.id', $request->id)
            ->first();
        # CREATE DATA JSON
        if (isset($query)) {
            return response()->json([
                'status'  => true,
                'message' => 'success',
                'data'    => $query
            ]);
        } else {
            return response()->json([
                'status'  => true,
                'message' => 'success',
                'data'    => null
            ]);
        }
    }
    public function data_branch(REQUEST $request)
    {
        # START QUERY
        $data  =  DB::table('dt_branch')->whereNotNull('code_branch')->get();
        $count =  DB::table('dt_branch')->whereNotNull('code_branch')->count();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'count'   => $count,
            'data'    => $data
        ]);
    }

    public function data_segmen(REQUEST $request)
    {
        $data = DB::table('dt_segmen')->get();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $data
        ]);
    }

    public function data_segmen_kendaraan(REQUEST $request)
    {
        $data = DB::table('dt_segmen_kendaraan')->get();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $data
        ]);
    }

    public function data_kendaraan(REQUEST $request)
    {
        $keyword = ($request->search) ? $request->search : '';

        $latestYear = date('Y');
        $nextMonth = Carbon::now()->addMonth()->format('m');

        $data = DB::table('dt_kendaraan')
            ->leftJoin('dt_kendaraan_kategori', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_kategori.no_polisi')
            ->leftJoin('dt_segmen', 'dt_kendaraan_kategori.id_segmen', '=', 'dt_segmen.id')
            ->leftJoin('dt_ritase', 'dt_segmen.id', '=', 'dt_ritase.id_segmen_rit')
            ->leftJoin('dt_segmen_kendaraan', 'dt_kendaraan_kategori.id_segmen_kendaraan', '=', 'dt_segmen_kendaraan.id')
            ->leftJoin('dt_branch', 'dt_kendaraan.penempatan', 'dt_branch.code_branch')
            ->leftjoin('dt_kendaraan_surat', 'dt_kendaraan.no_polisi', '=', 'dt_kendaraan_surat.no_polisi')
            ->select(
                'dt_kendaraan.id',
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.merek',
                'dt_kendaraan.type',
                'dt_kendaraan.penempatan',
                'dt_branch.name_branch',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan.nama_pemilik',
                'dt_kendaraan.warna',
                'dt_kendaraan.tahun',
                'dt_kendaraan.kapasitas_mesin',
                'dt_kendaraan.kategori',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.rasio_ideal',
                'dt_kendaraan_kategori.muatan',
                'dt_kendaraan_kategori.id_segmen',
                'dt_segmen.nama_segmen',
                'dt_kendaraan_kategori.kapasitas_muatan',
                'dt_kendaraan.id_segmen',
                'dt_kendaraan_kategori.kategori as kendaraan_kategori',
                'dt_kendaraan.status_kendaraan',
                'dt_ritase.ritase',
                'dt_ritase.vol_ideal',
                'dt_kendaraan_surat.bulan_exp_stnk',
                'dt_kendaraan_surat.tgl_pajak_stnk',
                'dt_kendaraan_surat.tgl_baru_stnk',
                'dt_kendaraan_surat.bulan_no_kir_1',
                'dt_kendaraan_surat.bulan_no_kir_2',
                'dt_kendaraan_surat.masa_berlaku_kir',
                'dt_kendaraan_surat.no_kontrol_kir',
                'dt_kendaraan_surat.status_kir',
                'dt_kendaraan.kapasitas_tanki'
            )
            ->groupBy(
                'dt_kendaraan.id',
                'dt_kendaraan.no_polisi',
                'dt_kendaraan.merek',
                'dt_kendaraan.type',
                'dt_kendaraan.penempatan',
                'dt_branch.name_branch',
                'dt_kendaraan.no_rangka',
                'dt_kendaraan.no_mesin',
                'dt_kendaraan.nama_pemilik',
                'dt_kendaraan.warna',
                'dt_kendaraan.tahun',
                'dt_kendaraan.kapasitas_mesin',
                'dt_kendaraan.kategori',
                'dt_kendaraan.perusahaan',
                'dt_kendaraan.rasio_ideal',
                'dt_kendaraan_kategori.muatan',
                'dt_kendaraan_kategori.id_segmen',
                'dt_segmen.nama_segmen',
                'dt_kendaraan_kategori.kapasitas_muatan',
                'dt_kendaraan.id_segmen',
                'dt_kendaraan_kategori.kategori',
                'dt_kendaraan.status_kendaraan',
                'dt_ritase.ritase',
                'dt_ritase.vol_ideal',
                'dt_kendaraan_surat.bulan_exp_stnk',
                'dt_kendaraan_surat.tgl_pajak_stnk',
                'dt_kendaraan_surat.tgl_baru_stnk',
                'dt_kendaraan_surat.bulan_no_kir_1',
                'dt_kendaraan_surat.bulan_no_kir_2',
                'dt_kendaraan_surat.masa_berlaku_kir',
                'dt_kendaraan_surat.no_kontrol_kir',
                'dt_kendaraan_surat.status_kir',
                'kapasitas_tanki'
            );

        if (Auth::user()->roles == 'Superadmin') {
            if ($keyword == '') {
            } else {
                $data->where('dt_kendaraan.no_polisi', 'like', '%' . $keyword . '%');
                //->orWhere('email', 'like', '%' . $keyword . '%');
            }
        } elseif (Auth::user()->roles == 'Admin') {
            if ($keyword == '') {
                $data->where('dt_branch.id', Auth::user()->branch_id);
            } else {
                $data->where('dt_kendaraan.no_polisi', 'like', '%' . $keyword . '%')
                    ->where('dt_branch.id', Auth::user()->branch_id);
                //->orWhere('email', 'like', '%' . $keyword . '%');
            }
        }

        $data = $data->get();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $data
        ]);
    }

    public function data_forklift(REQUEST $request)
    {
        $keyword = ($request->search) ? $request->search : '';

        $data = DB::table('dt_forklift')
            ->leftJoin('dt_branch', 'dt_forklift.penempatan', 'dt_branch.code_branch')
            ->select(
                'dt_forklift.id',
                'dt_forklift.no_forklift',
                'dt_forklift.merek',
                'dt_forklift.daya_angkut',
                'dt_forklift.penempatan',
                'dt_branch.name_branch',
                'dt_forklift.perusahaan'
            );
        if ($keyword == '') {
        } else {
            $data->where('dt_forklift.no_forklift', 'like', '%' . $keyword . '%');
            //->orWhere('email', 'like', '%' . $keyword . '%');
        }

        $data = $data->get();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'data'    => $data
        ]);
    }

    public function data_bbm(REQUEST $request)
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data = DB::table('dt_bbm')
                //->join('dt_branch', 'dt_bbm.code_branch', '=', 'dt_branch.code_branch')
                ->get();
        } elseif (Auth::user()->roles == 'Admin') {
            $data = DB::table('dt_bbm')
                //->join('dt_branch', 'dt_bbm.code_branch', '=', 'dt_branch.code_branch')
                //->where('dt_branch.id', Auth::user()->branch_id)
                ->get();
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    public function data_vendor(REQUEST $request)
    {
        $data = DB::table('dt_vendor')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }
}

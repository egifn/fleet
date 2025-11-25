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

class BbmController extends Controller
{
    public function view()
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data['dt_bbm'] = DB::table('dt_tr_bbm')
                ->select(
                    'dt_tr_bbm.id',
                    'dt_tr_bbm.kode_bbm',
                    'dt_tr_bbm.tanggal_bbm',
                    'dt_tr_bbm.waktu_bbm',
                    'dt_tr_bbm.no_polisi',
                    'dt_tr_bbm.code_branch',
                    'dt_tr_bbm.perusahaan',
                    'dt_tr_bbm.week',
                    'dt_tr_bbm.salesman',
                    'dt_tr_bbm.segmen',
                    'dt_tr_bbm.tipe',
                    'dt_tr_bbm.jenis_bbm',
                    'dt_tr_bbm.harga_perliter',
                    'dt_tr_bbm.liter_qty',
                    'dt_tr_bbm.biaya_bbm',
                    'dt_tr_bbm.kilometer',
                    'dt_tr_bbm.ratio_actual',
                    'dt_tr_bbm.ratio_ideal',
                    'dt_tr_bbm.keterangan_bbm',
                    'dt_tr_bbm.no_vocer',
                    'dt_tr_bbm.id_user_input',
                    'dt_file_upload.kode',
                    'dt_file_upload.description',
                    'dt_file_upload.filename'
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->orderby('dt_tr_bbm.tanggal_bbm', 'desc')
                ->get();
        } else {
            $data['dt_bbm'] = DB::table('dt_tr_bbm')
                ->select(
                    'dt_tr_bbm.id',
                    'dt_tr_bbm.kode_bbm',
                    'dt_tr_bbm.tanggal_bbm',
                    'dt_tr_bbm.waktu_bbm',
                    'dt_tr_bbm.no_polisi',
                    'dt_tr_bbm.code_branch',
                    'dt_tr_bbm.perusahaan',
                    'dt_tr_bbm.week',
                    'dt_tr_bbm.salesman',
                    'dt_tr_bbm.segmen',
                    'dt_tr_bbm.tipe',
                    'dt_tr_bbm.jenis_bbm',
                    'dt_tr_bbm.harga_perliter',
                    'dt_tr_bbm.liter_qty',
                    'dt_tr_bbm.biaya_bbm',
                    'dt_tr_bbm.kilometer',
                    'dt_tr_bbm.ratio_actual',
                    'dt_tr_bbm.ratio_ideal',
                    'dt_tr_bbm.keterangan_bbm',
                    'dt_tr_bbm.no_vocer',
                    'dt_tr_bbm.id_user_input',
                    'dt_file_upload.kode',
                    'dt_file_upload.description',
                    'dt_file_upload.filename'
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->orderby('dt_tr_bbm.tanggal_bbm', 'desc')
                ->get();
        }


        return view('app_page.bbm.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.bbm.create');
    }

    public function getkm(REQUEST $request)
    {
        $data = DB::table('dt_tr_bbm')
            ->select('kilometer')
            ->where('no_polisi', $request->cari_nopol)
            ->where('status_voucher', 'Selesai')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->first();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);

        
    }

    public function insert(REQUEST $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = (now()->format('H:i:s'));

        $date = (date('dmy'));
        $getRow = DB::table('dt_tr_bbm')->select(DB::raw('MAX(RIGHT(kode_bbm,4)) as NoUrut'))
            ->where('kode_bbm', 'like', "%" . $date . "%");
        $rowCount = $getRow->count();

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                $kode = "BM" . '' . "-" . '' . $date . "000" . '' . ($rowCount + 1);
            } else if ($rowCount < 99) {
                $kode = "BM" . '' . "-" . '' . $date . "00" . '' . ($rowCount + 1);
            } else if ($rowCount < 999) {
                $kode = "BM" . '' . "-" . '' . $date . "0" . '' . ($rowCount + 1);
            } else if ($rowCount < 9999) {
                $kode = "BM" . '' . "-" . '' . $date . ($rowCount + 1);
            }
        } else {
            $kode = "BM" . '' . "-" . '' . $date . sprintf("%04s", 1);
        }

        DB::table('dt_tr_bbm')->insert([
            'kode_bbm' => $kode,
            'tanggal_bbm' => Carbon::now()->format('Y-m-d'),
            'waktu_bbm' => $time,
            'no_polisi' => $request->no_polisi,
            'code_branch' => $request->depo,
            'perusahaan' => $request->wilayah,
            'week' => $request->week,
            'salesman' => $request->salesman,
            'segmen' => $request->segmen,
            'tipe' => $request->tipe,
            'jenis_bbm' => $request->jenis_bbm,
            'harga_perliter' => $request->harga_perliter,
            'liter_qty' => $request->liter_qty,
            'biaya_bbm' => str_replace(",", "", $request->biaya_bbm),
            'kilometer' => $request->kilometer,
            'ratio_actual' => $request->ratio_aktual_temp,
            'ratio_ideal' => $request->ratio_ideal,
            'keterangan_bbm' => $request->keterangan_bbm,
            'no_vocer' => $request->no_vocer,
            'id_user_input' => Auth::user()->id
        ]);

        if ($request->hasfile('file_upload')) {
            foreach ($request->file('file_upload') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
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
        } else {
            echo 'Gagal';
        }

        if (Auth::user()->roles == 'Superadmin') {
            return redirect()->route('admin.bbm.view');
        } elseif (Auth::user()->roles == 'Admin') {
            return redirect()->route('user.bbm.view');
        }
    }

    public function view_excel(Request $request)
    {
        $data['dt_bbm_excel'] = DB::table('dt_tr_bbm')
        ->select(
            'dt_tr_bbm.id',
            'dt_tr_bbm.kode_bbm',
            'dt_tr_bbm.tanggal_bbm',
            'dt_tr_bbm.waktu_bbm',
            'dt_tr_bbm.no_polisi',
            'dt_tr_bbm.code_branch',
            'dt_tr_bbm.perusahaan',
            'dt_tr_bbm.week',
            'dt_tr_bbm.salesman',
            'dt_tr_bbm.segmen',
            'dt_tr_bbm.tipe',
            'dt_tr_bbm.jenis_bbm',
            'dt_tr_bbm.harga_perliter',
            'dt_tr_bbm.liter_qty',
            'dt_tr_bbm.biaya_bbm',
            'dt_tr_bbm.kilometer',
            'dt_tr_bbm.ratio_actual',
            'dt_tr_bbm.ratio_ideal',
            'dt_tr_bbm.file_attachment',
            'dt_tr_bbm.file_attachment_bukti',
            'dt_tr_bbm.status_voucher',
            'dt_tr_bbm.keterangan_bbm',
            'dt_tr_bbm.no_vocer',
            'dt_tr_bbm.id_user_input',
            'dt_tr_bbm.expired',
            'dt_file_upload.kode',
            'dt_file_upload.description',
            'dt_file_upload.filename',
            'dt_branch.address_branch',
            'dt_branch.company_branch',
            DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
        )
        ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
        ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
        ->where('file_attachment', null)
        ->where('dt_branch.id', Auth::user()->branch_id)
       // ->where('status_voucher', 'Aktif')
        ->orderBy('id', 'desc')
        ->get();

        return view('app_page.bbm.view_excel', $data);
    }
}

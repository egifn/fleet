<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class StnkController extends Controller
{
    public function view()
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data['dt_stnk'] = DB::table('dt_tr_stnk')
                ->select(
                    'dt_tr_stnk.id',
                    'dt_tr_stnk.kode_stnk',
                    'dt_tr_stnk.tanggal_stnk',
                    'dt_tr_stnk.waktu_stnk',
                    'dt_tr_stnk.no_polisi',
                    'dt_tr_stnk.code_branch',
                    'dt_tr_stnk.perusahaan',
                    'dt_tr_stnk.jenis',
                    'dt_tr_stnk.segmen',
                    'dt_tr_stnk.tipe',
                    'dt_tr_stnk.no_rangka',
                    'dt_tr_stnk.no_mesin',
                    'dt_tr_stnk.bulan_exp_stnk',
                    'dt_tr_stnk.tgl_pajak_stnk',
                    'dt_tr_stnk.tgl_baru_stnk',
                    'dt_tr_stnk.biaya_stnk',
                    'dt_tr_stnk.id_user_input'
                )
                ->where('dt_tr_stnk.status', 'Proses')
                ->get();

            $data['dt_stnk_selesai'] = DB::table('dt_tr_stnk')
                ->select(
                    'dt_tr_stnk.id',
                    'dt_tr_stnk.kode_stnk',
                    'dt_tr_stnk.tanggal_stnk',
                    'dt_tr_stnk.waktu_stnk',
                    'dt_tr_stnk.no_polisi',
                    'dt_tr_stnk.code_branch',
                    'dt_tr_stnk.perusahaan',
                    'dt_tr_stnk.jenis',
                    'dt_tr_stnk.segmen',
                    'dt_tr_stnk.tipe',
                    'dt_tr_stnk.no_rangka',
                    'dt_tr_stnk.no_mesin',
                    'dt_tr_stnk.bulan_exp_stnk',
                    'dt_tr_stnk.tgl_pajak_stnk',
                    'dt_tr_stnk.tgl_baru_stnk',
                    'dt_tr_stnk.biaya_stnk',
                    'dt_tr_stnk.id_user_input'
                )
                ->where('dt_tr_stnk.status', 'Selesai')
                ->get();
        } else {
            $data['dt_stnk'] = DB::table('dt_tr_stnk')
                ->select(
                    'dt_tr_stnk.id',
                    'dt_tr_stnk.kode_stnk',
                    'dt_tr_stnk.tanggal_stnk',
                    'dt_tr_stnk.waktu_stnk',
                    'dt_tr_stnk.no_polisi',
                    'dt_tr_stnk.code_branch',
                    'dt_tr_stnk.perusahaan',
                    'dt_tr_stnk.jenis',
                    'dt_tr_stnk.segmen',
                    'dt_tr_stnk.tipe',
                    'dt_tr_stnk.no_rangka',
                    'dt_tr_stnk.no_mesin',
                    'dt_tr_stnk.bulan_exp_stnk',
                    'dt_tr_stnk.tgl_pajak_stnk',
                    'dt_tr_stnk.tgl_baru_stnk',
                    'dt_tr_stnk.biaya_stnk',
                    'dt_tr_stnk.id_user_input'
                )
                ->join('dt_branch', 'dt_tr_stnk.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_tr_stnk.status', 'Proses')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->get();

            $data['dt_stnk_selesai'] = DB::table('dt_tr_stnk')
                ->select(
                    'dt_tr_stnk.id',
                    'dt_tr_stnk.kode_stnk',
                    'dt_tr_stnk.tanggal_stnk',
                    'dt_tr_stnk.waktu_stnk',
                    'dt_tr_stnk.no_polisi',
                    'dt_tr_stnk.code_branch',
                    'dt_tr_stnk.perusahaan',
                    'dt_tr_stnk.jenis',
                    'dt_tr_stnk.segmen',
                    'dt_tr_stnk.tipe',
                    'dt_tr_stnk.no_rangka',
                    'dt_tr_stnk.no_mesin',
                    'dt_tr_stnk.bulan_exp_stnk',
                    'dt_tr_stnk.tgl_pajak_stnk',
                    'dt_tr_stnk.tgl_baru_stnk',
                    'dt_tr_stnk.biaya_stnk',
                    'dt_tr_stnk.id_user_input'
                )
                ->join('dt_branch', 'dt_tr_stnk.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_tr_stnk.status', 'Selesai')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->get();
        }

        return view('app_page.stnk.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.stnk.create');
    }

    public function insert(REQUEST $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = (now()->format('H:i:s'));

        $ByDate = (date('Y-m'));
        $date = (date('dmy'));

        $getRow = DB::table('dt_tr_stnk')
            ->select('*')
            ->get();
        $rowCount = $getRow->count();

        $getkode = DB::table('dt_branch')->select('dt_branch.code_branch')->where('dt_branch.id', Auth::user()->branch_id)->first();
        $code_branch = $getkode->code_branch;

        // dd($rowCount);
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


        DB::table('dt_tr_stnk')->insert([
            'kode_stnk' => $kode,
            'tanggal_stnk' => Carbon::now()->format('Y-m-d'),
            'waktu_stnk' => $time,
            'no_polisi' => $request->no_polisi,
            'code_branch' => $request->depo,
            'perusahaan' => $request->wilayah,
            'jenis' => $request->jenis,
            'segmen' => $request->segmen,
            'tipe' => $request->tipe,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'bulan_exp_stnk' => $request->bulan_exp_stnk,
            'tgl_pajak_stnk' => $request->stnk,
            'tgl_baru_stnk' => $request->plat,
            'biaya_stnk' => $request->biaya_sntk,
            'status' => 'Proses',
            'id_user_input' => Auth::user()->id
        ]);

        if (Auth::user()->roles == 'Superadmin') {
            return redirect()->route('admin.stnk.view');
        } elseif (Auth::user()->roles == 'Admin') {
            return redirect()->route('user.stnk.view');
        }
    }

    public function saveattachment(Request $request)
    {
        // Simpan file ke server
        $file = $request->file('file_attachment');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/attachments/';
        $file->move(public_path($filePath), $filename);

        // Update database
        DB::table('dt_tr_stnk')
            ->where('kode_stnk', $request->kode_stnk)
            ->update([
                'file_attachment' => $filePath . $filename,
                'status' => 'Selesai'
                // 'keterangan_bbm' => $request->keterangan,
            ]);


        if ($request->tanggal_plat_baru != '-') {
            DB::table('dt_kendaraan_surat')
                ->where('no_polisi', $request->no_polisi)
                ->update([
                    'tgl_pajak_stnk' => $request->tanggal_baru,
                    'tgl_baru_stnk' => $request->tanggal_plat_baru,

                ]);
        } else {
            DB::table('dt_kendaraan_surat')
                ->where('no_polisi', $request->no_polisi)
                ->update([
                    'tgl_pajak_stnk' => $request->tanggal_baru,

                ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Attachment berhasil disimpan!');
    }
}

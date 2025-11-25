<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KirController extends Controller
{
    public function view()
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data['dt_kir'] = DB::table('dt_tr_kir')
                ->where('dt_tr_kir.status', "Proses")
                ->get();

            $data['dt_kir_selesai'] = DB::table('dt_tr_kir')
                ->where('dt_tr_kir.status', "Selesai")
                ->get();
        } else {
            $data['dt_kir'] = DB::table('dt_tr_kir')
                ->join('dt_branch', 'dt_tr_kir.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->where('dt_tr_kir.status', "Proses")
                ->get();

            $data['dt_kir_selesai'] = DB::table('dt_tr_kir')
                ->join('dt_branch', 'dt_tr_kir.code_branch', '=', 'dt_branch.name_branch')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->where('dt_tr_kir.status', "Selesai")
                ->get();
        }

        return view('app_page.kir.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.kir.create');
    }

    public function insert(REQUEST $request)
    {

        $request->validate([
            'file_attachment' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);
        // dd($request->file('file_attachment'));

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

        // dd($request->biaya_kir);
        $file = $request->file('file_attachment');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/attachments/KIR/';
        $file->move(public_path($filePath), $filename);


        DB::table('dt_tr_kir')->insert([
            'kode_kir' => $kode,
            'tanggal_kir' => Carbon::now()->format('Y-m-d'),
            'no_polisi' => $request->no_polisi,
            'code_branch' => $request->depo,
            'wilayah' => $request->wilayah,
            'no_kir_1' => $request->no_kir_1,
            'no_kir_2' => $request->no_kir_2,
            'tgl_uji_kir' => $request->tgl_uji_kir,
            'tgl_exp_kir' => $request->tgl_exp_kir,
            'biaya_kir' => $request->biaya_kir,
            'dishub' => $request->dishub,
            'keterangan' => $request->keterangan,
            'file_attachment' => $filePath . $filename,
            'status' => 'Proses',
            'id_user_input' => Auth::user()->id
        ]);

        if (Auth::user()->roles == 'Superadmin') {
            return redirect()->route('admin.kir.view');
        } elseif (Auth::user()->roles == 'Admin') {
            return redirect()->route('user.kir.view');
        }
    }

    public function saveattachment(Request $request)
    {
        // Simpan file ke server
        // $file = $request->file('file_attachment');
        // $filename = time() . '_' . $file->getClientOriginalName();
        // $filePath = 'uploads/attachments/';
        // $file->move(public_path($filePath), $filename);

        // Update database
        DB::table('dt_tr_kir')
            ->where('kode_kir', $request->kode_kir)
            ->update([
                // 'file_attachment' => $filePath . $filename,
                'status' => 'Selesai',
                // 'keterangan_bbm' => $request->keterangan,
            ]);

        $tanggal_exp_kir = Carbon::parse($request->tanggal_exp)->addMonths(6);

        DB::table('dt_kendaraan_surat')
            ->where('no_polisi', $request->no_polisi)
            ->update([
                'masa_berlaku_kir' => $request->tanggal_exp,

            ]);

        return redirect()->back()->with('success', 'Attachment berhasil disimpan!');
    }
}

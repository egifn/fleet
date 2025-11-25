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
use Barryvdh\DomPDF\Facade\Pdf;

class VoucherBbmController extends Controller
{
    public function view()
    {
        ini_set('max_execution_time', 1000);

        // $checkexp =
        //     DB::table('dt_tr_bbm')
        //     ->select(
        //         'dt_tr_bbm.id',
        //         'dt_tr_bbm.kode_bbm',
        //         'dt_tr_bbm.expired',
        //         'dt_tr_bbm.created_at',
        //     )
        //     ->get();

        // $this->checkExpiredVouchers($checkexp);


        if (Auth::user()->roles == 'Superadmin') {
            // data pending
            $data['dt_voucher_pending'] = DB::table('dt_tr_bbm')
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
                ->where('status_voucher', 'Aktif')
                ->orderBy('id', 'desc')
                ->get();

            $data['dt_voucher_expired'] = DB::table('dt_tr_bbm')
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
                    DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->where('file_attachment', null)
                ->where('status_voucher', 'Kadaluarsa')
                ->orderBy('id', 'desc')
                ->get();

            // data succes
            $data['dt_voucher_succes'] = DB::table('dt_tr_bbm')
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
                    DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->whereNotNull('dt_tr_bbm.file_attachment')
                ->where('status_voucher', 'Selesai')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            //    data pending
            $data['dt_voucher_pending'] = DB::table('dt_tr_bbm')
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
                ->where('status_voucher', 'Aktif')
                ->orderBy('id', 'desc')
                ->get();

            $data['dt_voucher_expired'] = DB::table('dt_tr_bbm')
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
                    DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->where('file_attachment', null)
                ->where('status_voucher', 'Kadaluarsa')
                ->where('dt_branch.code_branch', Auth::user()->branch_id)
                ->orderBy('id', 'desc')
                ->get();

            // data success
            $data['dt_voucher_succes'] = DB::table('dt_tr_bbm')
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
                    'dt_file_upload.filename'
                )
                ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
                ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
                ->where('dt_branch.id', Auth::user()->branch_id)
                ->whereNotNull('dt_tr_bbm.file_attachment')
                ->where('status_voucher', 'Selesai')
                ->orderBy('id', 'desc')
                ->get();
        }


        // dd($data['dt_voucher_succes']);

        return view('app_page.voucher.index', $data);
    }

    public function create(REQUEST $request)
    {
        return view('app_page.voucher.create');
    }

    public function print(Request $request)
    {
        $selectedCodes = $request->input('selectedCodes', []);

        $dataList = [];

        foreach ($selectedCodes as $code) {
            $data = DB::table('dt_tr_bbm')
                ->select('*')
                ->where('kode_bbm', $code)
                ->orderBy('id', 'desc')
                ->limit(1)
                ->first();

            $dataList[] = $data;
        }

        // dd($dataList);

        return view('app_page.voucher.print', $dataList);
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
        // $request->validate([
        //     'bukti_km' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     //     'file_attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        // ]);
        // date_default_timezone_set('Asia/Jakarta');

        $time = (now()->format('H:i:s'));
        $ByDate = (date('Y-m'));
        $date = (date('dmy'));

        $getRow = DB::table('dt_tr_bbm')->select(DB::raw('MAX(RIGHT(kode_bbm,3)) as NoUrut'))
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->where('dt_tr_bbm.tanggal_bbm', 'like', "%" . $ByDate . "%");
        $rowCount = $getRow->count();

        $getkode = DB::table('dt_branch')->select('dt_branch.code_branch')->where('dt_branch.id', Auth::user()->branch_id)->first();
        $code_branch = $getkode->code_branch;

        if ($rowCount > 0) {
            if ($rowCount < 9) {
                $kode = "BM" . $code_branch . "-" . '' . $date . "00" . '' . ($rowCount + 1);
            } else if ($rowCount < 99) {
                $kode = "BM" . $code_branch . "-" . '' . $date . "0" . '' . ($rowCount + 1);
            } else if ($rowCount < 999) {
                $kode = "BM" . $code_branch . "-" . '' . $date . ($rowCount + 1);
            }
        } else {
            $kode = "BM" . $code_branch . "-" . '' . $date . sprintf("%03s", 1);
        }

        if ($request->file_attachment_bukti != NULL) {
            $file = $request->file('file_attachment_bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/bukti/';
            $file->move(public_path($filePath), $filename);

            $filebukti = $request->file('bukti_km');
            $filenamebukti = time() . '_' . $filebukti->getClientOriginalName();
            $filePathBukti = 'uploads/bukti/';
            $filebukti->move(public_path($filePathBukti), $filenamebukti);
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
                'no_vocer' => $request->no_vocer,
                'keterangan_bbm' => $request->ket,
                'expired' => $request->exp,
                'file_attachment_bukti' => $filePath . $filename,
                'bukti_km' => $filePathBukti . $filenamebukti,
                'id_user_input' => Auth::user()->id
            ]);
        } else {
            $filebukti = $request->file('bukti_km');
            $filenamebukti = time() . '_' . $filebukti->getClientOriginalName();
            $filePathBukti = 'uploads/bukti/';
            $filebukti->move(public_path($filePathBukti), $filenamebukti);
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
                'no_vocer' => $request->no_vocer,
                'keterangan_bbm' => $request->ket,
                'bukti_km' => $filePathBukti . $filenamebukti,
                'expired' => $request->exp,
                'id_user_input' => Auth::user()->id
            ]);
        }
        if (Auth::user()->roles == 'Superadmin') {
            return redirect()->route('admin.voucher.view');
        } elseif (Auth::user()->roles == 'Admin') {
            return redirect()->route('user.voucher.view');
        }
    }

    public function saveAttachment(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_polisi' => 'required|string',
            'kode_bbm' => 'required|string',
            'file_attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10048',
            // 'keterangan' => 'required|string',
        ]);

        // Simpan file ke server
        $file = $request->file('file_attachment');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/attachments/';
        $file->move(public_path($filePath), $filename);

        // Update database
        DB::table('dt_tr_bbm')
            ->where('kode_bbm', $request->kode_bbm)
            ->update([
                'file_attachment' => $filePath . $filename,
                'status_voucher' => 'Selesai',
            ]);

        if ($request->rasio != null) {
            DB::table('dt_kendaraan')
                ->where('no_polisi', $request->no_polisi)
                ->update([
                    'rasio_ideal' => $request->rasio,
                ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Attachment berhasil disimpan!');
    }

    private function checkExpiredVouchers($checkexp)
    {
        foreach ($checkexp as $cexp) {
            // Convert created_at ke Carbon instance
            $created = Carbon::parse($cexp->created_at);

            // Hitung selisih hari dari created_at sampai sekarang
            $daysDifference = $created->diffInDays(now());

            // Cek apakah sudah melewati batas expired
            if ($daysDifference > $cexp->expired) {
                DB::table('dt_tr_bbm')
                    ->where('kode_bbm', $cexp->kode_bbm)
                    ->where('file_attachment', null)
                    ->where('status_voucher', '=', 'Aktif')
                    ->update(['status_voucher' => 'Kadaluarsa']);
            }
        }
    }

    public function view_excel(Request $request)
    {
        $data['dt_bbm_excel'] = DB::table('dt_tr_bbm')
            // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
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
                'dt_tr_bbm.id_user_input'
            )
            ->get();

        return view('app_page.bbm.view_excel', $data);
    }

    public function pdf(Request $request)
    {
        $selectedData = $request->input('selectedData');

        $pdf = PDF::loadview('app_page.voucher.pdf', compact('selectedData'));
        return $pdf->stream();
    }

    public function view_excel_pending(Request $request)
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data['dt_bbm_excel_pending'] = DB::table('dt_tr_bbm')
            // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->where('dt_tr_bbm.file_attachment', null)
            ->where('dt_tr_bbm.status_voucher', 'Aktif')
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        } else {
            $data['dt_bbm_excel_pending'] = DB::table('dt_tr_bbm')
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->where('dt_tr_bbm.file_attachment', null)
            ->where('dt_tr_bbm.status_voucher', 'Aktif')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        }

            //dd($data);

        return view('app_page.voucher.view_excel_pending', $data);
    }

    public function view_excel_kadaluarsa(Request $request)
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data_kadaluarsa['dt_bbm_excel_kadaluarsa'] = DB::table('dt_tr_bbm')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->where('dt_tr_bbm.file_attachment', null)
            ->where('dt_tr_bbm.status_voucher', 'Kadaluarsa')
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        } else {
            $data_kadaluarsa['dt_bbm_excel_kadaluarsa'] = DB::table('dt_tr_bbm')
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->where('dt_tr_bbm.file_attachment', null)
            ->where('dt_tr_bbm.status_voucher', 'Kadaluarsa')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        } 
        

        return view('app_page.voucher.view_excel_kadaluarsa', $data_kadaluarsa);
    }

    public function view_excel_selesai(Request $request)
    {
        if (Auth::user()->roles == 'Superadmin') {
            $data_selesai['dt_bbm_excel_selesai'] = DB::table('dt_tr_bbm')
            // ->join('dt_branch','dt_tr_bbm.code_branch','=','dt_branch.code_branch')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->whereNotNull('dt_tr_bbm.file_attachment')
            ->where('dt_tr_bbm.status_voucher', 'Selesai')
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        } else {
            $data_selesai['dt_bbm_excel_selesai'] = DB::table('dt_tr_bbm')
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
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
                DB::raw('DATE_ADD(dt_tr_bbm.tanggal_bbm, INTERVAL 3 DAY) AS tanggal_kadaluarsa')
            )
            ->whereNotNull('dt_tr_bbm.file_attachment')
            ->where('dt_tr_bbm.status_voucher', 'Selesai')
            ->where('dt_branch.id', Auth::user()->branch_id)
            ->orderBy('dt_tr_bbm.id', 'desc')
            ->get();
        }
        
            
           
        return view('app_page.voucher.view_excel_selesai', $data_selesai);
    }
}

<?php
namespace App\Imports;

use App\Models\Dt_Tr_Bbm_Spbu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class Import_Spbu implements ToModel, WithStartRow
{
    protected $startRow;

    public function __construct($startRow)
    {
        $this->startRow = $startRow;
        HeadingRowFormatter::default('none');
    }
    
    public function model(array $row)
    {
        $tanggalBbm = $row[0];
        
        $tgl_bbm = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($tanggalBbm - 2)->format('Y-m-d');

        return new Dt_Tr_Bbm_Spbu([
            //'tgl_import' => Carbon::now()->format('Y-m-d'),
            'tgl_bbm' => $tgl_bbm,
            'kode' => $row[1],
            'no_polisi' => $row[2], 
            'liter_qty' => $row[3],
            'harga_perliter' => $row[4],
            'biaya_bbm' => $row[5],
            'jenis_bbm' => '',
            'code_branch' => request()->penempatan,
            'perusahaan' => '',
            'id_user_input' => Auth::user()->id
        ]);
        
    }

    public function startRow(): int
    {
        return $this->startRow;
    }
}
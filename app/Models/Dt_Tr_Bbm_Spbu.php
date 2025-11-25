<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dt_Tr_Bbm_Spbu extends Model
{
    use HasFactory;

    protected $table = 'dt_tr_bbm_spbu';
	protected $fillable = [
        'tgl_bbm',
        'kode',
        'no_polisi',
        'liter_qty',
        'harga_perliter',
        'biaya_bbm',
        'jenis_bbm',
        'code_branch',
        'perusahaan',
        'id_user_input'
    ];
}

@php
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Rekap Pengisian BBM (Selesai).xls");
@endphp

<style>
table, td, th {
  border: 1px outset gray;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>


<hr>
<div class="col-lg-12" style="text-align: center;">
    <b>Rekap Pengisian BBM (Selesai)</b>
</div>

<hr>

<div>
    <br>
    <table>
        <thead>
            <tr style="background-color: rgb(195, 199, 200)">
                <th>No</th>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Nomor Polisi</th>
                <th>Depo</th>
                <th>Wilayah</th>
                <th>Week</th>
                <th>Salesman</th>>
                <th>Jenis BBM</th>
                <th>Harga Perliter</th>
                <th>Pemakaian BBM (L)</th>
                <th>Pengisian BBM (L)</th>
                <th>Biaya BBM</th>
                <th>Kilometer</th>
                <th>Ratio</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @forelse($dt_bbm_excel_selesai as $item_bbm)
            <tr>
                <td align="right">{{ $no++ }}</td>
                <td>{{ $item_bbm->kode_bbm }}</td>
                <td>{{ $item_bbm->tanggal_bbm }}</td>
                <td>{{ $item_bbm->no_polisi }}</td>
                <td>{{ $item_bbm->code_branch }}</td>
                <td>{{ $item_bbm->perusahaan }}</td>
                <td>{{ $item_bbm->week }}</td>
                <td>{{ $item_bbm->salesman }}</td>
                <td>{{ $item_bbm->jenis_bbm }}</td>
                <td align="right">{{ $item_bbm->harga_perliter }}</td>
                <td align="right">{{ $item_bbm->liter_qty }}</td>
                <td align="right">{{ $item_bbm->liter_qty }}</td>
                <td align="right">{{ $item_bbm->biaya_bbm }}</td>
                <td>{{ $item_bbm->kilometer }}</td>
                <td>{{ $item_bbm->ratio_ideal }}</td>
                <td>{{ $item_bbm->keterangan_bbm }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="17" class="text-center">Tidak ada data untuk saat ini</td>
            </tr>
             @endforelse
        </tbody>
    </table>
</div>                  








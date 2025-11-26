@php
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Rekap Pergantian Sparepart.xls");
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
    <b>Rekap Pergantian Sparepart</b>
</div>
{{-- <div class="col-lg-12" style="text-align: center;">
    Per Tanggal: {{ $date }}
</div> --}}
<hr>

<div>
    {{-- <b>Periode: {{ request()->tanggal_ex }} </b> --}}
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
                <th>Salesman</th>
                <th>Segmen</th>
                <th>Kilometer</th>  
                <th>Biaya Sparepart</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @forelse($dt_sparepart_excel as $item_sparepart)
            <tr>
                <td style="padding: 7px 5px;">{{ $no++ }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->kode }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->tanggal }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->no_polisi }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->code_branch }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->perusahaan }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->week }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->salesman }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->segmen }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->kilometer }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->biaya_sparepart }}</td>
                <td style="padding: 7px 5px;">{{ $item_sparepart->keterangan_sparepart }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data untuk saat ini</td>
            </tr>
             @endforelse
        </tbody>
        {{-- <tfoot>
            <tr style="background-color: rgb(195, 199, 200)">
                <td colspan="5" align="right"><b>Total: Rp.</b></td>
                <td align="right"><b>{{ ($data_stok_total_excel->jumlah) }}</b></td>
                <td></td>
            </tr>
            <tr style="background-color: rgb(195, 199, 200)">
                <td colspan="5" align="right"><b>Grand Total: Rp.</b></td>
                <td align="right"><b>{{ ($data_stok_total_excel->jumlah) }}</b></td>
                <td></td>
            </tr>
        </tfoot> --}}
    </table>
</div>                  








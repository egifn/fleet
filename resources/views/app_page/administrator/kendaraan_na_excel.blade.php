@php
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Rekap Kendaraan NA.xls");
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
    <b>Rekap Kendaraan NA</b>
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
                <th>id</th>
                <th>Nomor Polisi</th>
                <th>Nomor Rangka</th>
                <th>Nomor Mesin</th>
                <th>Nama Pemilik</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Rasio Ideal</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Warna</th>
                <th>Kapasitas Mesin</th>
                <th>Kategori</th>
                <th>Penempatan</th>
                <th>Perusahaan</th>
                <th>Segmen</th>
                <th>Status Kendaraan</th>
                <th>Status Kepemilikan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @forelse($dt_kendaraan_excel as $item_kendaraan)
            <tr>
                <td style="padding: 7px 5px;" align="right">{{ $no++ }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->id }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->no_polisi }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->no_rangka }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->no_mesin }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_pemilik }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->merek }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->type }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->rasio_ideal }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->model }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->tahun }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->warna }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->kapasitas_mesin }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->kategori }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->name_branch }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->perusahaan }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_segmen }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kendaraan }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kepemilikan }}</td>
                <td style="padding: 7px 5px;">{{ $item_kendaraan->keterangan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data untuk saat ini</td>
            </tr>
             @endforelse
        </tbody>
    </table>
</div>                  








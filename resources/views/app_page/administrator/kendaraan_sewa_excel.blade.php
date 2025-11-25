@php
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Rekap Kendaraan Sewa.xls");
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
    <b>Rekap Kendaraan Sewa</b>
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
                <th>Merek</th>
                <th>Tipe</th>
                <th>Kategori</th>
                <th>Penempatan</th>
                <th>Perusahaan</th>
                <th>Status Kendaraan</th>
                <th>Vendor</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @forelse($dt_kendaraan_sewa_excel as $item_kendaraan)
            <tr>
                <td align="right">{{ $no++ }}</td>
                <td >{{ $item_kendaraan->id }}</td>
                <td>{{ $item_kendaraan->no_polisi }}</td>
                <td>{{ $item_kendaraan->merek }}</td>
                <td>{{ $item_kendaraan->type }}</td>
                <td>{{ $item_kendaraan->kategori }}</td>
                <td>{{ $item_kendaraan->name_branch }}</td>
                <td>{{ $item_kendaraan->perusahaan }}</td>
                <td>{{ $item_kendaraan->status_kendaraan }}</td>
                <td>{{ $item_kendaraan->nama_vendor }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data untuk saat ini</td>
            </tr>
             @endforelse
        </tbody>
    </table>
</div>                  








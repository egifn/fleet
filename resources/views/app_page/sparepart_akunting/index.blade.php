@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('akunting.sparepart.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya Sparepart</h4>
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label class="col-sm-1 col-form-label">Depo</label>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0">
                                    <option value="">Pilih Depo</option> 
                                    @foreach ($dt_branch as $branch)
                                        <option value="{{ $branch->code_branch }}" {{ request('penempatan') == $branch->code_branch ? 'selected' : '' }}>
                                            {{ $branch->code_branch }} | {{ $branch->name_branch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Input Tanggal Awal -->
                            <label class="col-sm-1 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-2">
                                <input type="date" name="tanggal_awal" class="form-control form-control-sm" value="{{ request('tanggal_awal') }}">
                            </div>

                            <!-- Input Tanggal Akhir -->
                            <label class="col-sm-1 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-2">
                                <input type="date" name="tanggal_akhir" class="form-control form-control-sm" value="{{ request('tanggal_akhir') }}">
                            </div>

                            <!-- Tombol Cari -->
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-sm" type="button" id="cari">Cari</button>
                            </div>
                        </div>
                        <table class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>id</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th hidden>Waktu</th>
                                    <th>Nomor Polisi</th>
                                    <th>Depo</th>
                                    <th hidden>Wilayah</th>
                                    <th hidden>Week</th>
                                    <th hidden>Salesman</th>
                                    <th hidden>Jenis</th>
                                    <th hidden>Segmen</th>
                                    <th hidden>tipe</th>
                                    <th hidden>Kilometer</th>
                                    <th>Keterangan</th>
                                    <th>Biaya Sparepart</th>
                                    <th hidden>No LKM</th>
                                    <th hidden>No PMB</th>
                                    <th hidden>id_user</th>
                                    <th>File Attach</th>
                                    {{-- <th>Kapasitas Vol</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_sparepart as $item_sparepart)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->kode }}</td>
                                    <td style="padding: 7px 5px;">{{ date('d-M-Y', strtotime($item_sparepart->tanggal)) }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->waktu }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->no_polisi }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->code_branch }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->perusahaan }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->week }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->salesman }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->jenis }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->segmen }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->tipe }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->kilometer }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->keterangan_sparepart }}</td>
                                    <td style="padding: 7px 5px;" align="right">{{ number_format($item_sparepart->biaya_sparepart) }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->no_lkm }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->no_pmb }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->id_user_input }}</td>
                                    <td style="padding: 7px 5px;" ><a href="{{url('images/'. $item_sparepart->filename)}}" target="_blank">{{ $item_sparepart->filename}}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align='center'><b>T o t a l</b></td>
                                    <td align='right'><b>{{ number_format($total_biaya->total) }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-custome')
<script>
    $('#cari').on('click', function() {
        let penempatan = $('select[name="penempatan"]').val();
        let tanggalAwal = $('input[name="tanggal_awal"]').val();
        let tanggalAkhir = $('input[name="tanggal_akhir"]').val();

        let queryString = '';

        if (penempatan) {
            queryString += `penempatan=${penempatan}`;
        }
        if (tanggalAwal) {
            if (queryString) queryString += '&';
            queryString += `tanggal_awal=${tanggalAwal}`;
        }
        if (tanggalAkhir) {
            if (queryString) queryString += '&';
            queryString += `tanggal_akhir=${tanggalAkhir}`;
        }

        if (queryString) {
            window.location.href = "{{ route('akunting.sparepart_akunting.view') }}?" + queryString;
        } else {
            window.location.href = "{{ route('akunting.sparepart_akunting.view') }}";
        }
    });
</script>
@endpush
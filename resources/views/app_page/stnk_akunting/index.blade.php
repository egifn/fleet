@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya STNK</h4>
                        <div class="page-title-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        
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

                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th hidden>id</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th hidden>Waktu</th>
                                            <th>Nomor Polisi</th>
                                            <th>Depo</th>
                                            <th hidden>Wilayah</th>
                                            <th hidden>Jenis</th>
                                            <th hidden>Segmen</th>
                                            <th hidden>tipe</th>
                                            <th>No Rangka</th>
                                            <th>No Mesin</th>
                                            <th>Bulan Exp STNK</th>
                                            <th>Tanggal Exp STNK</th>
                                            <th>Biaya STNK</th>
                                            <th hidden>Id User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($dt_stnk as $item_stnk)
                                            <tr>
                                                <td style="padding: 7px 5px; text-align: center;">{{ $no++ }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->id }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->kode_stnk }}</td>
                                                <td style="padding: 7px 5px;">{{ date('d-M-Y', strtotime($item_stnk->tanggal_stnk)) }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->waktu_stnk }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->no_polisi }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->code_branch }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->perusahaan }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->jenis }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->segmen }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->tipe }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->no_rangka }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->no_mesin }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_stnk->bulan_exp_stnk }}</td>
                                                <td style="padding: 7px 5px;">{{ date('d-M-Y', strtotime($item_stnk->tgl_pajak_stnk)) }}</td>
                                                <td style="padding: 7px 5px;" align="right">
                                                    {{ number_format($item_stnk->biaya_stnk) }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_stnk->id_user_input }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="9" align='center'><b>T o t a l</b></td>
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
                window.location.href = "{{ route('akunting.stnk_akunting.view') }}?" + queryString;
            } else {
                window.location.href = "{{ route('akunting.stnk_akunting.view') }}";
            }
        });
    </script>
@endpush

@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('akunting.bbm.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya BBM </h4>
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="row" style="padding: 10px 10px;">
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Sisa Saldo/Gantungan</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Rp. {{ number_format($saldo->sisa_saldo) }}</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Top Up Saldo</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Rp. {{ number_format($saldo->top_up_saldo) }}</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Top Up Saldo</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Rp. 0</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Total Saldo</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Rp. {{ number_format($saldo->saldo_akhir) }}</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Total Pembelian</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Rp. {{ number_format($total_biaya->total_spbu) }}</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">Saldo Akhir</div>
                            <div class="card-body-dashboard">
                                <div class="col-md-6" style="text-align: center">
                                    <h5>Total</h5>
                                    <h4 class="card-title-dashboard"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <th>No</th>
                                        <th hidden>Id</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th hidden>Waktu</th>
                                        <th>Nomor Polisi</th>
                                        <th>Depo</th>
                                        <th hidden>Wilayah</th>
                                        <th>Week</th>
                                        <th>Salesman</th>
                                        <th hidden>Segmen</th>
                                        <th hidden>tipe</th>
                                        <th>Jenis BBM</th>
                                        <th>Harga Perliter</th>
                                        <th>Liter (Qty)</th>
                                        <th>Kilometer</th>
                                        <th>Biaya BBM</th>
                                        <th>Biaya BBM SPBU</th>
                                        <th hidden>Ratio Aktual</th>
                                        <th hidden>Ratio Ideal</th>
                                        <th hidden>Keterangan</th>
                                        <th hidden>No Vocer</th>
                                        <th hidden>id User</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($dt_bbm as $item_bbm)
                                    <tr>
                                        <td style="padding: 7px 5px;" align="right">{{ $no++ }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->kode_bbm }}</td>
                                        <td style="padding: 7px 5px;">{{ date('d-M-Y', strtotime($item_bbm->tanggal_bbm)) }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->waktu_bbm }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->no_polisi }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->code_branch }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->perusahaan }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->week }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->salesman }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->segmen }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->tipe }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->jenis_bbm }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->harga_perliter) }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ $item_bbm->liter_qty }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->kilometer }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->biaya_bbm) }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->biaya_bbm_spbu) }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->ratio_actual }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->ratio_ideal }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->keterangan_bbm }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->no_vocer }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id_user_input }}</td>
                                        <td style="padding: 7px 5px;" hidden><a href="{{url('images/'. $item_bbm->filename)}}" target="_blank">{{ $item_bbm->filename}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="11" align='center'><b>T o t a l</b></td>
                                    <td align='right'><b>{{ number_format($total_biaya->total) }}</b></td>
                                    <td align='right'><b>{{ number_format($total_biaya->total_spbu) }}</b></td>
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
            window.location.href = "{{ route('akunting.bbm_akunting.view') }}?" + queryString;
        } else {
            window.location.href = "{{ route('akunting.bbm_akunting.view') }}";
        }
    });
    
</script>
@endpush
@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Import Data SPBU </h4>
                        <div class="page-title-right">
                            <a href="{{ route('user.bbm_spbu.create') }}" class="btn btn-success btn-sm float-right">Import File</a>
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
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>No Polisi</th>
                                        <th>Jumlah Liter</th>
                                        <th>Harga per Liter</th>
                                        <th>Total Harga</th>
                                        <th hidden>Jenis BBM</th>
                                        <th hidden>Perusahaan</th>
                                        <th hidden>Depo</th>
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
                                        <td style="padding: 7px 5px;">{{ $item_bbm->kode }}</td>
                                        <td style="padding: 7px 5px;">{{ date('d-M-Y', strtotime($item_bbm->tgl_bbm)) }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->no_polisi }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->liter_qty }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->harga_perliter }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->biaya_bbm }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id_user_input }}</td>
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
            window.location.href = "{{ route('user.bbm_spbu.view') }}?" + queryString;
        } else {
            window.location.href = "{{ route('user.bbm_spbu.view') }}";
        }
    });
    
</script>
@endpush
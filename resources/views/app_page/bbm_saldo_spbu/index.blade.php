@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Saldo </h4>
                        <div class="page-title-right">
                            <a href="{{ route('user.bbm_saldo_spbu.create') }}" class="btn btn-success btn-sm float-right">Tambah Saldo</a>
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
                                    <option value="{{ $dt_branch->code_branch }}">{{ $dt_branch->name_branch }}</option> 

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
                                        <th>Tanggal</th>
                                        <th hidden>Perusahaan</th>
                                        <th hidden>Depo</th>
                                        <th>Sisa Saldo</th>
                                        <th>Top Up Saldo</th>
                                        <th>Saldo Akhir</th>
                                        <th hidden>id User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                <tfoot>
                                    <!-- <tr>
                                    <td colspan="6" align='center'><b>T o t a l</b></td>
                                    <td align='right'><b></b></td>
                                    </tr> -->
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
    // $('#cari').on('click', function() {
    //     let penempatan = $('select[name="penempatan"]').val();
    //     let tanggalAwal = $('input[name="tanggal_awal"]').val();
    //     let tanggalAkhir = $('input[name="tanggal_akhir"]').val();

    //     let queryString = '';

    //     if (penempatan) {
    //         queryString += `penempatan=${penempatan}`;
    //     }
    //     if (tanggalAwal) {
    //         if (queryString) queryString += '&';
    //         queryString += `tanggal_awal=${tanggalAwal}`;
    //     }
    //     if (tanggalAkhir) {
    //         if (queryString) queryString += '&';
    //         queryString += `tanggal_akhir=${tanggalAkhir}`;
    //     }

    //     if (queryString) {
    //         window.location.href = "{{ route('user.bbm_spbu.view') }}?" + queryString;
    //     } else {
    //         window.location.href = "{{ route('user.bbm_spbu.view') }}";
    //     }
    });
    
</script>
@endpush
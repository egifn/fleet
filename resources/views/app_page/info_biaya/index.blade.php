@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">BIAYA</h4>
                </div>
            </div>
        </div>
        {{-- <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
            <i class="mdi mdi-alert-circle-outline label-icon"></i><strong>INFO</strong>: <br>
            <span>Data branch ini terdiri dari data
                <span class="text-danger"><strong>DEPO (<span class="text-primary">-</span>)</strong></span>,
                <span class="text-danger"><strong>BENGKEL (<span class="text-primary">-</span>)</strong></span>,
                <span class="text-danger"><strong>POOL (<span class="text-primary">-</span>)</strong></span>,
                <span class="text-danger"><strong>HEAD OFFICE (HO) (<span class="text-primary">-</span>)</strong></span>
                <span class="text-danger"><strong>PABRIK (SUPPLIER) (<span class="text-primary">-</span>)</strong></span>
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>Id</th>
                                        <th>Tanggal</th>
                                        <th hidden>Waktu</th>
                                        <th>Nomor Polisi</th>
                                        <th>Depo</th>
                                        <th>Wilayah</th>
                                        <th>Week</th>
                                        <th>Salesman</th>
                                        <th>Jenis</th>
                                        <th>Segmen</th>
                                        <th>Tipe</th>
                                        <th>No Rangka</th>
                                        <th>No Mesin</th>
                                        <th>Bulan Exp STNK</th>
                                        <th>STNK</th>
                                        <th>Pajak 5 Tahun</th>
                                        <th>Bulan Exp Kir</th>
                                        <th>Tgl Kir</th>
                                        <th>Status</th>
                                        <th>Biaya BBM</th>
                                        <th>Kilometer</th>
                                        <th>Liter</th>
                                        <th>Ratio Actual</th>
                                        <th>Ratio Ideal</th>
                                        <th>Biaya Sparepart</th>
                                        <th>Vol Penjualan Real</th>
                                        <th>BBM/Volume</th>
                                        <th>Sparepart/Volume</th>
                                        <th>Jasa Galon/SPS</th>
                                        <th>Biaya Jasa</th>
                                        <th>Total Biaya</th>
                                        <th>Biaya per Galon & SPS</th>
                                        <th hidden>Id User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
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

</script>
@endpush
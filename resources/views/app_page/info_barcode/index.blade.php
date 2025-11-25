@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Barcode</h4>
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
                                        <th>Nomor Polisi</th>
                                        <th>Perusahaan</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Waktu Keluar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Waktu Masuk</th>
                                        <th hidden>Id User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no=1;
                                    @endphp
                                    @foreach ($dt_info_barcode as $item_barcode)
                                    <tr>
                                        <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_barcode->kode }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_barcode->no_pol }}</td>
                                        <td style="padding: 7px 5px;"></td>
                                        <td style="padding: 7px 5px;">{{ $item_barcode->tgl_keluar }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_barcode->waktu_keluar }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_barcode->tgl_masuk }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_barcode->waktu_masuk }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_barcode->id_user_input }}</td>
                                    </tr>
                                    @endforeach
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
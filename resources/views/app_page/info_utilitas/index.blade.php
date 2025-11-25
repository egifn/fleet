@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">UTILITAS</h4>
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
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th hidden>Waktu</th>
                                        <th>Nomor Polisi</th>
                                        <th>Depo</th>
                                        <th>Wilayah</th>
                                        <th>Week</th>
                                        <th>Salesman</th>
                                        <th>Jugs/SPS/Hybrid</th>
                                        <th>Segmen</th>
                                        <th>Kapasitas</th>
                                        <th>Ritase Ideal</th>
                                        <th>Ritase Real</th>
                                        <th>Vol Penjualan</th>
                                        <th>Retase Real/hari</th>
                                        <th>Lost Ritase</th>
                                        <th>Lost Volume</th>
                                        <th>volume Ideal</th>
                                        <th>Keterangan</th>
                                        <th hidden>Id User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($dt_utilitas as $item_utilitas)
                                    <tr>
                                        <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_utilitas->id }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->kode_utilitas }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->tanggal_utilitas }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_utilitas->waktu_utilitas }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->no_polisi }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->name_branch }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->perusahaan }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->week }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->salesman }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->jugs_sps }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->segmen }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->kapasitas }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->ritase_ideal_perhari }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->ritase_real }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->volume_penjualan_real }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->ritase_real_perhari }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->lost_ritase }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->lost_volume }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->volume_ideal }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_utilitas->keterangan }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_utilitas->id_user_input }}</td>
                                        {{-- <td style="padding: 7px 5px;">
                                            <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_kendaraan->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                            <a href="{{ route('admin.branch.delete', $item_kendaraan->id) }}" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a>
                                        </td> --}}
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
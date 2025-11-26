@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        @if (Auth::user()->roles == 'Superadmin')
        <form action="{{ route('admin.sparepart.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
        @elseif (Auth::user()->roles == 'Admin')
        <form action="{{ route('user.sparepart.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
        @endif
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya Sparepart</h4>
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                            @if (Auth::user()->roles == 'Superadmin')
                            <a href="{{ route('admin.sparepart.create') }}" class="btn btn-primary btn-sm">Tambah Biaya Sparepart <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif (Auth::user()->roles == 'Admin')
                            <a href="{{ route('user.sparepart.create') }}" class="btn btn-primary btn-sm">Tambah Biaya Sparepart <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @endif                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        <table id="datatable" class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>id</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th hidden>Waktu</th>
                                    <th>Nomor Polisi</th>
                                    <th>Depo</th>
                                    <th>Wilayah</th>
                                    <th>Week</th>
                                    <th>Salesman</th>
                                    <th hidden>Jenis</th>
                                    <th>Segmen</th>
                                    <th hidden>tipe</th>
                                    <th>Kilometer</th>   
                                    {{-- <th>Ratio Aktual</th>
                                    <th>Ratio Ideal</th> --}}
                                    <th>Biaya Sparepart</th>
                                    <th>Keterangan</th>
                                    <th>No LKM</th>
                                    <th>No PMB</th>
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
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->tanggal }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->waktu }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->no_polisi }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->code_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->perusahaan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->week }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->salesman }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->jenis }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->segmen }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->tipe }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->kilometer }}</td>
                                    {{-- <td style="padding: 7px 5px;">{{ $item_sparepart->ratio_actual }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->ratio_ideal }}</td> --}}
                                    <td style="padding: 7px 5px;" align="right">{{ number_format($item_sparepart->biaya_sparepart) }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->keterangan_sparepart }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->no_lkm }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_sparepart->no_pmb }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_sparepart->id_user_input }}</td>
                                    <td style="padding: 7px 5px;" ><a href="{{url('images/'. $item_sparepart->filename)}}" target="_blank">{{ $item_sparepart->filename}}</a></td>
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
@endsection
@push('script-custome')
<script>

</script>
@endpush
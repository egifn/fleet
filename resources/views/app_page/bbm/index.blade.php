@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        @if (Auth::user()->roles == 'Superadmin')
        <form action="{{ route('admin.bbm.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
        @elseif (Auth::user()->roles == 'Admin')
        <form action="{{ route('user.bbm.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
        @endif
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya BBM</h4>
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                            @if (Auth::user()->roles == 'Superadmin')
                            <a href="{{ route('admin.bbm.create') }}" class="btn btn-primary btn-sm">Tambah Biaya BBM <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif (Auth::user()->roles == 'Admin')
                            <a href="{{ route('user.bbm.create') }}" class="btn btn-primary btn-sm">Tambah Biaya BBM <i class="mdi mdi-arrow-right ms-1"></i></a>
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
                                        <th>Segmen</th>
                                        <th hidden>tipe</th>
                                        <th>Jenis BBM</th>
                                        <th>Harga Perliter</th>
                                        <th>Liter (Qty)</th>
                                        <th>Biaya BBM</th>
                                        <th>Kilometer</th>
                                        <th>Ratio Aktual</th>
                                        <th>Ratio Ideal</th>
                                        <th>Keterangan</th>
                                        <th>No Vocer</th>
                                        <th hidden>id User</th>
                                        <th>File Attach</th>
                                        
                                        {{-- <th>Kapasitas Vol</th> --}}
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
                                        <td style="padding: 7px 5px;">{{ $item_bbm->tanggal_bbm }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->waktu_bbm }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->no_polisi }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->code_branch }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->perusahaan }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->week }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->salesman }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->segmen }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->tipe }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->jenis_bbm }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->harga_perliter) }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ $item_bbm->liter_qty }}</td>
                                        <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->biaya_bbm) }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->kilometer }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->ratio_actual }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->ratio_ideal }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->keterangan_bbm }}</td>
                                        <td style="padding: 7px 5px;">{{ $item_bbm->no_vocer }}</td>
                                        <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id_user_input }}</td>
                                        <td style="padding: 7px 5px;" ><a href="{{url('images/'. $item_bbm->filename)}}" target="_blank">{{ $item_bbm->filename}}</a></td>
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
@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            
            <!-- @if(Auth::user()->roles == 'Admin')
                    <form action="{{ route('user.bbm.view_excel') }}" target="_blank" method="get"
                        enctype="multipart/form-data">
            @endif -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Voucher BBM</h4>
                        <div class="page-title-right">
                            <!-- <button class="btn btn-success btn-sm" type="submit">E x c e l </button> -->
                            @if (Auth::user()->roles == 'Superadmin')
                                <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary btn-sm">Buat Voucher
                                    BBM <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif(Auth::user()->roles == 'Admin')
                                <a href="{{ route('user.voucher.create') }}" class="btn btn-primary btn-sm">Buat Voucher BBM
                                    <i class="mdi mdi-arrow-right ms-1"></i></a>
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
                    <span class="text-danger"><strong>PABRIK (SUPPLIER) (<span
                                class="text-primary">-</span>)</strong></span>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> --}}
            <div class="row">
                <ul class="nav nav-tabs" style="margin-left: 10px; border-bottom: 0px" id="statusTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pending" data-bs-toggle="tab">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#expired" data-bs-toggle="tab">Expired</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#success" data-bs-toggle="tab">Success</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pending">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (Auth::user()->roles == 'Superadmin')
                                        <form action="{{ route('admin.voucher.view_excel_pending') }}" target="_blank" method="get" enctype="multipart/form-data">
                                            <div class="col-12">
                                                <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                                            </div>
                                        </form>
                                    @elseif(Auth::user()->roles == 'Admin')
                                        <form action="{{ route('user.voucher.view_excel_pending') }}" target="_blank" method="get" enctype="multipart/form-data">
                                            <div class="col-12">
                                                <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                                            </div>
                                        </form>
                                    @endif
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive tabel-sm tabel-sm">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th>No</th>
                                                    <th hidden>Id</th>
                                                    <th>Kode</th>
                                                    <th>Tanggal</th>
                                                    <th hidden>Waktu</th>
                                                    <th>NoPol</th>
                                                    <th>Depo</th>
                                                    <th>Wilayah</th>
                                                    <th>Week</th>
                                                    <th>Salesman</th>
                                                    <th hidden>tipe</th>
                                                    <th>Jenis BBM</th>
                                                    <th>Harga Perliter</th>
                                                    <th>Pemakaian BBM (L)</th>
                                                    <th>Pengisian BBM (L)</th>
                                                    <th>Biaya Pengisian BBM</th>
                                                    <th>Kilometer</th>
                                                    <th>Ratio</th>
                                                    <th>Tgl Kadaluarsa</th>
                                                    <th hidden>Ratio Ideal</th>
                                                    {{-- <th>Expired</th> --}}
                                                    <th>Keterangan</th>
                                                    <th colspan="2">File Attachment</th>
                                                    <th>Status</th>
                                                    <th hidden>id User</th>
                                                    {{-- <th>Status Cetak</th> --}}
                                                    <th>
                                                        Cetak &nbsp; <input type="checkbox" id="select-all"
                                                            class="float-right">
                                                    </th>
                                                    <th>Action</th>

                                                    {{-- <th>Kapasitas Vol</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_voucher_pending as $item_voucher)
                                                    <tr>
                                                        <td style="padding: 5px 3px;" align="center">{{ $no++ }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher->id }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->kode_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->tanggal_bbm }}</td>
                                                        <td style="padding: 5px 3px;" hidden>{{ $item_voucher->waktu_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->no_polisi }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->code_branch }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->perusahaan }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->week }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->salesman }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher->tipe }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->jenis_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            <span
                                                                style="float: right;">{{ number_format($item_voucher->harga_perliter) }}</span>
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            {{ number_format($item_voucher->biaya_bbm) }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->kilometer }}
                                                        </td>
                                                        {{-- <td style="padding: 5px 3px;">{{ $item_voucher->ratio_actual }}</td> --}}
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->ratio_ideal }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->tanggal_kadaluarsa }}</td>
                                                        {{-- <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->expired }} hari</td> --}}
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher->keterangan_bbm }}</td>
                                                        <td style=" width: 50px; padding: 5px 3px; text-align: center">
                                                            @isset($item_voucher->file_attachment_bukti)
                                                                @if ($item_voucher->file_attachment_bukti)
                                                                    <a href=" {{ asset($item_voucher->file_attachment_bukti) }}"
                                                                        target="_blank">
                                                                        Lihat Dok
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endisset
                                                        </td>
                                                        <td style="width: 50px; padding: 5px 3px; text-align: center">
                                                            @isset($item_voucher->file_attachment)
                                                                @if ($item_voucher->file_attachment)
                                                                    <a href=" {{ asset($item_voucher->file_attachment) }}"
                                                                        target="_blank">
                                                                        Lihat Bukti
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endisset
                                                        </td>
                                                        <td
                                                            style="padding: 5px 3px; text-align: center; background-color: {{ $item_voucher->status_voucher == 'Aktif' ? '#70ff70' : '#ff7070' }}">
                                                            {{ $item_voucher->status_voucher }}
                                                        </td>
                                                        <td style="padding: 5px 3px;" hidden>
                                                            {{ $item_voucher->id_user_input }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher->address_branch }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher->company_branch }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher->tanggal_kadaluarsa }}
                                                        </td>
                                                        {{-- <td></td> --}}
                                                        <td class="ceklist" id="ceklist' + x +'" align="center">
                                                            <input name="chk[]" id="chk[]" type="checkbox"
                                                                class="checkbox" value="{{ $item_voucher->id }}" />
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-nopol="{{ $item_voucher->no_polisi }}"
                                                                data-kode-bbm="{{ $item_voucher->kode_bbm }}">View</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="attachmentModal" tabindex="-1"
                                        aria-labelledby="attachmentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                @if (Auth::user()->roles == 'Superadmin')
                                                    <form id="attachmentForm" enctype="multipart/form-data"
                                                        method="POST"
                                                        action="{{ route('admin.voucher.saveattachment') }}">
                                                    @elseif(Auth::user()->roles == 'Admin')
                                                        <form id="attachmentForm" enctype="multipart/form-data"
                                                            method="POST"
                                                            action="{{ route('user.voucher.saveattachment') }}">
                                                @endif
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="attachmentModalLabel">Upload File &
                                                        Perbaikan Rasio</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="kode_bbm" name="kode_bbm" value="">
                                                    <input type="hidden" id="no_polisi" name="no_polisi"
                                                        value="">

                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">File
                                                            Attachment</label>
                                                        <input class="form-control" type="file" id="file_attachment"
                                                            name="file_attachment" required>
                                                    </div>
                                                    @if (Auth::user()->roles == 'Superadmin')
                                                        <!-- Checkbox untuk menampilkan input Rasio -->
                                                        <div class="mb-3">
                                                            <input type="checkbox" id="toggleRasio" name="toggleRasio">
                                                            <label for="toggleRasio">Tambahkan Rasio</label>
                                                        </div>

                                                        <!-- Input Rasio (Awalnya disembunyikan) -->
                                                        <div class="mb-3" id="rasioContainer" style="display: none;">
                                                            <label for="rasio" class="form-label">Rasio</label>
                                                            <input class="form-control" type="text" id="rasio"
                                                                name="rasio" required>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <h4 class="mb-sm-0 font-size-18"></h4>
                                                <div class="page-title-right">
                                                    <!-- <a href="{{ route('admin.voucher.pdf') }}" target="_blank" class="btn btn-primary btn-sm">C e t a k</a> -->
                                                    <button id="print-selected" class="btn btn-primary btn-sm"
                                                        target="_blank">C
                                                        e t a k</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="expired">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                     @if (Auth::user()->roles == 'Superadmin')
                                        <a href="{{ route('admin.voucher.view_excel_kadaluarsa') }}" target="_blank" style="margin-bottom: 20px;" class="btn btn-success btn-sm" download> E x c e l </a>
                                    @elseif(Auth::user()->roles == 'Admin')
                                        <a href="{{ route('user.voucher.view_excel_kadaluarsa') }}" target="_blank" style="margin-bottom: 20px;" class="btn btn-success btn-sm" download> E x c e l </a>
                                    @endif
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive tabel-sm tabel-sm">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th>No</th>
                                                    <th hidden>Id</th>
                                                    <th>Kode</th>
                                                    <th>Tanggal</th>
                                                    <th hidden>Waktu</th>
                                                    <th>NoPol</th>
                                                    <th>Depo</th>
                                                    <th>Wilayah</th>
                                                    <th>Week</th>
                                                    <th>Salesman</th>
                                                    <th hidden>tipe</th>
                                                    <th>Jenis BBM</th>
                                                    <th>Harga Perliter</th>
                                                    <th>Pemakaian BBM (L)</th>
                                                    <th>Pengisian BBM (L)</th>
                                                    <th>Biaya Pengisian BBM</th>
                                                    <th>Kilometer</th>
                                                    <th>Ratio</th>
                                                    <th hidden>Ratio Ideal</th>
                                                    <th>Keterangan</th>
                                                    <th>File Attachment</th>
                                                    <th>Status</th>
                                                    <th hidden>id User</th>
                                                    {{-- <th>Status Cetak</th> --}}
                                                    {{-- <th>
                                                        Cetak &nbsp; <input type="checkbox" id="select-all"
                                                            class="float-right">
                                                    </th>
                                                    <th>Action</th> --}}

                                                    {{-- <th>Kapasitas Vol</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_voucher_expired as $item_voucher_expired)
                                                    <tr>
                                                        <td style="padding: 5px 3px;" align="center">{{ $no++ }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher_expired->id }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->kode_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->tanggal_bbm }}</td>
                                                        <td style="padding: 5px 3px;" hidden>
                                                            {{ $item_voucher_expired->waktu_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->no_polisi }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->code_branch }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->perusahaan }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->week }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->salesman }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher_expired->tipe }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->jenis_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            <span
                                                                style="float: right;">{{ number_format($item_voucher_expired->harga_perliter) }}</span>
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher_expired->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher_expired->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            {{ number_format($item_voucher_expired->biaya_bbm) }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->kilometer }}
                                                        </td>
                                                        {{-- <td style="padding: 5px 3px;">{{ $item_voucher_expired->ratio_actual }}</td> --}}
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->ratio_ideal }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_expired->keterangan_bbm }}</td>
                                                        <td style=" width: 50px; padding: 5px 3px; text-align: center">
                                                            @isset($item_voucher_expired->file_attachment_bukti)
                                                                @if ($item_voucher_expired->file_attachment_bukti)
                                                                    <a href=" {{ asset($item_voucher_expired->file_attachment_bukti) }}"
                                                                        target="_blank">
                                                                        Lihat Dok
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endisset
                                                        </td>
                                                        <td style="padding: 5px 3px;" hidden>
                                                            {{ $item_voucher_expired->id_user_input }}
                                                        </td>
                                                        <td
                                                            style="padding: 5px 3px; text-align: center; background-color: {{ $item_voucher_expired->status_voucher == 'Aktif' ? '#70ff70' : '#ff7070' }}">
                                                            {{ $item_voucher_expired->status_voucher }}
                                                        </td>
                                                        {{-- <td></td> --}}
                                                        {{-- <td class="ceklist" id="ceklist' + x +'" align="center">
                                                            <input name="chk[]" id="chk[]" type="checkbox"
                                                                class="checkbox"
                                                                value="{{ $item_voucher_expired->id }}" />
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
                    <div class="tab-pane fade" id="success">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                @if (Auth::user()->roles == 'Superadmin')
                                        <a href="{{ route('admin.voucher.view_excel_selesai') }}" target="_blank" style="margin-bottom: 20px;" class="btn btn-success btn-sm" download> E x c e l </a>
                                    @elseif(Auth::user()->roles == 'Admin')
                                        <a href="{{ route('user.voucher.view_excel_selesai') }}" target="_blank" style="margin-bottom: 20px;" class="btn btn-success btn-sm" download> E x c e l </a>
                                    @endif
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive tabel-sm tabel-sm">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th>No</th>
                                                    <th hidden>Id</th>
                                                    <th style="min-width: 120px; text-align: center;">Kode</th>
                                                    <th style="min-width: 100px; text-align: center;">Tanggal</th>
                                                    <th hidden>Waktu</th>
                                                    <th style="min-width: 100px; text-align: center;">NoPol</th>
                                                    <th style="min-width: 100px;">Depo</th>
                                                    <th>Wilayah</th>
                                                    <th>Week</th>
                                                    <th>Salesman</th>
                                                    <th hidden>tipe</th>
                                                    <th style="min-width: 70px;">Jenis BBM</th>
                                                    <th style="min-width: 120px; text-align: center;">Harga Perliter</th>
                                                    <th>Pemakaian BBM (L)</th>
                                                    <th>Pengisian BBM (L)</th>
                                                    <th>Biaya Pengisian BBM</th>
                                                    <th>Kilometer</th>
                                                    <th>Ratio</th>
                                                    <th hidden>Ratio Ideal</th>
                                                    <th style=" text-align: center;">Keterangan</th>
                                                    <th hidden>id User</th>
                                                    <th colspan="2" style="min-width: 100px; text-align: center;">File
                                                        Attach</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_voucher_succes as $item_voucher_success)
                                                    <tr>
                                                        <td style="padding: 5px 3px;" align="center">{{ $no++ }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher_success->id }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->kode_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->tanggal_bbm }}</td>
                                                        <td style="padding: 5px 3px;" hidden>
                                                            {{ $item_voucher_success->waktu_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->no_polisi }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->code_branch }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->perusahaan }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->week }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->salesman }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center" hidden>
                                                            {{ $item_voucher_success->tipe }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->jenis_bbm }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            <span
                                                                style="float: right;">{{ number_format($item_voucher_success->harga_perliter) }}</span>
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher_success->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px;" align="center">
                                                            {{ $item_voucher_success->liter_qty }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: right;">

                                                            {{ number_format($item_voucher_success->biaya_bbm) }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->kilometer }}
                                                        </td>
                                                        {{-- <td style="padding: 5px 3px;">{{ $item_voucher_success->ratio_actual }}</td> --}}
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->ratio_ideal }}</td>
                                                        {{-- <td></td> --}}
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            {{ $item_voucher_success->keterangan_bbm }}</td>
                                                        <td style="padding: 5px 3px;" hidden>
                                                            {{ $item_voucher_success->id_user_input }}
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            @isset($item_voucher_success->file_attachment_bukti)
                                                                @if ($item_voucher_success->file_attachment_bukti)
                                                                    <a href=" {{ asset($item_voucher_success->file_attachment_bukti) }}"
                                                                        target="_blank">
                                                                        Lihat Dok
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endisset
                                                        </td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            @isset($item_voucher_success->file_attachment)
                                                                @if ($item_voucher_success->file_attachment)
                                                                    <a href=" {{ asset($item_voucher_success->file_attachment) }}"
                                                                        target="_blank">
                                                                        Lihat Bukti
                                                                    </a>
                                                                @else
                                                                    -
                                                                @endif
                                                            @else
                                                                -
                                                            @endisset
                                                            </a>
                                                        </td>

                                                        {{-- <td></td> --}}
                                                        {{-- <td class="ceklist" id="ceklist' + x +'" align="center">
                                                            <input name="chk_success[]" id="chk_success[]"
                                                                type="checkbox" class="checkbox"
                                                                value="{{ $item_voucher_success->id }}" />
                                                        </td> --}}
                                                        {{-- <td style="padding: 5px 3px; text-align: center">
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-bbm="{{ $item_voucher_success->kode_bbm }}">View</button>
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
        </div>
    </div>
@endsection
@push('script-custome')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select-all').change(function() {
                var isChecked = $(this).prop('checked');

                $('.checkbox').prop('checked', isChecked);
            });

            $('.checkbox').change(function() {
                var totalCheckboxes = $('.checkbox').length;
                var checkedCheckboxes = $('.checkbox:checked').length;

                if (totalCheckboxes === checkedCheckboxes) {
                    $('#select-all').prop('checked', true);
                } else {
                    $('#select-all').prop('checked', false);
                }
            });
        });

        $(document).ready(function() {
            $('#print-selected').click(function() {
                var selectedData = [];

                $('input[name="chk[]"]:checked').each(function() {
                    var row = $(this).closest('tr');
                    selectedData.push(row);
                });

                if (selectedData.length === 0) {
                    alert('Pilih data yang akan di print.');
                    return;
                }

                var printContent =
                    '<div class="print-layout" style="font-family: Arial, sans-serif; padding: 20px; display: flex; flex-wrap: wrap; justify-content: space-between;">';

                selectedData.forEach(function(row, index) {
                    printContent +=
                        `<div class="print-item" style="width: 45%; margin-bottom: 15px; padding: 10px; border: 1px solid #000;">
                            ${(() => {
                                var status = $(row).find('td:nth-child(26)').text().trim();
                                if (status === 'TUA') {
                                    return ` <div class="header" style="display: flex; align-items: center; margin-bottom: 10px;">
                                                <img src="{{ asset('TUA.jpg') }}" alt="Logo" style="width: 70px; height: auto; margin-right: 10px;"> 
                                                <div>              
                                                    <p style="margin: 0;">SURAT PENGANTAR PENGISIAN BBM<br><strong>PT. TIRTA UTAMA ABADI</strong><br>${$(row).find('td:nth-child(25)').text().trim()}</p>
                                                </div>
                                            </div> 
                                            `;
                                } else if (status === 'TU') {
                                    return ` <div class = "header" style = "display: flex; align-items: center; margin-bottom: 10px;" >
                                                <img src = "{{ asset('lp.jpeg') }}" alt = "Logo" style = "width: 70px; height: auto; margin-right: 10px;" >
                                                <div>
                                                    <p style="margin: 0;">SURAT PENGANTAR PENGISIAN BBM <br><strong>PT. LOKON PRIMA</strong><br>${$(row).find('td:nth-child(25)').text().trim()}</p> 
                                                </div> 
                                            </div> 
                                            `;
                                } else if (status === 'TA') {
                                    return ` <div class = "header" style = "display: flex; align-items: center; margin-bottom: 10px;" >
                                                <img src = "{{ asset('wps.jpeg') }}" alt = "Logo" style = "width: 70px; height: auto; margin-right: 10px;" >
                                                <div>
                                                    <p style="margin: 0;">SURAT PENGANTAR PENGISIAN BBM<br><strong>PT.WENANG PALM SOLUSINDO</strong><br>${$(row).find('td:nth-child(25)').text().trim()}</p> 
                                                </div> 
                                            </div> 
                                        `;
                                }
                            })()}

                            <div class="form-group">
                                <label>Kepada Yth:</label>
                                <input type="text" value="SPBU" readonly />
                            </div>
                            <div class="form-group">
                                <label>Nomor:</label>
                                <input type="text"/>
                            </div>
                            <div class="form-group">
                                <p>Mohon di isi Solar / Pertalite / Dexlite*</p>
                            </div>
                            <div class="form-group">
                                <label>No. Kendaraan:</label>
                                <input type="text"  value="${$(row).find('td:nth-child(6)').text().trim()}"  />
                            </div>
                            <div class="form-group">
                                <label>Driver:</label>
                                <input type="text" value=" ${$(row).find('td:nth-child(10)').text().trim()}" />
                            </div>
                            <div class="form-group">
                                <label>Km. Kendaraan:</label>
                                <input type="text" value="${$(row).find('td:nth-child(17)').text().trim()}" />
                            </div>
                            <div class="form-group">
                                <label>Pengisian BBM :</label>
                                <input type="text" value="${$(row).find('td:nth-child(15)').text().trim()}" />
                            </div>
                            <div class="form-group">
                                <label>Biaya Pengisian :</label>
                                <input type="text" value="Rp. ${$(row).find('td:nth-child(16)').text().trim()}" />
                            </div>
                            <div class="note">Note: *coret yang tidak perlu</div>
                            <div class="tanggal_foot">
                                <span></span>
                                <span>${$(row).find('td:nth-child(4)').text().trim()}</span>
                            </div>
                            <div class="footer">
                                <span>Tgl Kadaluarsa: ${$(row).find('td:nth-child(27)').text().trim()}</span>
                                <span>(SPV / Ka. Depo / KPJ / Ka. Ops.)</span>
                            </div>
                        </div>`
                });

                printContent += '</div>';

                var printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write(
                    `<html>
                    <head>
                        <title>Print</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                        }

                        .print-layout {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                        }

                        .print-item {
                            width: 30%;
                            margin-bottom: 15px;
                            padding: 10px;
                            border: 1px solid #000;
                        }

                        .header {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-bottom: 10px;
                            text-align: center;
                            font-size: 12px;
                            border-bottom: 1px solid #ccc;
                            padding-bottom: 5px;
                        }

                        .header img {
                            width: 50px;
                            height: auto;
                        }

                        .container {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            grid-gap: 5mm;
                        }

                        .form {
                            border: 1px solid #000;
                            padding: 10px;
                            margin-bottom: 5mm;
                        }

                        .logo {
                            width: 50px;
                            margin-right: 10px;
                            display: flex;
                            align-items: center;
                        }

                        .logo img {
                            width: 70px;
                            height: auto;
                            margin-left: -10px;
                        }

                        .title {
                            flex-grow: 1;
                        }

                        .title h2 {
                            margin: 0;
                            font-size: 14px;
                            color: #087c9c;
                        }

                        .title h3 {
                            margin: 0;
                            font-size: 28px;
                            color: #087c9c;
                        }

                        .address {
                            font-size: 9px;
                            text-align: center;
                            margin: 0;
                        }

                        .form-group {
                            margin-bottom: 8px;
                            font-size: 12px;
                        }

                        .form-group label {
                            display: inline-block;
                            width: 100px;
                        }

                        .form-group input {
                            border: none;
                            border-bottom: 1px solid #000;
                            width: calc(100% - 110px);
                        }

                        .note {
                            font-size: 10px;
                            font-style: italic;
                            margin: 10px 0;
                        }

                        .tanggal_foot {
                            display: flex;
                            justify-content: space-between;
                            font-size: 10px;
                            margin: 50px;
                        }

                        .footer {
                            display: flex;
                            justify-content: space-between;
                            font-size: 10px;
                            margin-top: 10px;
                        }

                        @mediaprint{
                            body {
                                width: 210mm;
                                height: 297mm;
                            }
                        }
                    </style>
                    <body>`

                );
                printWindow.document.write(printContent);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
    </script>
@endpush
@push('script-custome')
    <script>
        // {{-- Penyimpanan file attachment --}}
        // Event listener untuk mengisi modal dengan kode BBM
        document.addEventListener('DOMContentLoaded', function() {
            const attachmentModal = document.getElementById('attachmentModal');
            attachmentModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang membuka modal
                const kodeBbm = button.getAttribute('data-kode-bbm'); // Ambil kode_bbm
                const nopol = button.getAttribute('data-kode-nopol'); // Ambil kode_bbm
                const modalKodeBbmInput = document.getElementById('kode_bbm');
                const modalKodeNopolInput = document.getElementById('no_polisi');
                modalKodeBbmInput.value = kodeBbm; // Isi field kode_bbm di modal
                modalKodeNopolInput.value = nopol; // Isi field kode_bbm di modal
            });
        });

        // Untuk perbaikan rasio
        document.getElementById('toggleRasio').addEventListener('change', function() {
            let rasioContainer = document.getElementById('rasioContainer');
            let inputs = rasioContainer.querySelectorAll('input'); // Ambil semua input di dalam rasioContainer

            rasioContainer.style.display = this.checked ? 'block' : 'none';


            if (this.checked) {
                rasioContainer.style.display = 'block';
                inputs.forEach(input => input.setAttribute('required', 'true')); // Tambahkan required
            } else {
                rasioContainer.style.display = 'none';
                inputs.forEach(input => input.removeAttribute('required')); // Hapus required
            }
        });
    </script>
@endpush

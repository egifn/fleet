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
                            @if (Auth::user()->roles == 'Superadmin')
                                <a href="{{ route('admin.stnk.create') }}" class="btn btn-primary btn-sm">Tambah Biaya STNK <i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif (Auth::user()->roles == 'Admin')
                                <a href="{{ route('user.stnk.create') }}" class="btn btn-primary btn-sm">Tambah Biaya STNK
                                    <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="nav nav-tabs" style="margin-left: 10px; border-bottom: 0px" id="statusTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#proses" data-bs-toggle="tab">Proses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#selesai" data-bs-toggle="tab">Selesai</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="proses">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
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
                                                    <th>STNK</th>
                                                    <th>5 Tahun</th>
                                                    <th>Biaya STNK</th>
                                                    <th>Aksi</th>
                                                    <th hidden>Id User</th>
                                                    {{-- <th>Kapasitas Vol</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_stnk as $item_stnk)
                                                    <tr>
                                                        <td style="padding: 7px 5px; text-align: center;">
                                                            {{ $no++ }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->id }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->kode_stnk }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tanggal_stnk }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->waktu_stnk }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_polisi }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->code_branch }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->perusahaan }}
                                                        </td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->jenis }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->segmen }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->tipe }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_rangka }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_mesin }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->bulan_exp_stnk }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tgl_pajak_stnk }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tgl_baru_stnk }}</td>
                                                        <td style="padding: 7px 5px;" align="right">
                                                            {{ number_format($item_stnk->biaya_stnk) }}</td>
                                                        <td style="padding: 7px 5px;">
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-stnk="{{ $item_stnk->kode_stnk }}"
                                                                data-no_polisi="{{ $item_stnk->no_polisi }}"
                                                                data-tanggal_exp="{{ $item_stnk->tgl_pajak_stnk }}"
                                                                data-tanggal_5_exp="{{ $item_stnk->tgl_baru_stnk }}">View</button>
                                                        </td>
                                                        <td style="padding: 7px 5px;" hidden>
                                                            {{ $item_stnk->id_user_input }}</td>
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
                                                    <form id="attachmentForm" enctype="multipart/form-data" method="POST"
                                                        action="{{ route('admin.stnk.saveattachment') }}">
                                                    @elseif(Auth::user()->roles == 'Admin')
                                                        <form id="attachmentForm" enctype="multipart/form-data"
                                                            method="POST"
                                                            action="{{ route('user.stnk.saveattachment') }}">
                                                @endif
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="attachmentModalLabel">
                                                        Upload File & Update Data
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="kode_stnk" name="kode_stnk" value="">
                                                    <input type="hidden" id="no_polisi" name="no_polisi" value="">
                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">File
                                                            Attachment</label>
                                                        <input class="form-control" type="file" id="file_attachment"
                                                            name="file_attachment" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">Tanggal STNK
                                                            Expired</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tanggal_exp" id="tanggal_exp" value="" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">Tanggal PLAT
                                                            Expired</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tanggal_exp_plat" id="tanggal_exp_plat" value=""
                                                            readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label"
                                                            style="font-size: 16px">Update
                                                            Data Tanggal</label>
                                                    </div>

                                                    {{-- <div class="mb-3">
                                                <label for="file_attachment" class="form-label">Periode STNK</label>
                                                <select class="form-control form-control-sm detail" name="periode"
                                                    id="periode" data-id="0">
                                                    <option value="">Pilih</option>
                                                    <option value="1">1 Tahun</option>
                                                    <option value="5">5 Tahun</option>
                                                </select>
                                            </div> --}}

                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">Tanggal STNK
                                                            Baru</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tanggal_baru" id="tanggal_baru" value=""
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="file_attachment" class="form-label">Tanggal PLAT
                                                            Baru</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tanggal_plat_baru" id="tanggal_plat_baru"
                                                            value="" readonly>
                                                    </div>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="selesai">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
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
                                                    <th>STNK</th>
                                                    <th>5 Tahun</th>
                                                    <th>Biaya STNK</th>
                                                    <th>Aksi</th>
                                                    <th hidden>Id User</th>
                                                    {{-- <th>Kapasitas Vol</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_stnk_selesai as $item_stnk)
                                                    <tr>
                                                        <td style="padding: 7px 5px; text-align: center;">
                                                            {{ $no++ }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->id }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->kode_stnk }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tanggal_stnk }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->waktu_stnk }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_polisi }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->code_branch }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->perusahaan }}
                                                        </td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->jenis }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->segmen }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_stnk->tipe }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_rangka }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->no_mesin }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->bulan_exp_stnk }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tgl_pajak_stnk }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_stnk->tgl_baru_stnk }}</td>
                                                        <td style="padding: 7px 5px;" align="right">
                                                            {{ number_format($item_stnk->biaya_stnk) }}</td>
                                                        <td style="padding: 7px 5px;">
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-stnk="{{ $item_stnk->kode_stnk }}"
                                                                data-no_polisi="{{ $item_stnk->no_polisi }}"
                                                                data-tanggal_exp="{{ $item_stnk->tgl_pajak_stnk }}"
                                                                data-tanggal_5_exp="{{ $item_stnk->tgl_baru_stnk }}">View</button>
                                                        </td>
                                                        <td style="padding: 7px 5px;" hidden>
                                                            {{ $item_stnk->id_user_input }}</td>
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
    <script>
        // Event listener untuk mengisi modal dengan kode BBM
        document.addEventListener('DOMContentLoaded', function() {
            const attachmentModal = document.getElementById('attachmentModal');
            attachmentModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang membuka modal

                const kodeStnk = button.getAttribute('data-kode-stnk'); // Ambil kode_bbm
                const modalKodeStnkInput = document.getElementById('kode_stnk');

                const no_pol = button.getAttribute('data-no_polisi');
                const modalNoPolInput = document.getElementById('no_polisi');

                const tanggal_exp = button.getAttribute('data-tanggal_exp');
                const tanggal_exp_plat = button.getAttribute('data-tanggal_exp_plat');
                const modalTglExpPlat = document.getElementById('tanggal_exp_plat');
                const modalTglExp = document.getElementById('tanggal_exp');

                console.log('ini tanggalnya : ', tanggal_exp_plat, '&', tanggal_exp);
                modalKodeStnkInput.value = kodeStnk;
                modalNoPolInput.value = no_pol;
                modalTglExpPlat.value = tanggal_exp_plat;
                modalTglExp.value = tanggal_exp;

                if (tanggal_exp != tanggal_exp_plat) {
                    var tanggalPajakSTNK = $('#tanggal_exp').val(); // Ambil nilai dari input
                    var parts = tanggalPajakSTNK.split('-');
                    var tahunBaru = parseInt(parts[0]) + 1;
                    var bulan = parts[1];
                    var tanggal = parts[2];
                    var tanggalSTNKBaru = tahunBaru + '-' + bulan + '-' + tanggal;
                    $('#tanggal_baru').val(tanggalSTNKBaru);
                    $('#tanggal_plat_baru').val('-');
                } else {
                    // STNK
                    var tanggalPajakSTNK = $('#tanggal_exp').val(); // Ambil nilai dari input
                    var parts = tanggalPajakSTNK.split('-');
                    var tahunBaru = parseInt(parts[0]) + 1;
                    var bulan = parts[1];
                    var tanggal = parts[2];
                    var tanggalSTNKBaru = tahunBaru + '-' + bulan + '-' + tanggal;
                    $('#tanggal_baru').val(tanggalSTNKBaru);

                    // PLAT
                    var tanggalPlat = button.getAttribute(
                        'data-tanggal_exp_plat'); // Ambil nilai dari input
                    var parts = tanggalPlat.split('-');
                    var tahunBaru = parseInt(parts[0]) + 5;
                    var bulan = parts[1];
                    var tanggal = parts[2];
                    var tanggalPlatBaru = tahunBaru + '-' + bulan + '-' + tanggal;
                    $('#tanggal_plat_baru').val(tanggalPlatBaru);
                }
            });
        });

        // $('#periode').change(function(e) {
        //     var tanggalPajakSTNK = $('#tanggal_exp').val(); // Ambil nilai dari input
        //     var parts = tanggalPajakSTNK.split('-');
        //     var tahunBaru = parseInt(parts[0]) + 1;
        //     var bulan = parts[1];
        //     var tanggal = parts[2];
        //     var tanggalSTNKBaru = tahunBaru + '-' + bulan + '-' + tanggal;
        //     $('#tanggal_baru').val(tanggalSTNKBaru);

        //     console.log(tanggalPajakSTNK, '=', tanggalSTNKBaru);

        // });
    </script>
@endpush

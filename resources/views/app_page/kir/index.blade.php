@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Biaya Kir</h4>
                        <div class="page-title-right">
                            @if (Auth::user()->roles == 'Superadmin')
                                <a href="{{ route('admin.kir.create') }}" class="btn btn-primary btn-sm">Tambah Biaya Kir <i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif (Auth::user()->roles == 'Admin')
                                <a href="{{ route('user.kir.create') }}" class="btn btn-primary btn-sm">Tambah Biaya Kir <i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
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
                                                    <th>No</th>
                                                    <th hidden>id</th>
                                                    <th>Kode</th>
                                                    <th>Tanggal</th>
                                                    <th>Nomor Polisi</th>
                                                    <th>Depo</th>
                                                    <th>Wilayah</th>
                                                    <th>No Kir 1</th>
                                                    <th>No Kir 2</th>
                                                    <th>Tgl Uji Kir</th>
                                                    <th>Tgl Exp Kir</th>
                                                    <th>Biaya Kir</th>
                                                    <th>Dishub</th>
                                                    <th>Keterangan</th>
                                                    <th>Attachment</th>
                                                    <th hidden>Id User</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_kir as $item_kir)
                                                    <tr>
                                                        <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_kir->id }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->kode_kir }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->tanggal_kir }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->no_polisi }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->code_branch }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->wilayah }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->no_kir_1 }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->no_kir_2 }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->tgl_uji_kir }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->tgl_exp_kir }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->biaya_kir }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->dishub }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir->keterangan }}</td>
                                                        <td style="padding: 5px 3px; text-align: center">
                                                            @isset($item_kir->file_attachment)
                                                                @if ($item_kir->file_attachment)
                                                                    <a href="{{ asset($item_kir->file_attachment) }}"
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
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_kir->id_user_input }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-kir="{{ $item_kir->kode_kir }}"
                                                                data-no_polisi="{{ $item_kir->no_polisi }}"
                                                                data-tanggal_exp="{{ $item_kir->tgl_exp_kir }}">View</button>
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
                                                    <form id="attachmentForm" enctype="multipart/form-data" method="POST"
                                                        action="{{ route('admin.kir.saveattachment') }}">
                                                    @elseif(Auth::user()->roles == 'Admin')
                                                        <form id="attachmentForm" enctype="multipart/form-data"
                                                            method="POST" action="{{ route('user.kir.saveattachment') }}">
                                                @endif
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="attachmentModalLabel">
                                                        Konfirmasi Pembayaran
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="kode_kir" name="kode_kir" value="">
                                                    <input type="hidden" id="no_polisi" name="no_polisi" value="">

                                                    <!-- <div class="mb-3">
                                                                                                            <label for="file_attachment" class="form-label">File Attachment</label>
                                                                                                            <input class="form-control" type="file" id="file_attachment" name="file_attachment" required>
                                                                                                        </div> -->

                                                    <div class="mb-3">
                                                        <label for="tanggal_exp" class="form-label">Tanggal Kir
                                                            Expired</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tanggal_exp" id="tanggal_exp" value="">
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
                                                    <th>No</th>
                                                    <th hidden>id</th>
                                                    <th>Kode</th>
                                                    <th>Tanggal</th>
                                                    <th>Nomor Polisi</th>
                                                    <th>Depo</th>
                                                    <th>Wilayah</th>
                                                    <th>No Kir 1</th>
                                                    <th>No Kir 2</th>
                                                    <th>Tgl Uji Kir</th>
                                                    <th>Tgl Exp Kir</th>
                                                    <th>Biaya Kir</th>
                                                    <th>Dishub</th>
                                                    <th>Keterangan</th>
                                                    <th>File Attachment</th>
                                                    <th hidden>Id User</th>
                                                    <th hidden>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dt_kir_selesai as $item_kir_selesai)
                                                    <tr>
                                                        <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                                        <td style="padding: 7px 5px;" hidden>{{ $item_kir_selesai->id }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->kode_kir }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->tanggal_kir }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->no_polisi }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->code_branch }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->wilayah }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->no_kir_1 }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->no_kir_2 }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->tgl_uji_kir }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->tgl_exp_kir }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->biaya_kir }}
                                                        </td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->dishub }}</td>
                                                        <td style="padding: 7px 5px;">{{ $item_kir_selesai->keterangan }}
                                                        <td style="padding: 7px 5px;">
                                                            {{ $item_kir_selesai->file_attachment }}
                                                        </td>
                                                        <td style="padding: 7px 5px;" hidden>
                                                            {{ $item_kir_selesai->file_attachment }}</td>
                                                        <td style="padding: 7px 5px;" hidden>
                                                            {{ $item_kir_selesai->id_user_input }}</td>
                                                        <td style="padding: 7px 5px;" hidden>
                                                            <button class="button-action" data-bs-toggle="modal"
                                                                data-bs-target="#attachmentModal"
                                                                data-kode-kir="{{ $item_kir_selesai->kode_kir }}"
                                                                data-no_polisi="{{ $item_kir_selesai->no_polisi }}"
                                                                data-tanggal_exp="{{ $item_kir_selesai->tgl_exp_kir }}">View</button>
                                                        </td>
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
        document.addEventListener('DOMContentLoaded', function() {
            const attachmentModal = document.getElementById('attachmentModal');
            attachmentModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang membuka modal

                const kodeKir = button.getAttribute('data-kode-kir'); // Ambil kode_bbm
                const modalKodeKirInput = document.getElementById('kode_kir');

                const no_pol = button.getAttribute('data-no_polisi');
                const modalNoPolInput = document.getElementById('no_polisi');

                const tanggal_exp = button.getAttribute('data-tanggal_exp');
                const modalTglExp = document.getElementById('tanggal_exp');

                modalKodeKirInput.value = kodeKir; // Isi field kode_bbm di modal
                modalNoPolInput.value = no_pol;
                modalTglExp.value = tanggal_exp;

            });
        });
    </script>
@endpush

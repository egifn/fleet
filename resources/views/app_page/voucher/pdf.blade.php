@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            @if (Auth::user()->roles == 'Superadmin')
                <form action="{{ route('admin.bbm.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
                @elseif (Auth::user()->roles == 'Admin')
                    <form action="{{ route('user.bbm.view_excel') }}" target="_blank" method="get"
                        enctype="multipart/form-data">
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Voucher BBM</h4>
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                            @if (Auth::user()->roles == 'Superadmin')
                                <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary btn-sm">Buat Voucher
                                    BBM <i class="mdi mdi-arrow-right ms-1"></i></a>
                            @elseif (Auth::user()->roles == 'Admin')
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
                <span class="text-danger"><strong>PABRIK (SUPPLIER) (<span class="text-primary">-</span>)</strong></span>
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
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
                                            <th hidden>tipe</th>
                                            <th>Jenis BBM</th>
                                            <th>Harga Perliter</th>
                                            <th>Pengisian BBM</th>
                                            <th>Biaya Pengisian BBM</th>
                                            <th>Kilometer</th>
                                            <th>Ratio Aktual</th>
                                            <th>Ratio Ideal</th>
                                            <th>Keterangan</th>
                                            <th hidden>id User</th>
                                            <th>File Attach</th>
                                            <th>Status Cetak</th>
                                            <th>Pilih Cetak &nbsp; <input type="checkbox" id="select-all"
                                                    class="float-right"></th>
                                            <th>Action</th>

                                            {{-- <th>Kapasitas Vol</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
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
                                                <td style="padding: 7px 5px;" hidden>{{ $item_bbm->tipe }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_bbm->jenis_bbm }}</td>
                                                <td style="padding: 7px 5px;" align="right">
                                                    {{ number_format($item_bbm->harga_perliter) }}</td>
                                                <td style="padding: 7px 5px;" align="right">
                                                    {{ $item_bbm->liter_qty }} ltr
                                                </td>
                                                <td style="padding: 7px 5px;" align="right">
                                                    {{ number_format($item_bbm->biaya_bbm) }}
                                                </td>
                                                <td style="padding: 7px 5px;">{{ $item_bbm->kilometer_akhir }} km</td>
                                                <td style="padding: 7px 5px;">{{ $item_bbm->ratio_actual }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_bbm->ratio_ideal }}</td>
                                                <td style="padding: 7px 5px;">{{ $item_bbm->keterangan_bbm }}</td>
                                                <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id_user_input }}</td>
                                                <td style="padding: 7px 5px;"><a
                                                        href="{{ url('images/' . $item_bbm->filename) }}"
                                                        target="_blank">{{ $item_bbm->filename }}</a></td>
                                                <td></td>
                                                <td class="ceklist" id="ceklist' + x +'" align = "center">
                                                    <input name="chk[]" id="chk[]" type="checkbox" class="checkbox"
                                                        value = "{{ $item_bbm->id }}" />
                                                </td>
                                                @if (Auth::user()->roles == 'Superadmin')
                                                    <td style="padding: 7px 5px;">
                                                        <a href="{{ route('admin.voucher.detail', $item_bbm->id) }}"
                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                            style="padding: 1px 10px 1px 10px;">View</a>
                                                    </td>
                                                @elseif (Auth::user()->roles == 'Admin')
                                                    <td style="padding: 7px 5px;">
                                                        <a href="{{ route('user.voucher.detail', $item_bbm->id) }}"
                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                            style="padding: 1px 10px 1px 10px;">View</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18"></h4>
                                        <div class="page-title-right">
                                            <!-- <a href="{{ route('admin.voucher.pdf') }}" target="_blank" class="btn btn-primary btn-sm">C e t a k</a> -->
                                            <button id="print-selected" class="btn btn-primary btn-sm" target="_blank">C e t
                                                a k</button>
                                        </div>
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
                        '<div class="print-item" style="width: 45%; margin-bottom: 15px; padding: 10px; border: 1px solid #000;">';
                    //logo dan alamat
                    printContent +=
                        '<div class="header" style="display: flex; align-items: center; margin-bottom: 10px;">';
                    printContent +=
                        '<img src="{{ asset('lp.jpeg') }}" alt="Logo" style="width: 70px; height: auto; margin-right: 10px;">'; // Gambar di kiri, beri margin kanan
                    printContent += '<div>';
                    printContent +=
                        '<p style="margin: 0;">SURAT PENGANTAR PENGISIAN BBM<br><strong>PT. LOKON PRIMA</strong><br>Jalan Contoh No. 123, Kota</p>';
                    printContent += '</div>';
                    printContent += '</div>'; // Tutup flex container

                    printContent += '<hr>';
                    // Datanya
                    printContent += '<p>Mohon di isi Solar/Pertalite/Dexlite*</p>';
                    printContent += '<p>No Polisi: ' + $(row).find('td:nth-child(6)').text()
                        .trim() + '</p>';
                    printContent += '<p>Salesman: ' + $(row).find('td:nth-child(10)').text()
                        .trim() + '</p>';
                    printContent += '<p>Kilometer: ' + $(row).find('td:nth-child(16)').text()
                        .trim() + '</p>';
                    printContent += '<p>Liter: ' + $(row).find('td:nth-child(14)').text().trim() +
                        '</p>';
                    printContent += '<p>Biaya BBM: ' + $(row).find('td:nth-child(15)').text()
                        .trim() + '</p>';
                    printContent += '<br>';
                    printContent += '<p>Note: *coret yang tidak perlu</p>';
                    printContent += '<p>Bogor, Januari 2025</p>';

                    printContent += '</div>';
                });

                printContent += '</div>';

                var printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write(
                    '<html><head><title>Print</title><style>body { font-family: Arial, sans-serif; margin: 0; padding: 0; } .print-layout { display: flex; flex-wrap: wrap; justify-content: space-between; } .print-item { width: 30%; margin-bottom: 15px; padding: 10px; border: 1px solid #000; } .header img { width: 50px; height: auto; } .header { text-align: center; margin-bottom: 10px; }</style></head><body>'
                );
                printWindow.document.write(printContent);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
    </script>
@endpush

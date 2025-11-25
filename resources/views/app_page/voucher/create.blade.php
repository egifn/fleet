@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Buat Voucher</h4>
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
                            @if (Auth::user()->roles == 'Superadmin')
                                <form action="{{ route('admin.voucher.insert') }}" method="post"
                                    enctype="multipart/form-data">
                                @elseif (Auth::user()->roles == 'Admin')
                                    <form action="{{ route('user.voucher.insert') }}" method="post"
                                        enctype="multipart/form-data">
                            @endif
                            {{ csrf_field() }}

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Polisi<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="text" class="form-control form-control-sm" name="no_polisi"
                                            id="no_polisi" value="" placeholder="" required readonly>
                                        <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form2"
                                            class="btn btn-secondary waves-effect" name="button_cari" id="button_cari"
                                            value="no_pol" style="height: 28px;">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo <span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="depo" id="depo"
                                        value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Wilayah<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="wilayah" id="wilayah"
                                        value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Week<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="week" id="week"
                                        value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Salesman<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="salesman"
                                        id="salesman" value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <!-- <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen<span
                                            class="text-danger"><small>*</small></span> </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="segmen" id="segmen"
                                            value="" placeholder="" required readonly>
                                    </div> -->
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"
                                    style="text-align: left">Kapasitas Tanki<span
                                        class="text-danger"><small>*</small></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="kapasitas_tanki"
                                        id="kapasitas_tanki" placeholder="0" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1" hidden>
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tipe<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="tipe"
                                        id="tipe" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            {{-- <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis BBM<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="jenis_bbm" id="jenis_bbm" value="" placeholder="" required readonly>
                                </div>
                            </div> --}}
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis BBM <span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="text" class="form-control form-control-sm" name="jenis_bbm"
                                            id="jenis_bbm" value="" placeholder="" required readonly>
                                        <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form-bbm"
                                            class="btn btn-secondary waves-effect" name="button_cari_bbm"
                                            id="button_cari_bbm" value="jenis_bbm" style="height: 28px;">Cari</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga
                                    perliter<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="harga_perliter"
                                        id="harga_perliter" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kilometer
                                    <span class="text-danger"><small>*</small></span></label>

                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label"
                                    style="text-align: left">Awal<span class="text-danger"><small>*</small></span>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="kilometer_terakhir"
                                        id="kilometer_terakhir" value="0" placeholder="" required disabled>
                                </div>
                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label"
                                    style="text-align: left">
                                </label>

                                <label for="horizontal-firstname-input" class="col-sm-1 col-form-label"
                                    style="text-align: left">Akhir<span class="text-danger"><small>*</small></span>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="kilometer"
                                        id="kilometer" placeholder="0" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Pengisian BBM
                                    (L)<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="liter_qty"
                                        id="liter_qty" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Biaya Pengisian
                                    BBM<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm mb-2" name="biaya_bbm"
                                        id="biaya_bbm" value="" placeholder="" required readonly hidden>
                                    <input type="text" class="form-control form-control-sm mb-2"
                                        name="biaya_bbm_display" id="biaya_bbm_display" value="" placeholder=""
                                        required readonly>


                                </div>
                            </div>
                            <div class="row mb-1" hidden>
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ratio Aktual<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="ratio_aktual"
                                        id="ratio_aktual" value="0 " placeholder="" disabled>
                                    <input type="hidden" class="form-control form-control-sm" name="ratio_aktual_temp"
                                        id="ratio_aktual_temp" value="0" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ratio<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="ratio_ideal"
                                        id="ratio_ideal" value="0" placeholder="" readonly required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label d-none">Keterangan<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm d-none" name="ket"
                                        id="ket" placeholder="" readonly required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label d-none">Exp<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm d-none" name="exp"
                                        id="exp" placeholder="" readonly required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">File
                                    Attachment</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm"
                                        name="file_attachment_bukti" id="file_attachment_bukti" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Foto Kilometer
                                    Terakhir</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="bukti_km"
                                        id="bukti_km" placeholder="" required>
                                    <label
                                        style="margin: 0; font-size: x-small; font-style: italic; color :red; padding-left: 80px;">*Foto
                                        KM* Terakhir</label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>
                        </form>
                    </div>

                    <!--  Large modal example -->
                    <div class="modal fade modal-form2" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="#" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Data Kendaraan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3 col-md-6 float-right">
                                            <input type="text" name="search" id="search" class="form-control"
                                                placeholder="Cari . . .">
                                        </div>
                                        <div style="border:1px white;width:100%;height:470px;overflow-y:scroll;">
                                            <table id="lookup" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th hidden>Id</th>
                                                        <th>No Pol</th>
                                                        <th>No Rangka</th>
                                                        <th>No mesin</th>
                                                        <th>Nama Pemilik</th>
                                                        <th>Merk</th>
                                                        <th>Tipe</th>
                                                        <th>Tahun</th>
                                                        <th>Warna</th>
                                                        <th>CC</th>
                                                        <th>Secondary/Primary</th>
                                                        <th>Depo</th>
                                                        <th>Wilayah</th>
                                                        <th>segmen</th>
                                                        <th>status</th>
                                                        <th>Kapasitan Tanki</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabledataModalKendaraan" data-dismiss="modal">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                    <!--  Large modal example -->
                    <div class="modal fade modal-form-bbm" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="#" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Data BBM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3 col-md-6 float-right">
                                            <input type="text" name="search_bbm" id="search_bbm" class="form-control"
                                                placeholder="Cari . . .">
                                        </div>
                                        <div style="border:1px white;width:100%;height:470px;overflow-y:scroll;">
                                            <table id="lookup_bbm" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th hidden>Id</th>
                                                        <th>Jenis BBM</th>
                                                        <th hidden>Penempatan</th>
                                                        <th>Harga perliter</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabledataModalBbm" data-dismiss="modal">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script-custome')
    <script>
        // $(document).on('click', '.pilih', function (e) {
        //     $("#no_polisi").val($(this).attr('data-no_pol'))
        //     $("#id_depo").val($(this).attr('data-penempatan'))
        //     $("#depo").val($(this).attr('data-nama_penempatan'))
        //     $("#wilayah").val($(this).attr('data-perusahaan'))
        //     $("#segmen").val($(this).attr('data-segmen'))
        //     $("#kapasitas").val($(this).attr('data-kapasitas'))
        //     $("#ritase_ideal").val($(this).attr('data-ritase'))
        //     $("#ritase_real").val($(this).attr('data-ritase_real'))
        //     $("#vol_ideal").val($(this).attr('data-vol_ideal'))

        //     $('.modal-form2').modal('hide');
        //     // $("#kode_transaksi").focus();
        // });

        $(document).on('click', '.pilih', function(e) {
            $("#no_polisi").val($(this).attr('data-no_pol'))
            $("#id_depo").val($(this).attr('data-penempatan'))
            $("#depo").val($(this).attr('data-nama_penempatan'))
            $("#wilayah").val($(this).attr('data-perusahaan'))
            $("#segmen").val($(this).attr('data-segmen'))
            $("#kapasitas").val($(this).attr('data-kapasitas'))
            $("#ritase_ideal").val($(this).attr('data-ritase'))
            $("#ritase_real").val($(this).attr('data-ritase_real'))
            $("#vol_ideal").val($(this).attr('data-vol_ideal'))
            $("#ratio_ideal").val($(this).attr('data-ratio'))
            $("#kapasitas_tanki").val($(this).attr('data-tanki'))

            let cari_nopol = $(this).attr('data-no_pol');

            $(document).ready(function() {
                let userRole = "{{ Auth::user()->roles }}"; // Ambil role pengguna dari server

                if (userRole === 'Superadmin') {
                    $.ajax({
                        type: "GET",
                        url: `{{ route('admin.voucher.getkm') }}`,
                        data: {
                            cari_nopol: cari_nopol
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response && response.data && response.data.kilometer) {
                                $("#kilometer_terakhir").val(response.data.kilometer);
                            } else {
                                $("#kilometer_terakhir").val("0");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching data:", error);
                            $("#kilometer_terakhir").val("0"); // Set default value on error
                        }
                    });
                } else {
                    $.ajax({
                        type: "GET",
                        url: `{{ route('user.bbm.getkm') }}`,
                        data: {
                            cari_nopol: cari_nopol
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response && response.data && response.data.kilometer) {
                                $("#kilometer_terakhir").val(response.data.kilometer);
                            } else {
                                $("#kilometer_terakhir").val("0");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching data:", error);
                            $("#kilometer_terakhir").val("0"); // Set default value on error
                        }
                    });
                }
            });


            $('.modal-form2').modal('hide');
            // $("#kode_transaksi").focus();
        });

        $(document).on('click', '.pilih_bbm', function(e) {
            $("#jenis_bbm").val($(this).attr('data-bbm'))
            $("#harga_perliter").val($(this).attr('data-harga'))

            $('.modal-form-bbm').modal('hide');
            updateCalculations();
            // $("#kode_transaksi").focus();
        });

        fetch_data_bbm();

        function fetch_data_bbm() {
            $.ajax({
                type: "GET",
                url: "{{ route('json.data.bbm') }}",
                dataType: "json",
                success: function(response) {
                    let tabledataModalBbm
                    response.data.forEach(bbm => {
                        tabledataModalBbm += `
                        <tr class="pilih_bbm" data-id_bbm="${bbm.id}" data-bbm="${bbm.jenis_bbm}" data-harga="${bbm.harga_perliter}">
                            <td hidden>${bbm.id}</td>
                            <td >${bbm.jenis_bbm}</td>
                            <td hidden>${bbm.name_branch}</td>
                            <td >${bbm.harga_perliter}</td>
                        </tr>
                    `;
                    });
                    $("#tabledataModalBbm").html(tabledataModalBbm);
                }
            });
        }

        fetch_data_kendaraan();

        function fetch_data_kendaraan() {
            $.ajax({
                type: "GET",
                url: "{{ route('json.data.kendaraan') }}",
                dataType: "json",
                success: function(response) {
                    // console.log(response.no_polisi);
                    // console.log(response);

                    let tabledataModalKendaraan;
                    response.data.forEach(kendaraan => {
                        tabledataModalKendaraan +=
                            `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" data-ritase_real="1"
                                                data-vol_ideal="${kendaraan.vol_ideal}" data-ratio="${kendaraan.rasio_ideal}"
                                                data-tanki="${kendaraan.kapasitas_tanki}">`;

                        tabledataModalKendaraan += `<td hidden>${kendaraan.id}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_polisi}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_rangka}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_mesin}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.nama_pemilik}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.merek}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.type}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.tahun}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.warna}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.kapasitas_mesin}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.kategori}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.penempatan}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.name_branch}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.perusahaan}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.nama_segmen}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.status_kendaraan}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.ritase}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.rasio_ideal}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.vol_ideal}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.kapasitas_tanki}</td>`;
                        tabledataModalKendaraan += `</tr>`;
                    });
                    $("#tabledataModalKendaraan").html(tabledataModalKendaraan);
                }
            });
        }

        $('#search').keyup(function() {
            let search = $('#search').val();
            $.ajax({
                type: "GET",
                url: `{{ route('json.data.kendaraan') }}`,
                data: {
                    search: search
                },
                dataType: "json",

                success: function(response) {
                    let tabledataModalKendaraan;
                    response.data.forEach(kendaraan => {
                        tabledataModalKendaraan +=
                            `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" data-ritase_real="1"
                                                data-vol_ideal="${kendaraan.vol_ideal}" data-ratio="${kendaraan.rasio_ideal}"
                                                data-vol_ideal="${kendaraan.kapasitas_tanki}">`;

                        tabledataModalKendaraan += `<td hidden>${kendaraan.id}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_polisi}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_rangka}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.no_mesin}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.nama_pemilik}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.merek}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.type}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.tahun}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.warna}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.kapasitas_mesin}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.kategori}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.penempatan}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.name_branch}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.perusahaan}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.nama_segmen}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.status_kendaraan}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.ritase}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.vol_ideal}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.rasio_ideal}</td>`;
                        tabledataModalKendaraan +=
                            `<td hidden>${kendaraan.kapasitas_tanki}</td>`;
                        tabledataModalKendaraan += `</tr>`;
                    });
                    $("#tabledataModalKendaraan").html(tabledataModalKendaraan);
                }

            });
        });



        // function jumlah_ltr(x) {
        //     var harga = parseInt($("input[name='harga_perliter']").val());
        //     var qty_liter = $('#liter_qty').val();

        //     var biaya_bbm = harga * qty_liter;
        //     var hasil_biaya_bbm = biaya_bbm.toFixed(1)

        //     // var reverse_harga = hasil_biaya_bbm.toString().split('').reverse().join(''),
        //     //     ribuan_harga  = reverse_harga.match(/\d{1,3}/g);
        //     //     harga_jadi = ribuan_harga.join(',').split('').reverse().join('');

        //     console.log("Harga : ");
        //     console.log(biaya_bbm);
        //     $('#biaya_bbm').val(hasil_biaya_bbm);
        // }

        // function input_oto(x) {
        //     var km_terakhir = ($("input[name='kilometer_terakhir']").val());
        //     var km_baru = ($("input[name='kilometer']").val());
        //     var liter = ($("input[name='liter_qty']").val());

        //     var rasio_aktual = ((km_baru - km_terakhir) / liter).toFixed(2);

        //     $('#ratio_aktual').val(rasio_aktual);
        //     $('#ratio_aktual_temp').val(rasio_aktual);
        // }
    </script>

    {{-- Liter, Biaya BBM --}}
    <script>
        function calculateFuel() {
            // Get input elements
            const kilometerInput = document.getElementById('kilometer');
            const kilometerTerakhirInput = document.getElementById('kilometer_terakhir');
            const ratioIdealInput = document.getElementById('ratio_ideal');
            const literQtyInput = document.getElementById('liter_qty');
            const biayaBbmInput = document.getElementById('biaya_bbm');
            const hargaPerliterInput = document.getElementById('harga_perliter');
            const kapasitasTanki = document.getElementById('kapasitas_tanki')

            // Function to format numbers with thousand separators
            function formatNumber(number) {
                return number.toLocaleString('id-ID');
            }

            // Function to parse formatted number string back to number
            function parseFormattedNumber(str) {
                return parseFloat(str.replace(/[,.]/g, '')) || 0;
            }

            function updateCalculations() {
                // Get current values and convert to numbers
                const kilometer = parseFloat(kilometerInput.value) || 0;
                const kilometerTerakhir = parseFloat(kilometerTerakhirInput.value) || 0;
                const ratioIdeal = parseFloat(ratioIdealInput.value) || 1; // prevent division by zero
                const hargaPerliter = parseFormattedNumber(hargaPerliterInput.value);

                // Calculate liter quantity
                const literQty = (kilometer - kilometerTerakhir) / ratioIdeal;
                console.log("Liter : ", literQty);

                // Calculate total cost
                const biayaBbm = literQty * hargaPerliter;
                console.log("Biaya BBM: ", biayaBbm);

                // Update inputs with formatted values
                literQtyInput.value = literQty.toFixed(2);
                biayaBbmInput.value = biayaBbm; // Original value without formatting
                document.getElementById('biaya_bbm_display').value = formatRupiah(biayaBbm);
            }

            // Fungsi format Rupiah
            function formatRupiah(angka) {
                return 'Rp ' + angka.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            // Function to handle harga perliter input
            function handleHargaPerliterChange() {
                // Remove non-numeric characters except decimal point
                let value = hargaPerliterInput.value.replace(/[^\d]/g, '');

                // Format the number with thousand separators
                if (value) {
                    const number = parseInt(value, 10);
                    hargaPerliterInput.value = formatNumber(number);
                }

                // Update calculations
                updateCalculations();
            }

            // Add event listeners for input changes
            kilometerInput.addEventListener('input', updateCalculations);
            kilometerTerakhirInput.addEventListener('input', updateCalculations);
            ratioIdealInput.addEventListener('input', updateCalculations);

            // Add event listeners for harga perliter
            hargaPerliterInput.addEventListener('input', handleHargaPerliterChange);
            hargaPerliterInput.addEventListener('change', handleHargaPerliterChange);

            // Add mutation observer to watch for changes to harga perliter value
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'value') {
                        updateCalculations();
                    }
                });
            });

            observer.observe(hargaPerliterInput, {
                attributes: true,
                attributeFilter: ['value']
            });

            // Initial calculation
            updateCalculations();
        }

        // Initialize calculations when document is ready
        document.addEventListener('DOMContentLoaded', calculateFuel);
    </script>
    <script>
        function updateScheduleStatus() {
            let inputFieldket = document.getElementById("ket");
            let inputFieldexp = document.getElementById("exp");
            let fileAttachmentDiv = document.getElementById("file_attachment_div");
            let today = new Date().getDay(); // Mengambil hari dalam angka (0 = Minggu, ..., 6 = Sabtu)

            // Jika hari ini Sabtu (6), set nilai menjadi "On Schedule", jika tidak "Off Schedule"
            if (today === 3 || today === 6) {
                inputFieldket.value = "On Schedule";
                inputFieldexp.value = "8";
                fileAttachmentDiv.style.display = "none";
            } else {
                inputFieldket.value = "Off Schedule";
                inputFieldexp.value = "8";
                fileAttachmentDiv.style.display = "block";
            }
        }

        // Panggil fungsi saat halaman dimuat
        window.onload = updateScheduleStatus;
    </script>
@endpush

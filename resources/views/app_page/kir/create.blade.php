@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">INPUT BIAYA KIR</h4>
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
                                <form action="{{ route('admin.kir.insert') }}" method="post" enctype="multipart/form-data">
                                @elseif (Auth::user()->roles == 'Admin')
                                    <form action="{{ route('user.kir.insert') }}" method="post"
                                        enctype="multipart/form-data">
                            @endif
                            {{ csrf_field() }}
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Polisi <span
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
                            <!-- <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No STNK <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="no_stnk" id="no_stnk" value="" placeholder="" readonly>
                                                        </div>
                                                    </div> -->
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Wilayah<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="wilayah" id="wilayah"
                                        value="" placeholder="" required readonly>
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
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Kir 1<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_kir_1"
                                        id="no_kir_1" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Kir 2 <span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_kir_2"
                                        id="no_kir_2" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tgl Exp Kir<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="tgl_exp_kir"
                                        id="tgl_exp_kir" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Kontrol
                                    Kir<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_kontrol_kir"
                                        id="no_kontrol_kir" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Kir<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="status_kir"
                                        id="status_kir" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tgl Uji Kir<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm" name="tgl_uji_kir"
                                        id="tgl_uji_kir" value="" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Biaya Kir<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="biaya_kir"
                                        id="biaya_kir" value="" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">DISHUB<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="dishub"
                                        id="dishub" value="" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Keterangan<span
                                        class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="keterangan"
                                        id="keterangan" value="" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">File
                                    Attachment</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="file_attachment"
                                        id="file_attachment" placeholder="">
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
                                                <table id="lookup"
                                                    class="table table-bordered table-hover table-striped">
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
                                                            <th>status</th>
                                                            <th>Wilayah</th>
                                                            <th>segmen</th>
                                                            <th>segmen kendaraan</th>
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
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Save</button>
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
        $(document).on('click', '.pilih', function(e) {
            $("#no_polisi").val($(this).attr('data-no_pol'))
            $("#id_depo").val($(this).attr('data-penempatan'))
            $("#depo").val($(this).attr('data-nama_penempatan'))
            $("#wilayah").val($(this).attr('data-perusahaan'))
            $("#no_kir_1").val($(this).attr('data-bulan_no_kir_1'))
            $("#no_kir_2").val($(this).attr('data-bulan_no_kir_2'))
            $("#tgl_exp_kir").val($(this).attr('data-masa_berlaku'))
            $("#tgl_uji_kir").val($(this).attr('data-tgl_uji_kir'))
            $("#no_kontrol_kir").val($(this).attr('data-no_kontrol_kir'))
            $("#status_kir").val($(this).attr('data-status_kir'))
            $('.modal-form2').modal('hide');
        });

        fetch_data_kendaraan();

        function fetch_data_kendaraan() {
            $.ajax({
                type: "GET",
                url: "{{ route('json.data.kendaraan') }}",
                dataType: "json",
                success: function(response) {
                    let tabledataModalKendaraan;
                    response.data.forEach(kendaraan => {
                        tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-rangka="${kendaraan.no_rangka}"
                                                data-mesin="${kendaraan.no_mesin}"
                                                data-bulan_no_kir_1="${kendaraan.bulan_no_kir_1}"
                                                data-bulan_no_kir_2="${kendaraan.bulan_no_kir_2}"
                                                data-masa_berlaku="${kendaraan.masa_berlaku_kir}"
                                                data-no_kontrol_kir="${kendaraan.no_kontrol_kir}"
                                                data-status_kir="${kendaraan.status_kir}">`;

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
                        tabledataModalKendaraan += `<td hidden>${kendaraan.bulan_exp_stnk}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.tgl_pajak_stnk}</td>`;
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
                        tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-rangka="${kendaraan.no_rangka}"
                                                data-mesin="${kendaraan.no_mesin}"
                                                data-bulan_no_kir_1="${kendaraan.bulan_no_kir_1}"
                                                data-bulan_no_kir_2="${kendaraan.bulan_no_kir_2}"
                                                data-masa_berlaku="${kendaraan.masa_berlaku_kir}"
                                                data-no_kontrol_kir="${kendaraan.no_kontrol_kir}"
                                                data-status_kir="${kendaraan.status_kir}">`;

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
                        tabledataModalKendaraan += `</tr>`;
                    });
                    $("#tabledataModalKendaraan").html(tabledataModalKendaraan);
                }

            });
        });
    </script>
@endpush

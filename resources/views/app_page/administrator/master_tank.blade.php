@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">DATA KENDARAAN</h4>
                        <form action="{{ route('admin.kendaraan.view_excel') }}" target="_blank" method="get"
                            enctype="multipart/form-data">
                            <div class="page-title-right">
                                <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                                <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form"
                                    class="btn btn-primary btn-sm">Tambah Data <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </form>
                        <!--  Large modal example -->
                        <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('admin.kendaraan.update_add_tank') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Tambah Kendaraan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">No Polisi<span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-4">
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="text" class="form-control form-control-sm" name="no_polisi"
                                                            id="no_polisi" value="" placeholder="" required readonly>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form2"
                                                            class="btn btn-secondary waves-effect" name="button_cari" id="button_cari"
                                                            value="no_pol" style="height: 28px;">Cari</button>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-sm-4" hidden>
                                                    <input type="hidden"
                                                        class="form-control form-control-sm"
                                                        name="id_kendaraan" id="id_kendaraan"
                                                        value=""
                                                        placeholder="">
                                                </div>

                                                <label for="horizontal-firstname-input"
                                                        class="col-sm-2 col-form-label">Nama Pemilik </label>
                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="nama_pemilik" id="nama_pemilik"
                                                                        value=""
                                                                        placeholder="" readonly>
                                                </div>
                                            </div>
                                                                                                        
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Merek </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="merek" id="merek"
                                                                        value=""
                                                                        placeholder="" readonly>
                                                                </div>

                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Perusahaan </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="perusahaan" id="perusahaan"
                                                                        value=""
                                                                        placeholder="" readonly>
                                                                </div>

                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Tipe</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="type" id="type"
                                                                        value=""
                                                                        placeholder="" readonly>
                                                                </div>

                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Penempatan </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="penempatan" id="penempatan"
                                                                        value=""
                                                                        placeholder="" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kapasitas Tank </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="kapasitas_tank_add" id="kapasitas_tank_add"
                                                                        value=""
                                                                        placeholder="">
                                                                </div>
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
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable"
                                class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>id</th>
                                        <th>Nomor Polisi</th>
                                        <!-- <th>Nomor Rangka</th>
                                        <th>Nomor Mesin</th> -->
                                        <th>Nama Pemilik</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <!-- <th>Rasio Ideal</th>
                                        <th>Model</th>
                                        <th>Tahun</th>
                                        <th>Warna</th>
                                        <th>Kapasitas Mesin</th>
                                        <th>Kategori</th> -->
                                        <th hidden>Id Depo</th>
                                        <th>Penempatan</th>
                                        <th>Perusahaan</th>
                                        <!-- <th hidden>Id Segmen</th>
                                        <th>Segmen</th>
                                        <th>Status Kendaraan</th>
                                        <th>Status Kepemilikan</th> -->
                                        <!-- <th>Keterangan</th> -->
                                        <th>Kapasitas Tank</th>
                                        <th>Action</th>
                                        {{-- <th>Kapasitas Vol</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dt_kendaraan as $item_kendaraan)
                                        <tr>
                                            <td style="padding: 7px 5px;" align="right">{{ $no++ }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->id }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->no_polisi }}</td>
                                            <!-- <td style="padding: 7px 5px;">{{ $item_kendaraan->no_rangka }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->no_mesin }}</td> -->
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_pemilik }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->merek }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->type }}</td>
                                            <!-- <td style="padding: 7px 5px;">{{ $item_kendaraan->rasio_ideal }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->model }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->tahun }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->warna }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->kapasitas_mesin }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->kategori }}</td> -->
                                            <td style="padding: 7px 5px;" hidden>{{ $item_kendaraan->penempatan }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->name_branch }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->perusahaan }}</td>
                                            <!-- <td style="padding: 7px 5px;" hidden>{{ $item_kendaraan->id_segmen }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_segmen }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kendaraan }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kepemilikan }}</td> -->
                                            <!-- <td style="padding: 7px 5px;">{{ $item_kendaraan->keterangan }}</td> -->
                                            <td align='right' style="padding: 7px 5px;">{{ $item_kendaraan->kapasitas_tanki }}</td>
                                            <td align='center' style="padding: 7px 5px;">
                                                <a href="#" class="btn btn-success btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".modal-form{{ $item_kendaraan->id }}"
                                                    style="padding: 1px 10px 1px 10px;">edit</a>
                                                <a href="{{ route('admin.branch.delete', $item_kendaraan->id) }}"
                                                    id="delitems" class="btn btn-danger btn-sm waves-effect waves-light"
                                                    style="padding: 1px 10px 1px 10px;" hidden>delete</a>
                                            </td>
                                        </tr>
                                        <!--  Large modal example -->
                                        <div class="modal fade modal-form{{ $item_kendaraan->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.kendaraan.update_tank') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update
                                                                Kapasitas Tank</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Nomor Polisi </label>
                                                                <div class="col-sm-4" hidden>
                                                                    <input type="hidden"
                                                                        class="form-control form-control-sm"
                                                                        name="id_upate" value="{{ $item_kendaraan->id }}"
                                                                        placeholder="">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="no_polisi_upate"
                                                                        value="{{ $item_kendaraan->no_polisi }}"
                                                                        placeholder="" required readonly>
                                                                </div>

                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Nama Pemilik </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="nama_pemilik_upate"
                                                                        value="{{ $item_kendaraan->nama_pemilik }}"
                                                                        placeholder="" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Merek </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="merek_upate"
                                                                        value="{{ $item_kendaraan->merek }}"
                                                                        placeholder="" readonly>
                                                                </div>

                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Perusahaan </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="perusahaan_update"
                                                                        value="{{ $item_kendaraan->perusahaan }}"
                                                                        placeholder="" readonly>
                                                                </div>

                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-2 col-form-label">Tipe</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="type_upate"
                                                                        value="{{ $item_kendaraan->type }}"
                                                                        placeholder="" readonly>
                                                                </div>

                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Penempatan </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="penempatan_update"
                                                                        value="{{ $item_kendaraan->name_branch }}"
                                                                        placeholder="" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Kapasitas Tank </label>
                                                                <div class="col-sm-4">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="kapasitas_tank"
                                                                        value="{{ $item_kendaraan->kapasitas_tanki }}"
                                                                        placeholder="">
                                                                </div>
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
        // DATA BRANCH
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('json.data.branch') }}",
                dataType: "json",
                success: function(response) {
                    let branch_id = [];
                    penempatan += `<option value="">Pilih</option>`;
                    response.data.forEach(element => {
                        penempatan +=
                            `<option value="${element.code_branch}">${element.code_branch} | ${element.name_branch}</option>`;
                    });
                    $("select[name='penempatan']").html(penempatan);
                }
            });
        });

        // $(document).ready(function() {
        //     $.ajax({
        //         type: "get",
        //         url: "{{ route('json.data.branch') }}",
        //         dataType: "json",
        //         success: function(response) {
        //             let branch_id = [];
        //             penempatan += `<option value="">Pilih</option>`;
        //             response.data.forEach(element => {
        //                 penempatan +=
        //                     `<option value="${element.code_branch}">${element.code_branch} | ${element.name_branch}</option>`;
        //             });
        //             $("select[name='penempatan_upate']").html(penempatan);
        //         }
        //     });
        // });
    </script>

    <script>
        // DATA SEGMEN
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('json.data.segmen') }}",
                dataType: "json",
                success: function(response) {
                    let segmen_id = [];
                    id_segmen += `<option value="">Pilih</option>`;
                    response.data.forEach(element => {
                        id_segmen +=
                            `<option value="${element.id}">${element.id} | ${element.nama_segmen}</option>`;
                    });
                    $("select[name='id_segmen']").html(id_segmen);
                }
            });
        });

        //DATA VENDOR
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('json.data.vendor') }}",
                dataType: "json",
                success: function(response) {
                    let vendor_id = [];
                    vendor += `<option value="">Pilih</option>`;
                    response.data.forEach(element => {
                        vendor +=
                            `<option value="${element.kode_vendor}">${element.kode_vendor} | ${element.nama_vendor}</option>`;
                    });
                    $("select[name='vendor']").html(vendor);
                }
            });
        });

        $(document).ready(function() {
            $("#form-input").hide();

            $(".detail").change(function() {
                if ($("select[name='status_kepemilikan']").val() == "Sewa") {
                    $("#form-input").slideDown("fast");
                } else {
                    $("#form-input").slideUp("fast");
                }
            });
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
                        // tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" data-no_rangka="${kendaraan.no_rangka}" 
                    //                             data-mesin="${kendaraan.total}" data-nama_pemilik="${kendaraan.nama_pemilik}" data-merek="${kendaraan.merek}" data-type="${kendaraan.type}"
                    //                             data-tahun="${kendaraan.tahun}" data-warna="${kendaraan.warna}" data-kapasitas_mesin="${kendaraan.kapasitas_mesin}" 
                    //                             data-kategori="${kendaraan.kategori}" data-penempatan="${kendaraan.penempatan}" data-perusahaan="${kendaraan.perusahaan}" data-id_segmen="${kendaraan.id_segmen}">`;

                        tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-rangka="${kendaraan.no_rangka}"
                                                data-mesin="${kendaraan.no_mesin}"
                                                data-bulanexp="${kendaraan.bulan_exp_stnk}"
                                                data-stnk="${kendaraan.tgl_pajak_stnk}"
                                                data-plat="${kendaraan.tgl_baru_stnk}"
                                                data-pemilik="${kendaraan.nama_pemilik}"
                                                data-merek="${kendaraan.merek}"
                                                data-type="${kendaraan.type}">`;

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
                        tabledataModalKendaraan += `<td hidden>${kendaraan.tgl_baru_stnk}</td>`;
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
                                                data-bulanexp="${kendaraan.bulan_exp_stnk}"
                                                data-stnk="${kendaraan.tgl_pajak_stnk}"
                                                data-plat="${kendaraan.tgl_baru_stnk}"
                                                data-pemilik="${kendaraan.nama_pemilik}"
                                                data-merek="${kendaraan.merek}"
                                                data-type="${kendaraan.type}">`;

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

        $(document).on('click', '.pilih', function(e) {
            $("#id_kendaraan").val($(this).attr('data-id'))
            $("#no_polisi").val($(this).attr('data-no_pol'))
            $("#nama_pemilik").val($(this).attr('data-pemilik'))
            $("#merek").val($(this).attr('data-merek'))
            $("#perusahaan").val($(this).attr('data-perusahaan'))
            $("#type").val($(this).attr('data-type'))
            $("#penempatan").val($(this).attr('data-penempatan'))
            
            let no_polisi_upate = $(this).attr('data-id');
            
            //alert(kapasitas_tank);
            
            $('.modal-form2').modal('hide');
            $('.modal-form').modal('show');
        });
    </script>
@endpush

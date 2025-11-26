@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">SURAT KENDARAAN</h4>
                        <div class="page-title-right">
                            <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form"
                                class="btn btn-primary btn-sm">Tambah Data <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                        <!--  Large modal example -->
                        <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('admin.surat.insert') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Tambah Surat Kendaraan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No
                                                    Polisi <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="no_polisi" id="no_polisi" value="" placeholder=""
                                                            required readonly>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target=".modal-form2"
                                                            class="btn btn-secondary waves-effect" name="button_cari"
                                                            id="button_cari" value="no_pol"
                                                            style="height: 28px;">Cari</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">Merek <span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="merek" id="merek" value="" placeholder="" required
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tipe
                                                    <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="tipe" id="tipe" value="" placeholder="" required
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No
                                                    STNK <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="no_stnk" value="" placeholder="" required>
                                                </div>
                                            </div> --}}
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">BULAN EXPIRED STNK <span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="bulan_exp_stnk" value="" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">TGL
                                                    PAJAK STNK <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="tgl_pajak_stnk" id="tgl_pajak_stnk" value=""
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">TGL
                                                    STNK BARU <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="tgl_baru_stnk" id="tgl_baru_stnk" value=""
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">STATUS DOKUMEN STNK <span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="status_dokumen_stnk" value="" placeholder=""
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No
                                                    Kir 1 <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="no_kir_1" value="" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No
                                                    Kir 2 <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="no_kir_2" value="" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">MASA BERLAKU KIR <span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="masa_berlaku_kir" id="masa_berlaku_kir" value=""
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No
                                                    Kontrol KIR <span class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="no_kontrol_kir" value="" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-3 col-form-label">Status KIR <span
                                                        class="text-danger"><small>*</small></span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="status_kir" value="" placeholder="" required>
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
                                                        <th>Cc</th>
                                                        <th>Secondary/Primary</th>
                                                        <th hidden>Id Depo</th>
                                                        <th>Depo</th>
                                                        <th>Wilayah</th>
                                                        <th>Segmen</th>
                                                        <th>Status</th>
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

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->



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
                            <table id="datatable"
                                class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>id</th>
                                        <th>Nomor Polisi</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>No STNK</th>
                                        <th>Bulan Expired STNK</th>
                                        <th>Tgl Pajak STNK</th>
                                        <th>Tgl STNK Baru</th>
                                        <th>Status Dokumen STNK</th>
                                        <th>No Kir 1</th>
                                        <th>No Kir 2</th>
                                        <th>Masa Berlaku KIR</th>
                                        <th>No Kontrol KIR</th>
                                        <th>Status KIR</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dt_kendaraan_surat as $item_surat)
                                        <tr>
                                            <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                            <td style="padding: 7px 5px;" hidden>{{ $item_surat->id }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->no_polisi }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->merek }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->type }}</td>
                                            {{-- <td style="padding: 7px 5px;">{{ $item_surat->no_stnk }}</td> --}}
                                            <td style="padding: 7px 5px;">{{ $item_surat->bulan_exp_stnk }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->tgl_pajak_stnk }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->tgl_baru_stnk }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->status_dokumen_stnk }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->bulan_no_kir_1 }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->bulan_no_kir_2 }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->masa_berlaku_kir }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->no_kontrol_kir }}</td>
                                            <td style="padding: 7px 5px;">{{ $item_surat->status_kir }}</td>
                                            <td style="padding: 7px 5px;">
                                                <a href="#" class="btn btn-success btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".modal-form{{ $item_surat->id }}"
                                                    style="padding: 1px 10px 1px 10px;">edit</a>
                                                <a href="{{ route('admin.branch.delete', $item_surat->id) }}"
                                                    id="delitems" class="btn btn-danger btn-sm waves-effect waves-light"
                                                    style="padding: 1px 10px 1px 10px;">delete</a>
                                            </td>
                                        </tr>
                                        <!--  Large modal example -->
                                        <div class="modal fade modal-form{{ $item_surat->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.branch.update') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">UPDATE SURAT
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">No Polisi <span
                                                                        class="text-danger"><small>*</small></span>
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" name="id" value=""
                                                                        required>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="no_polisi_update"
                                                                        value="{{ $item_surat->no_polisi }}"
                                                                        placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">Merek</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="merek_update"
                                                                        value="{{ $item_surat->merek }}" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">Tipe</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="tipe_update"
                                                                        value="{{ $item_surat->type }}" placeholder="">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No STNK</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="no_stnk" value="{{ $item_surat->no_stnk }}" placeholder="">
                                                        </div>
                                                    </div> --}}
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">BULAN EXPIRED STNK
                                                                    <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="bulan_expired_stnk"
                                                                        value="{{ $item_surat->bulan_exp_stnk }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">TGL PAJAK STNK <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="tgl_pajak_stnk"
                                                                        value="{{ $item_surat->tgl_pajak_stnk }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">TGL STNK BARU <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="tgl_stnk_baru"
                                                                        value="{{ $item_surat->tgl_baru_stnk }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">STATUS DOKUMEN STNK
                                                                    <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="status_dokumen_stnk"
                                                                        value="{{ $item_surat->status_dokumen_stnk }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">Bulan No KIR 1 <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="bulan_no_kir_1"
                                                                        value="{{ $item_surat->bulan_no_kir_1 }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">Bulan No KIR 2 <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="bulan_no_kir_2"
                                                                        value="{{ $item_surat->bulan_no_kir_2 }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">MASA BERLAKU KIR <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="masa_berlaku_kir"
                                                                        value="{{ $item_surat->masa_berlaku_kir }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">No Kontrol KIR <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="no_kontrol_kir"
                                                                        value="{{ $item_surat->no_kontrol_kir }}"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-3 col-form-label">Status KIR <span
                                                                        class="text-danger"><small>*</small></span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="status_kir"
                                                                        value="{{ $item_surat->status_kir }}"
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
    <script type="text/javascript">
        $(document).ready(function() {
            // // Ambil tanggal STNK baru dari elemen input
            // var tglBaruSTNK = $("#tgl_baru_stnk").val();

            // // Hitung selisih antara tanggal STNK baru dan tanggal sekarang
            // var selisihHari = Math.floor((new Date(tglBaruSTNK) - new Date()) / (1000 * 60 * 60 * 24));
            // alert(selisihHari);
            // // Tampilkan selisih hari ke dalam elemen HTML
            // //$("#selisih_hari").html(selisihHari);
        });

        $('#tgl_pajak_stnk').change(function(e) {
            var tanggalPajakSTNK = new Date($('#tgl_pajak_stnk').val());
            var tanggalSTNKBaru = new Date(tanggalPajakSTNK.getFullYear() + 1, tanggalPajakSTNK.getMonth(),
                tanggalPajakSTNK.getDate() + 1);
            var tglSTNKBaru = $("#tgl_baru_stnk");
            tglSTNKBaru.val(tanggalSTNKBaru.toISOString().slice(0, 10));
        });

        $(document).on('click', '.pilih', function(e) {
            $("#no_polisi").val($(this).attr('data-no_pol'))
            $("#merek").val($(this).attr('data-merk'))
            $("#tipe").val($(this).attr('data-type'))

            $('.modal-form2').modal('hide');
            $('.modal-form').modal('show');
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
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" data-ritase_real="1"
                                                data-kategori="${kendaraan.kendaraan_kategori}"
                                                data-merk="${kendaraan.merek}"
                                                data-type="${kendaraan.type}"
                                                data-vol_ideal="${kendaraan.vol_ideal}">`;

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
                        tabledataModalKendaraan += `<td hidden>${kendaraan.kendaraan_kategori}</td>`;
                        tabledataModalKendaraan += `<td>${kendaraan.status_kendaraan}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.ritase}</td>`;
                        tabledataModalKendaraan += `<td hidden>${kendaraan.vol_ideal}</td>`;
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
                                                data-vol_ideal="${kendaraan.vol_ideal}" data-ratio="${kendaraan.rasio_ideal}">`;

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

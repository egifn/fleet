@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">INPUT BIAYA BBM</h4>
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
                        <form action="{{ route('admin.bbm.insert') }}" method="post" enctype="multipart/form-data">
                        @elseif (Auth::user()->roles == 'Admin')
                        <form action="{{ route('user.bbm.insert') }}" method="post" enctype="multipart/form-data">
                        @endif
                            {{ csrf_field() }}

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Polisi <span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="text" class="form-control form-control-sm" name="no_polisi" id="no_polisi" value="" placeholder="" required readonly>
                                        <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form2" class="btn btn-secondary waves-effect" name="button_cari" id="button_cari" value="no_pol" style="height: 28px;">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo <span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="depo" id="depo" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Wilayah<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="wilayah" id="wilayah" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Week<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="week" id="week" value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Salesman<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="salesman" id="salesman" value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="segmen" id="segmen" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1" hidden>
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tipe<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="tipe" id="tipe" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            {{-- <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis BBM<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="jenis_bbm" id="jenis_bbm" value="" placeholder="" required readonly>
                                </div>
                            </div> --}}
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis BBM <span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="text" class="form-control form-control-sm" name="jenis_bbm" id="jenis_bbm" value="" placeholder="" required readonly>
                                        <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form-bbm" class="btn btn-secondary waves-effect" name="button_cari_bbm" id="button_cari_bbm" value="jenis_bbm" style="height: 28px;">Cari</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga perliter<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="harga_perliter" id="harga_perliter" value="" placeholder="" required readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Liter (Qty)<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="liter_qty" id="liter_qty" onkeyup="jumlah_ltr();" value="" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Biaya BBM<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="biaya_bbm" id="biaya_bbm" value="" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kilometer Sebelum<span class="text-danger"><small>*</small></span></label>
                                <div class="col-sm-3" >
                                    <input type="text" class="form-control form-control-sm" name="kilometer_terakhir" id="kilometer_terakhir" value="" placeholder="" required disabled>
                                </div>

                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label" style="text-align: right">Kilometer Terkini<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="kilometer" id="kilometer" value="" onkeyup="input_oto();" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ratio Aktual<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="ratio_aktual" id="ratio_aktual" value="" placeholder="" disabled>
                                    <input type="hidden" class="form-control form-control-sm" name="ratio_aktual_temp" id="ratio_aktual_temp" value="" placeholder="" >
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ratio Ideal<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="ratio_ideal" id="ratio_ideal" value="" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Keterangan<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="keterangan_bbm" id="keterangan_bbm" value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Vocer<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_vocer" id="no_vocer" value="" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Lampiran/Attachment<span class="text-danger"><small>*</small></span> </label>
                                <div class="col-sm-9">
                                    {{-- <input type="file" class="form-control" name="filename" id="filename" multiple required> --}}
                                    <input type="file" class="form-control" name="file_upload[]" id="file_upload_1" multiple>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
                        </form>
                    </div>

                    <!--  Large modal example -->
                    <div class="modal fade modal-form2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="#" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Data Kendaraan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3 col-md-6 float-right">
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari . . .">
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
                                                    </tr>
                                                </thead>
                                                <tbody id="tabledataModalKendaraan" data-dismiss="modal">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                    <!--  Large modal example -->
                    <div class="modal fade modal-form-bbm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="#" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Data BBM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3 col-md-6 float-right">
                                            <input type="text" name="search_bbm" id="search_bbm" class="form-control" placeholder="Cari . . .">
                                        </div>
                                        <div style="border:1px white;width:100%;height:470px;overflow-y:scroll;">
                                            <table id="lookup_bbm" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th hidden>Id</th>
                                                        <th>Jenis BBM</th>
                                                        <th>Harga perliter</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabledataModalBbm" data-dismiss="modal">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        
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

    $(document).on('click', '.pilih', function (e) {
        $("#no_polisi").val($(this).attr('data-no_pol'))
        $("#id_depo").val($(this).attr('data-penempatan'))
        $("#depo").val($(this).attr('data-nama_penempatan'))
        $("#wilayah").val($(this).attr('data-perusahaan'))
        $("#segmen").val($(this).attr('data-segmen'))
        $("#kapasitas").val($(this).attr('data-kapasitas'))
        $("#ritase_ideal").val($(this).attr('data-ritase'))
        $("#ritase_real").val($(this).attr('data-ritase_real'))
        $("#vol_ideal").val($(this).attr('data-vol_ideal'))

        let cari_nopol = $(this).attr('data-no_pol');

        $.ajax({
            type: "GET",
            url: `{{ route('user.bbm.getkm') }}`,
            data: {
                cari_nopol: cari_nopol
            },
            dataType: "json",
            success: function(response) {
                //$("#kilometer_terakhir").val(response.data.kilometer);
                if (response && response.data && response.data.kilometer) {
                    $("#kilometer_terakhir").val(response.data.kilometer);
                } else {
                    $("#kilometer_terakhir").val("0");
                }
            }
        })
        
        $('.modal-form2').modal('hide');
        // $("#kode_transaksi").focus();
    });

    $(document).on('click', '.pilih_bbm', function (e) {
        $("#jenis_bbm").val($(this).attr('data-bbm'))
        $("#harga_perliter").val($(this).attr('data-harga'))
        
        $('.modal-form-bbm').modal('hide');
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
                let tabledataModalKendaraan;
                response.data.forEach(kendaraan => { 
                    tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" data-ritase_real="1"
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
                    tabledataModalKendaraan += `<tr class="pilih" data-id="${kendaraan.id}" data-no_pol="${kendaraan.no_polisi}" 
                                                data-penempatan="${kendaraan.penempatan}" data-nama_penempatan="${kendaraan.name_branch}" 
                                                data-perusahaan="${kendaraan.perusahaan}" data-segmen="${kendaraan.nama_segmen}"
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" data-ritase_real="1"
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
                    tabledataModalKendaraan += `<td>${kendaraan.status_kendaraan}</td>`;
                    tabledataModalKendaraan += `<td hidden>${kendaraan.ritase}</td>`;
                    tabledataModalKendaraan += `<td hidden>${kendaraan.vol_ideal}</td>`;
                    tabledataModalKendaraan += `</tr>`;
                });
                $("#tabledataModalKendaraan").html(tabledataModalKendaraan);
            }
            
        });
    });

    function jumlah_ltr(x) {
        var harga = parseInt($("input[name='harga_perliter']").val());
        var qty_liter = $('#liter_qty').val(); 

        var biaya_bbm = harga*qty_liter;
        var hasil_biaya_bbm = biaya_bbm.toFixed(1)
        
        // var reverse_harga = hasil_biaya_bbm.toString().split('').reverse().join(''),
        //     ribuan_harga  = reverse_harga.match(/\d{1,3}/g);
        //     harga_jadi = ribuan_harga.join(',').split('').reverse().join('');

        $('#biaya_bbm').val(hasil_biaya_bbm); 
    }

    function input_oto(x) {
        var km_terakhir = ($("input[name='kilometer_terakhir']").val());
        var km_baru = ($("input[name='kilometer']").val());
        var liter = ($("input[name='liter_qty']").val());

        var rasio_aktual = ((km_baru - km_terakhir) / liter).toFixed(2);

        $('#ratio_aktual').val(rasio_aktual); 
        $('#ratio_aktual_temp').val(rasio_aktual);
    }
    

</script>
@endpush
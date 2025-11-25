@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">INPUT UTILITAS</h4>
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
                    <form action="{{ route('admin.utilitas.store') }}" method="post" enctype="multipart/form-data">
                    @elseif (Auth::user()->roles == 'Admin')
                    <form action="{{ route('user.utilitas.store') }}" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" class="form-control form-control-sm" name="id_depo" id="id_depo" value="" placeholder="" required readonly>
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
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jugs/SPS/Hybrid<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="jsh" id="jsh" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="segmen" id="segmen" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">kapasitas<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="kapasitas" id="kapasitas" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ritase/Hari<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="ritase_ideal" id="ritase_ideal" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ritase Ideal<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="ritase_real" id="ritase_real" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Volume Penjualan Real<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-sm" name="vol_penjualan_real" id="vol_penjualan_real" value="" onkeyup="jumlah();" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mb-1" hidden>
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Volume ideal<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="vol_ideal" id="vol_ideal" value="" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ritase Real/Hari<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="ritase_real_hari" id="ritase_real_hari" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Lost Ritase<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="lost_ritase" id="lost_ritase" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Lost Volume<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="lost_volume" id="lost_volume" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Volume Ideal<span class="text-danger"><small>*</small></span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="volume_ideal" id="volume_ideal" value="" placeholder="" required readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Keterangan<span class="text-danger"><small>*</small></span></label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="keterangan" id="keterangan" data-id="0" required>
                                    <option value="-">Pilih</option>
                                    <option value="Armada stay bengkel">Armada stay bengkel</option>
                                    <option value="Driver tidak masuk">Driver tidak masuk</option>
                                    <option value="Vacant">Vacant</option>
                                    <option value="Dll">Dll</option>
                                </select>
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
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                
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
    $(document).on('click', '.pilih', function (e) {
        $("#no_polisi").val($(this).attr('data-no_pol'))
        $("#id_depo").val($(this).attr('data-penempatan'))
        $("#depo").val($(this).attr('data-nama_penempatan'))
        $("#wilayah").val($(this).attr('data-perusahaan'))
        $("#segmen").val($(this).attr('data-segmen'))
        $("#kapasitas").val($(this).attr('data-kapasitas'))
        $("#ritase_ideal").val($(this).attr('data-ritase'))
        //$("#ritase_real").val($(this).attr('data-ritase_real'))
        //$("#vol_ideal").val($(this).attr('data-vol_ideal'))
        $("#jsh").val($(this).attr('data-kategori'))

        let ritase_per_hari = $(this).attr('data-ritase');
        let hari_kerja = 6;
        let temp_ritase_real = ritase_per_hari*hari_kerja; 

        $("#ritase_real").val(temp_ritase_real);
        
        $('.modal-form2').modal('hide');
        // $("#kode_transaksi").focus();
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
                                                data-kapasitas="${kendaraan.kapasitas_muatan}"
                                                data-ritase="${kendaraan.ritase}" 
                                                data-kategori="${kendaraan.kendaraan_kategori}"
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

    function jumlah(x) {
        var vol_penjualan = parseInt($("input[name='vol_penjualan_real']").val());
        var temp_kapasitas = $('#kapasitas').val(); 

        var ritase_real_perhari = vol_penjualan/temp_kapasitas;
        var hasil_ritase_real_perhari = ritase_real_perhari.toFixed(1)
        //alert(ritase_real_perhari);
        $('#ritase_real_hari').val(hasil_ritase_real_perhari); 

        //========ritase idela
        var ritase_ideal = $('#ritase_ideal').val();
        var temp_ritase_ideal = hasil_ritase_real_perhari-ritase_ideal;
        var hasil_temp_ritase_ideal = temp_ritase_ideal.toFixed(1)
        $('#lost_ritase').val(hasil_temp_ritase_ideal); 

        //========Volume Ideal
        var temp_kapasitas = $('#kapasitas').val();
        var temp_ritase_ideal = $('#ritase_real').val();
        var hasil_vol_ideal = temp_kapasitas * temp_ritase_ideal;
        $('#volume_ideal').val(hasil_vol_ideal);

        //========Lost Volume
        var v_ideal = $('#volume_ideal').val();
        var v_penjualan = $('#vol_penjualan_real').val();
        var hasil_lost_vol = v_ideal - v_penjualan;
        $('#lost_volume').val(hasil_lost_vol);


    }

    //=== Insert data Transaksi Penjualan =================//
    $("#button_form_insert").click(function() {
        if ($("#week").val() == ""){
            alert("Week harus diisi, tidak boleh kosong");
            $("#week").focus();
            return (false);
        }

        if ($("#salesman").val() == ""){
            alert("Salesmen harus diisi, tidak boleh kosong");
            $("#salesman").focus();
            return (false);
        }
        
        if ($("#vol_penjualan_real").val() == ""){
            alert("Vol penjualan harus diisi, tidak boleh kosong");
            $("#vol_penjualan_real").focus();
            return (false);
        }

        //let kode_penjualan = $("#kode_transaksi").val();
        let no_polisi = $("#no_polisi").val();
        let id_depo = $("#id_depo").val();
        let wilayah = $("#wilayah").val();
        let week = $("#week").val();
        let salesman = $("#salesman").val();
        let jsh = $("#jsh").val();
        let segmen = $("#segmen").val();
        let kapasitas = $("#kapasitas").val();
        let ritase_ideal = $("#ritase_ideal").val();
        let ritase_real = $("#ritase_real").val();
        let vol_penjualan_real = $("#vol_penjualan_real").val();
        let vol_ideal = $("#vol_ideal").val();
        let ritase_real_hari = $("#ritase_real_hari").val();
        let lost_ritase = $(".lost_ritase").text();
        let lost_volume = $(".lost_volume").text();
        let volume_ideal = $(".fvolume_ideal_kembali").text();
        let keterangan = $(".keterangan").text();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('admin.utilitas.store') }}",
            data: {
                no_polisi: no_polisi,
                id_depo: id_depo,
                wilayah: wilayah,
                week: week,
                salesman: salesman,
                jsh: jsh,
                segmen: segmen,
                kapasitas: kapasitas,
                ritase_ideal: ritase_ideal,
                ritase_real: ritase_real,
                vol_penjualan_real: vol_penjualan_real,
                vol_ideal: vol_ideal,
                ritase_real_hari: ritase_real_hari,
                lost_ritase: lost_ritase,
                lost_volume: lost_volume,
                volume_ideal: volume_ideal,
                keterangan: keterangan,
                
            },
            success: function(response) {
                if(response.res === true) {
                    $("#no_polisi").val('');
                    $("#id_depo").val('');
                    $("#wilayah").val('');
                    $("#week").val('');
                    $("#salesman").val('');
                    $("#jsh").val('');
                    $("#segmen").val('');
                    $("#kapasitas").val('');
                    $("#ritase_ideal").val('');
                    $("#ritase_real").val('');
                    $("#vol_penjualan_real").val('');
                    $("#vol_ideal").val('');
                    $("#ritase_real_hari").val('');
                    $(".lost_ritase").text('');
                    $(".lost_volume").text('');
                    $(".fvolume_ideal_kembali").text('');
                    $(".keterangan").text('');

                    window.location.href = "{{ route('admin.utilitas.view')}}";
                }else{
                    Swal.fire("Gagal!", "Data transaksi penjualan gagal disimpan.", "error");
                }
            }
        });
    });
    //=== End Insert data Transaksi Penjualan =================//

</script>

{{-- <script>
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
                    id_segmen += `<option value="${element.id}">${element.id} | ${element.nama_segmen}</option>`;
                });
                $("select[name='id_segmen']").html(id_segmen);
            }
        });
    });
</script> --}}
@endpush
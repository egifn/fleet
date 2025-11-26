@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">KATEGORI</h4>
                    <div class="page-title-right">
                        <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form" class="btn btn-primary btn-sm">Tambah Data <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                @if (Auth::user()->roles == 'Superadmin')
                                <form action="{{ route('admin.kategori.insert') }}" method="post">
                                @elseif (Auth::user()->roles == 'Admin')
                                <form action="{{ route('user.kategori.insert') }}" method="post">
                                @endif
                                
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Kategori Kendaraan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Polisi <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="text" class="form-control form-control-sm" name="no_polisi" id="no_polisi" value="" placeholder="" required disabled>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target=".modal-form2" class="btn btn-secondary waves-effect" name="button_cari" id="button_cari" value="no_pol" style="height: 28px;">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1" hidden>
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Pol <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="nopol" id="nopol" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="id_segmen" id="id_segmen" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen Kendaraan <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="id_segmen_kendaraan" id="id_segmen_kendaraan" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="kategori" id="kategori" data-id="0" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Hybrid">Hybrid</option>
                                                    <option value="Jugs">Jugs</option>
                                                    <option value="SPS">SPS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kapasitas Muatan <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="kapasitas_muatan" id="kapasitas_muatan" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1" hidden>
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Muatan <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="muatan" id="muatan" value="" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

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
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>id</th>
                                    <th>Nomor Polisi</th>
                                    <th>Segmen</th>
                                    <th>Segmen Kendaraan</th>
                                    <th>Kategori</th>
                                    <th>Kapasitas Muatan</th>
                                    <th hidden>Muatan</th>
                                    <th>Action</th>
                                    {{-- <th>Kapasitas Vol</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_kendaraan_kategori as $item_kategori)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_kategori->id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kategori->no_polisi }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kategori->nama_segmen }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kategori->nama_segmen_kendaraan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kategori->kategori }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kategori->kapasitas_muatan }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_kategori->muatan }}</td>
                                    <td style="padding: 7px 5px;" align="center">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_kategori->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        {{-- <a href="{{ route('admin.branch.delete', $item_kategori->id) }}" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a> --}}
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            @if (Auth::user()->roles == 'Superadmin')
                                            <form action="{{ route('admin.kategori.update') }}" method="post">
                                            @elseif (Auth::user()->roles == 'Admin')
                                            <form action="{{ route('user.kategori.update') }}" method="post">
                                            @endif
                                            
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">UPDATE KATEGORI</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1" hidden>
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">ID <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="id_kategori_update" id="id_kategori_update" value="{{ $item_kategori->id }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">No Polisi <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="nopol_update" id="nopol_update" value="{{ $item_kategori->no_polisi }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="id_segmen_update" id="id_segmen_update" required>
                                                                
                                                            </select>
                                                            <input type="hidden" class="form-control form-control-sm" name="segmen_id_update" id="segmen_id_update" value="{{ $item_kategori->id_segmen }}" placeholder="" required>
                                                            <input type="hidden" class="form-control form-control-sm" name="segmen_nama_update" id="segmen_nama_update" value="{{ $item_kategori->nama_segmen }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen Kendaraan <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="id_segmen_kendaraan_update" id="id_segmen_kendaraan_update" required>
                                                                <option value="{{ $item_kategori->id_segmen_kendaraan }}">{{ $item_kategori->nama_segmen_kendaraan }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kategori <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="kategori_update" id="kategori_update" data-id="0" required>
                                                                <option value="{{ $item_kategori->kategori }}">{{ $item_kategori->kategori }}</option>
                                                                <option value="Hybrid">Hybrid</option>
                                                                <option value="Jugs">Jugs</option>
                                                                <option value="SPS">SPS</option>
                                                            </select>
                                                        </div>
                                                    </div>
            
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kapasitas Muatan <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="kapasitas_muatan_update" id="kapasitas_muatan_update" value="{{ $item_kategori->kapasitas_muatan }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1" hidden>
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Muatan <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="muatan_update" id="muatan_update" value="{{ $item_kategori->muatan }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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
                    penempatan += `<option value="${element.code_branch}">${element.code_branch} | ${element.name_branch}</option>`;
                });
                $("select[name='penempatan']").html(penempatan);
            }
        });
    });
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
                    id_segmen += `<option value="${element.id}">${element.id} | ${element.nama_segmen}</option>`;
                });
                $("select[name='id_segmen']").html(id_segmen);
                $("select[name='id_segmen_update']").html(id_segmen);
            }
        });
    });

    // $(document).ready(function() {
    //     $.ajax({
    //         type: "get",
    //         url: "{{ route('json.data.segmen') }}",
    //         dataType: "json",
    //         success: function(response) {
    //             let segmen_id = $('#segmen_id_update');
    //             let segmen_nama = $('#segmen_nama_update');
    //             id_segmen += `<option value="${segmen_id}">${segmen_nama}</option>`;
    //             $("select[name='id_segmen_update']").html(id_segmen);
    //         }
    //     });
    // });
</script>

<script>
    // DATA SEGMEN KENDARAAN
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "{{ route('json.data.segmen_kendaraan') }}",
            dataType: "json",
            success: function(response) {
                let segmen_kendaraan_id = [];
                id_segmen_kendaraan += `<option value="">Pilih</option>`;
                response.data.forEach(element => {
                    id_segmen_kendaraan += `<option value="${element.id}">${element.id} | ${element.nama_segmen_kendaraan}</option>`;
                });
                $("select[name='id_segmen_kendaraan']").html(id_segmen_kendaraan);
            }
        });
    });
</script>

<script>
    $(document).on('click', '.pilih', function (e) {
        $("#no_polisi").val($(this).attr('data-no_pol'));
        $("#nopol").val($(this).attr('data-no_pol'));
        
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
</script>
@endpush
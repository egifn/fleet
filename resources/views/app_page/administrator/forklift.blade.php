@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA FORKLIFT</h4>
                    <form action="{{ route('admin.forklift.view_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                            <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form" class="btn btn-primary btn-sm">Tambah Data <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </form>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.forklift.insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">No. Forklift </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" name="no_forklift" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Merek </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" name="merek" value="" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Daya Angkut </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" name="daya_angkut" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Perusahaan <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-control-sm" name="perusahaan" id="perusahaan">
                                                    <option value="">Pilih</option>
                                                    <option value="APJ">APJ</option>
                                                    <option value="Daytech">Daytech</option>
                                                    <option value="HGS">HGS</option>
                                                    <option value="TA">TA</option>
                                                    <option value="TU">TU</option>
                                                    <option value="TUA">TUA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Penempatan </label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0" >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Keterangan </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" name="keterangan" value="" placeholder="">
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
                       <table id="datatable" class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                            
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>ID</th>
                                    <th>Nomor Forklift</th>
                                    <th>Merek</th>
                                    <th>Daya Angkut</th>
                                    <th>Perusahaan</th>
                                    <th>Penempatan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                    {{-- <th>Kapasitas Vol</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_forklift as $item_forklift)
                                <tr>
                                    <td style="padding: 7px 5px;" align="right">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_forklift->id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->no_forklift }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->merek }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->daya_angkut }} ton</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->perusahaan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->name_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_forklift->keterangan }}</td>
                                    <td style="padding: 7px 5px;" align="center">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_forklift->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        <a href="{{ route('admin.branch.delete', $item_forklift->id) }}" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;" hidden>delete</a>
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_forklift->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.forklift.update') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Update Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">No. Forklift </label>
                                                        <div class="col-sm-4" hidden>
                                                            <input type="hidden" class="form-control form-control-sm" name="id_update" value="{{ $item_forklift->id }}" placeholder="">
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" name="no_forklift_update" value="{{ $item_forklift->no_forklift }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Merek </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" name="merek_update" value="{{ $item_forklift->merek }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Daya Angkut </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" name="daya_angkut_update" value="{{ $item_forklift->daya_angkut }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Perusahaan <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-sm" name="perusahaan_update" id="perusahaan_update">
                                                                <option value="{{ $item_forklift->perusahaan }}">{{ $item_forklift->perusahaan }}</option>
                                                                <option value="APJ">APJ</option>
                                                                <option value="Daytech">Daytech</option>
                                                                <option value="HGS">HGS</option>
                                                                <option value="TA">TA</option>
                                                                <option value="TU">TU</option>
                                                                <option value="TUA">TUA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Penempatan </label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-sm" name="penempatan_update" id="penempatan_update" data-id="0" >
                                                                <option value="{{ $item_forklift->penempatan }}">{{ $item_forklift->name_branch }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Keterangan </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm" name="keterangan_update" value="{{ $item_forklift->keterangan }}" placeholder="">
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
                $("select[name='penempatan_update']").html(penempatan);
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
            }
        });
    });

    //DATA VENDOR
    $(document).ready(function(){
        $.ajax({
            type: "get",
            url: "{{ route('json.data.vendor') }}",
            dataType: "json",
            success: function(response) {
                let vendor_id = [];
                vendor += `<option value="">Pilih</option>`;
                response.data.forEach(element => {
                    vendor += `<option value="${element.kode_vendor}">${element.kode_vendor} | ${element.nama_vendor}</option>`;
                });
                $("select[name='vendor']").html(vendor);
            }
        });
    });

    $(document).ready(function(){
        $("#form-input").hide();

        $(".detail").change(function(){
            if ($("select[name='status_kepemilikan']").val() == "Sewa" ) {
                $("#form-input").slideDown("fast"); 
            }else{
                $("#form-input").slideUp("fast"); 
            }
        });
    });
</script>
@endpush
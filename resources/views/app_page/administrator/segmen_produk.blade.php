@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">SEGMEN PRODUK</h4>
                    <div class="page-title-right">
                        <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form" class="btn btn-primary btn-sm">Tambah Segmen <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.segmen_produk.insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Tambah Segmen Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="id_segmen" id="id_segmen" data-id="0" required>
                                                </select>
                                            </div>
                                        </div>
                            
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo <span style="color:red">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="branch_id" id="branch" required>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="jenis" id="jenis" data-id="0" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Jugs">Jugs</option>
                                                    <option value="SPS">SPS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jasa/Harga <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="harga" id="harga" value="" placeholder="" required>
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
                                    <th hidden>Id</th>
                                    <th hidden>Id Segmen</th>
                                    <th>Nama Segmen</th>
                                    <th hidden>Kode Depo</th>
                                    <th>Nama Depo</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_segmen_produk as $item_segmen_produk)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_segmen_produk->id }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_segmen_produk->id_segmen }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_segmen_produk->nama_segmen }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_segmen_produk->code_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_segmen_produk->name_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_segmen_produk->jenis }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_segmen_produk->jasa_harga }}</td>
                                    <td style="padding: 7px 5px;">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_segmen_produk->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        <a href="#" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a>
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_segmen_produk->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="#" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Update Segmen Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="id_segmen_update" id="id_segmen_update" data-id="0" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo <span style="color:red">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="branch_id_update" id="branch_update" required>
                                                            </select>
                                                        </div>
                                                    </div>
            
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jenis <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="jenis_update" id="jenis_update" data-id="0" required>
                                                                <option value="">Pilih</option>
                                                                <option value="Jugs">Jugs</option>
                                                                <option value="SPS">SPS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jasa/Harga <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="harga_update" id="harga_update" value="" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" id="btn-form-user-edit">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                branch += `<option value="">Pilih</option>`;
                response.data.forEach(element => {
                    branch += `<option value="${element.code_branch}">${element.code_branch} | ${element.name_branch}</option>`;
                });
                $("select[name='branch_id']").html(branch);
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
</script>
@endpush
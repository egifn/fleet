@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">BBM</h4>
                    <div class="page-title-right">
                        <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form" class="btn btn-primary btn-sm">Tambah BBM <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.databbm.insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Tambah BBM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <!-- <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Penempatan </label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0" >
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama BBM <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="nama_bbm" id="nama_bbm" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga Perliter <span class="text-danger"><small>*</small></span> </label>
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
                                    <th>Nama BBM</th>
                                    <th hidden>code branch</th>
                                    <th hidden>Penempatan</th>
                                    <th>Harga Perliter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_bbm as $item_bbm)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_bbm->id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_bbm->jenis_bbm }}</td>
                                    <!-- <td style="padding: 7px 5px;" hidden></td> -->
                                    <!-- <td style="padding: 7px 5px;" hidden></td> -->
                                    <td style="padding: 7px 5px;" align="right">{{ number_format($item_bbm->harga_perliter) }}</td>
                                    <td style="padding: 7px 5px;" align="center">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_bbm->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        {{-- <a href="#" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a> --}}
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_bbm->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.databbm.update') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">UPDATE BBM</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1" hidden>
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Id BBM <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="id_bbm" id="id_bbm" value="{{ $item_bbm->id }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama BBM <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="id" value="" required>
                                                            <input type="text" class="form-control form-control-sm" name="nama_bbm_update" id="nama_bbm_update" value="{{ $item_bbm->jenis_bbm }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Harga Perliter</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="harga_update" id="harga_update" value="{{ $item_bbm->harga_perliter }}" placeholder="">
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
            url: "{{ route('admin.databbm.data_branch') }}",
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
@endpush
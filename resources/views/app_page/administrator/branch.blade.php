@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA BRANCH</h4>
                    <div class="page-title-right">
                        <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form" class="btn btn-primary btn-sm">New Branch <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.branch.insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">NEW BRANCH</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name branch <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="name_branch" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Type <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="type_branch" id="type_branch" data-id="0" required>
                                                    <option value="">Select</option>
                                                    <option value="DEPO">DEPO</option>
                                                    <option value="HO">HO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Company <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="company_branch" id="company_branch" required>
                                                    <option value="">Select </option>
                                                    <option value="TUA">TUA</option>
                                                    <option value="TU">TU</option>
                                                    <option value="TA">TA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">langitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="langitude" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">longitude</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="longitude" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="address_branch" value="" cols="30" rows="5" required></textarea>
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
        <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
            <i class="mdi mdi-alert-circle-outline label-icon"></i><strong>INFO</strong>: <br>
            <span>Data branch ini terdiri dari data
                <span class="text-danger"><strong>DEPO (<span class="text-primary">{{ $sum_depo }}</span>)</strong></span>,
                <span class="text-danger"><strong>BENGKEL (<span class="text-primary">{{ $sum_pool }}</span>)</strong></span>,
                <span class="text-danger"><strong>POOL (<span class="text-primary">{{ $sum_depo }}</span>)</strong></span>,
                <span class="text-danger"><strong>HEAD OFFICE (HO) (<span class="text-primary">{{ $sum_ho }}</span>)</strong></span>
                <span class="text-danger"><strong>PABRIK (SUPPLIER) (<span class="text-primary">{{ $sum_supplier }}</span>)</strong></span>
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive tabel-sm nowrap w-100 tabel-sm">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA BRANCH</th>
                                    <th>COMPANY</th>
                                    <th>TYPE BRANCH</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_branch as $item_dms_sm_branch)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_dms_sm_branch->name_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_dms_sm_branch->company_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_dms_sm_branch->type_branch }}</td>
                                    <td style="padding: 7px 5px;">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_dms_sm_branch->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        <a href="{{ route('admin.branch.delete', $item_dms_sm_branch->id) }}" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a>
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_dms_sm_branch->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.branch.update') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">UPDATE BRANCH</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name branch <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="id" value="{{ $item_dms_sm_branch->id }}" required>
                                                            <input type="text" class="form-control form-control-sm" name="name_branch" value="{{ $item_dms_sm_branch->name_branch }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Type <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="type_branch" id="type_branch" data-id="{{ $item_dms_sm_branch->id }}" required>
                                                                <option value="">Select</option>
                                                                <option @if ($item_dms_sm_branch->type_branch == 'DEPO') selected @endif value="DEPO">DEPO</option>
                                                                <option @if ($item_dms_sm_branch->type_branch == 'HO') selected @endif value="BENGKEL">HO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Company <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="company_branch" id="company_branch" required>
                                                                <option value="">Select </option>
                                                                <option @if ($item_dms_sm_branch->company_branch == 'TUA') selected @endif value="TUA">TUA</option>
                                                                <option @if ($item_dms_sm_branch->company_branch == 'TU') selected @endif value="TU">TU</option>
                                                                <option @if ($item_dms_sm_branch->company_branch == 'TA') selected @endif value="TA">TA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">langitude</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="langitude" value="{{ $item_dms_sm_branch->langitude }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">longitude</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="longitude" value="{{ $item_dms_sm_branch->longitude }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Address <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="address_branch" value="" cols="30" rows="5" required>{{ $item_dms_sm_branch->address_branch }}</textarea>
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

</script>
@endpush
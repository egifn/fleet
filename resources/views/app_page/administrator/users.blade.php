@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA USER </h4>
                    <div class="page-title-right">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target=".formnewuser">Add New Users</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
                    <i class="mdi mdi-alert-circle-outline label-icon"></i><strong>Info</strong> - Terdapat <b>{{ $sum_users }}</b> users
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-header" style="padding: 10px 1.25rem;background-color: #e9e9e9;">
                        <div class="d-flex flex-wrap align-items-center">
                            <h5 class="card-title me-2">DATA USERS</h5>
                            <div class="ms-auto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="keyword" placeholder="search.." aria-describedby="search_shipment_by_id" required="">
                                            {{-- <span class="input-group-text btn btn-primary" id="search_shipment_by_id"><i class="bx bx-search-alt align-middle"></i></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div id="before_loading_data_header" class="text-center" style="display: none; margin:10px">
                            <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Loading
                        </div>
                        <style>
                            table {
                                max-width: 100%;
                                overflow-x: auto;
                                -webkit-overflow-scrolling: touch;
                            }

                            th,
                            td {
                                white-space: nowrap;
                                text-align: left;
                                padding: 3px;
                                vertical-align: middle;
                            }
                        </style>
                        <div id="after_loading_data_header" style="overflow-x: auto;">
                            <table class=" table-bordered tabel-sm nowrap w-100" style="max-width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Branch</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modal')
<div class="modal fade formnewuser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" action="{{ route('admin.users.insert') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add New Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="name" value="" required />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="" required />
                            <div class="invalid-feedback">
                                email sudah di gunakan..
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Password <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" class="form-control form-control-sm" name="password" style="height: 32px;" required>
                                <button class="btn btn-light shadow-none ms-0" type="button" id="show_hidden_password" style="height: 32px;"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Roles <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="roles" id="roles" required>
                                <option value="">Pilih Role</option>
                                {{-- <option value="BOD">Board of Director - BOD</option>
                                <option value="SND SM">SND SM</option>
                                <option value="SND ASM" disabled>SND ASM</option>
                                <option value="SSD MANAGER" disabled>SSD MANAGER</option>
                                <option value="SSD PIC" disabled>SSD PIC</option>
                                <option value="DEPO KPJ" disabled>KPJ</option>
                                <option value="DEPO SA">SA</option>
                                <option value="DEPO KPJ" disabled>KPJ</option> --}}
                                <option value="Administrator">Administrator</option>
                                <option value="OPS HO">OPS HO</option>
                                <option value="OPS Depo">OPS Depo</option>
                                <option value="PIC Fleet">PIC Fleet</option>
                                <option value="Admin">Admin</option>
                                <option value="IT">IT</option>
                                <option value="Akunting">Akunting</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Branch <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="branch_id" id="branch" required>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-form-user">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade formedituser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" action="{{ route('admin.users.update') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add Edit Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control form-control-sm" id="id_edit" name="id" value="" required />
                            <input type="text" class="form-control form-control-sm" id="name_edit" name="name" value="" required />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" id="email_edit" name="email" value="" required />
                            <div class="invalid-feedback">
                                email sudah di gunakan..
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Password <span style="color:red">*</span> </label>
                        <div class="col-sm-9">
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" class="form-control form-control-sm" name="password" style="height: 32px;" required>
                                <button class="btn btn-light shadow-none ms-0" type="button" id="show_hidden_password" style="height: 32px;"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
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
@endpush
@push('script-custome')
<script>
    $('#email_edit').keyup(function(e) {
        let email = $('#email_edit').val();
        $.ajax({
            type: "POST",
            url: `{{ route('app.cek.email') }}`,
            data: {
                _token: '{{ csrf_token() }}',
                email: email,
            },
            dataType: "json",
            success: function(response) {
                if (response.message == 'notavailable') {
                    $('#email_edit').addClass('is-invalid');
                    $('#email_edit').removeClass('is-valid');
                    $('#btn-form-user-edit').prop('disabled', true);
                } else {
                    $('#email_edit').addClass('is-valid');
                    $('#email_edit').removeClass('is-invalid');
                    $('#btn-form-user-edit').prop('disabled', false);
                }
            }
        });
    });
</script>
<script>
    $('#email').keyup(function(e) {
        let email = $('#email').val();
        $.ajax({
            type: "POST",
            url: `{{ route('app.cek.email') }}`,
            data: {
                _token: '{{ csrf_token() }}',
                email: email,
            },
            dataType: "json",
            success: function(response) {
                if (response.message == 'notavailable') {
                    $('#email').addClass('is-invalid');
                    $('#email').removeClass('is-valid');
                    $('#btn-form-user').prop('disabled', true);
                } else {
                    $('#email').addClass('is-valid');
                    $('#email').removeClass('is-invalid');
                    $('#btn-form-user').prop('disabled', false);
                }
            }
        });
    });
</script>
<script>
    // DATA BRANCH
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "{{ route('json.data.branch') }}",
            dataType: "json",
            success: function(response) {
                let branch_id = [];
                branch += `<option value="">Pilih Branch</option>`;
                response.data.forEach(element => {
                    branch += `<option value="${element.id}">${element.code_branch} | ${element.name_branch}</option>`;
                });
                $("select[name='branch_id']").html(branch);
            }
        });
    });
</script>
<script>
    // SHOW HIDDEN PASSWORD
    $("#show_hidden_password").on("click", function() {
        0 < $(this).siblings("input").length && ("password" == $(this).siblings("input").attr("type") ? $(this).siblings("input").attr("type", "input") : $(this).siblings("input").attr("type", "password"))
    });
</script>
<script>
    // CHECKED & UNCHECKED AKTIVE USER
    $(document).on('click', "input[type='checkbox']", function() {
        if ($(this).is(":checked")) {
            var id = $(this).val();
            var status_account = "Aktif";
            $('#status_account_value' + id).text("Aktif");
        } else {
            var id = $(this).val();
            var status_account = "Tidak Aktif";
            $('#status_account_value' + id).text("Tidak Aktif");
        }
        $.ajax({
            url: "{{ route('admin.users.update.status') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                status_account: status_account
            },
            success: function(data) {
                Swal.fire({
                    toast: true,
                    icon: 'info',
                    title: 'info',
                    text: 'perubahan status sukses!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'top-right',
                })
            }
        });
    });
</script>
<script>
    // GET DATA 
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: `{{ route('json.data.users') }}`,
            dataType: "json",
            beforeSend: function() {
                $('#before_loading_data_header').css('display', 'block');
                $('#after_loading_data_header').css('display', 'none');
            },
            success: function(response) {
                let dataTableBody;
                if (response.count == 0) {
                    dataTableBody += `<tr><th colspan="8">data tidak ditemukan</th></tr>`;
                } else {
                    response.data.forEach(el => {

                        if (el.last_login == null) {
                            var last_login = `<td class="padding: 1px 5px;"><span class="badge rounded-pill bg-danger">tidak perna login</span></td>`;
                        } else {
                            var last_login = `<td class="padding: 1px 5px;">${el.last_login}</td>`;
                        }

                        dataTableBody += `
                            <tr>
                                <td class="padding: 1px 5px;">${el.name}</td>
                                <td class="padding: 1px 5px;"><a href="mailto:${el.email}">${el.email}</a></td>
                                <td class="padding: 1px 5px;">${el.roles}</td>
                                <td class="padding: 1px 5px;">${el.branch_id} | ${el.name_branch}</td>
                                <td class="padding: 1px 5px;">
                                    <div class="form-check form-switch" dir="ltr">
                                        <input type="checkbox" class="form-check-input" value="${el.id}" ${el.attributes_status_account} id="status_account">
                                        <label class="form-check-label" id="status_account_value${el.id}" for="status_account">${el.status_account}</label>
                                    </div>
                                </td>
                                ${last_login}
                                <td class="padding: 1px 5px;"><a href="#" data-id="${el.id}" class="btn btn-xsm btn-primary me-2" id="editdata">Edit</a></td> 
                            </tr>`;
                    });
                }
                setTimeout(() => {
                    $('#before_loading_data_header').css('display', 'none');
                    $('#after_loading_data_header').css('display', 'block');
                }, "1000")
                $('#dataTableBody').html(dataTableBody);
            }
        });
    });
    // SEARCH DATA
    $('#keyword').keyup(function() {
        let keyword = $('#keyword').val();
        $.ajax({
            type: "GET",
            url: `{{ route('json.data.users') }}`,
            data: {
                keyword: keyword
            },
            dataType: "json",
            success: function(response) {
                let dataTableBody;
                if (response.count == 0) {
                    dataTableBody += `<tr><th colspan="8">data tidak ditemukan</th></tr>`;
                } else {
                    response.data.forEach(el => {


                        if (el.last_login == null) {
                            var last_login = `<td class="padding: 1px 5px;"><span class="badge rounded-pill bg-danger">tidak perna login</span></td>`;
                        } else {
                            var last_login = `<td class="padding: 1px 5px;">${el.last_login}</td>`;
                        }

                        dataTableBody += `
                            <tr>
                                <td class="padding: 1px 5px;">${el.name}</td>
                                <td class="padding: 1px 5px;"><a href="mailto:${el.email}">${el.email}</a></td>
                                <td class="padding: 1px 5px;">${el.roles}</td>
                                <td class="padding: 1px 5px;">${el.branch_id} | ${el.name_branch}</td>
                            <td class="padding: 1px 5px;">
                                <div class="form-check form-switch" dir="ltr">
                                    <input type="checkbox" class="form-check-input" value="${el.id}" ${el.attributes_status_account} id="status_account">
                                    <label class="form-check-label" id="status_account_value${el.id}" for="status_account">${el.status_account}</label>
                                </div>
                            </td>
                                ${last_login}
                                <td class="padding: 1px 5px;"><a href="#" data-id="${el.id}" class="btn btn-xsm btn-primary me-2" id="editdata">Edit</a></td>
                            </tr>`;
                    });
                }
                setTimeout(() => {
                    $('#before_loading_data_header').css('display', 'none');
                    $('#after_loading_data_header').css('display', 'block');
                }, "1000")
                $('#dataTableBody').html(dataTableBody);
            }
        });
    });
    
    $(document).on("click", "#editdata", function() {
        let id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "{{ route('json.data.users_details') }}",
            data: {
                // _token: '{{ csrf_token() }}', if type: post
                id: id,
            },
            dataType: "json",
            success: function(response) {
                $('.formedituser').modal('show');
                $("#id_edit").val(response.data.id);
                $("#name_edit").val(response.data.name);
                $("#email_edit").val(response.data.email);
            }
        });
    });
</script>
@endpush
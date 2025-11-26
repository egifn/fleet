<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                @if (Auth::user()->roles == 'Superadmin')
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-pages">Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.kendaraan.view') }}" data-key="t-error-404">Kendaraan</a></li>
                            <li>
                                <a href="{{ route('admin.kendaraan_na.view') }}" data-key="t-error-404">
                                    Kendaraan N/A
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kendaraan_sewa.view') }}" data-key="t-error-404">Kendaraan
                                    Sewa
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kendaraan.master_tank') }}" data-key="t-error-404">Tank
                                    Kendaraan</a>
                            </li>
                            <li><a href="{{ route('admin.forklift.view') }}" data-key="t-error-404">Forklift</a></li>
                            <li><a href="{{ route('admin.surat.view') }}" data-key="t-error-404">Surat</a></li>
                            <li><a href="{{ route('admin.databbm.view') }}" data-key="t-error-404">BBM</a></li>
                            <li><a href="{{ route('admin.vendor.view') }}" data-key="t-error-404">Vendor</a></li>
                            <li><a href="{{ route('admin.kategori.view') }}" data-key="t-error-404">Kategori</a></li>
                            <li><a href="{{ route('admin.segmen.view') }}" data-key="t-error-404">Segmen</a></li>
                            <li><a href="{{ route('admin.segmen_produk.view') }}" data-key="t-error-404">Segmen
                                    Produk</a></li>
                            <li><a href="{{ route('admin.segmen_kendaraan.view') }}" data-key="t-error-404">Segmen
                                    Kendaraan</a></li>
                            <li><a href="{{ route('admin.ritase.view') }}" data-key="t-error-404">Ritase</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="{{ route('app.report.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Report</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.utilitas.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Utilitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-pages">Biaya</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.bbm.view') }}" data-key="t-error-404">BBM</a></li>
                            <li><a href="{{ route('admin.bbm_forklift.view') }}" data-key="t-error-404">BBM
                                    Forklift</a></li>
                            <li><a href="{{ route('admin.sparepart.view') }}" data-key="t-error-404">Sparepart</a></li>
                            <li><a href="{{ route('admin.stnk.view') }}" data-key="t-error-404">STNK</a></li>
                            <li><a href="{{ route('admin.kir.view') }}" data-key="t-error-404">KIR</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.voucher.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Voucher</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.barcode_scan.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Barcode</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-pages">Informasi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.info_utilitas.view') }}" data-key="t-error-404">Utilitas</a>
                            </li>
                            <li><a href="{{ route('admin.info_biaya.view') }}" data-key="t-error-404">Biaya</a></li>
                            <li><a href="{{ route('admin.info_barcode.view') }}" data-key="t-error-404">Barcode</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.users.view') }}">
                            <i data-feather="users"></i>
                            <span data-key="t-horizontal">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-pages">Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.company_identity.view') }}" data-key="t-error-404">Company
                                    Identity</a></li>
                            <li><a href="{{ route('admin.config_app.view') }}" data-key="t-error-500">Config App</a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->roles == 'Akunting')
                    <li>
                        <a href="{{ route('akunting.dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-pages">Biaya</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('akunting.bbm_akunting.view') }}" data-key="t-error-404">BBM</a>
                            </li>
                            <li><a href="{{ route('akunting.bbm_forklift_akunting.view') }}"
                                    data-key="t-error-404">BBM Forklift</a></li>
                            <li><a href="{{ route('akunting.sparepart_akunting.view') }}"
                                    data-key="t-error-404">Sparepart</a></li>
                            <li><a href="{{ route('akunting.stnk_akunting.view') }}" data-key="t-error-404">STNK</a>
                            </li>
                            <li><a href="{{ route('akunting.kir_akunting.view') }}" data-key="t-error-404">Kir</a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->roles == 'Admin')
                    <li>
                        <a href="{{ route('user.dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-pages">Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('user.kategori.view') }}" data-key="t-error-404">Kategori</a></li>
                            <li><a href="{{ route('user.bbm_spbu.view') }}" data-key="t-error-404">Import Biaya
                                    SPBU</a></li>
                            <li><a href="{{ route('user.bbm_saldo_spbu.view') }}" data-key="t-error-404">Saldo</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('user.utilitas.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Utilitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-pages">Biaya</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('user.bbm.view') }}" data-key="t-error-404">BBM</a></li>
                            <li><a href="{{ route('user.bbm_forklift.view') }}" data-key="t-error-404">BBM
                                    Forklift</a></li>
                            <li><a href="{{ route('user.sparepart.view') }}" data-key="t-error-404">Sparepart</a>
                            </li>
                            <li><a href="{{ route('user.stnk.view') }}" data-key="t-error-404">STNK</a></li>
                            <li><a href="{{ route('user.kir.view') }}" data-key="t-error-404">Kir</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('user.voucher.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Voucher</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.barcode_scan.view') }}">
                            <i data-feather="hexagon"></i>
                            <span data-key="t-horizontal">Barcode</span>
                        </a>
                    </li>
                @elseif (Auth::user()->roles == 'BOD')
                    <li>
                        <a href="{{ route('bod.dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Home</span>
                        </a>
                        <a href="{{ route('bod.dashboard.product') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Product</span>
                        </a>
                    </li>
                @endif
                <li class="menu-title mt-2" data-key="t-components">Config</li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target=".modal-form_account" id="alertlogout">
                        <i data-feather="settings"></i>
                        <span data-key="t-horizontal">Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" id="alertlogout">
                        <i data-feather="power"></i>
                        <span data-key="t-horizontal">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade modal-form_account" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('app.users.update') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">MY ACCOUNT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name Users </label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control form-control-sm" name="id"
                                value="{{ Auth::user()->id }}" placeholder="" readonly>
                            <input type="text" class="form-control form-control-sm" name="name"
                                value="{{ Auth::user()->name }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Roles </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="roles"
                                value="{{ Auth::user()->roles }}" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Terakhir Login
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="last_login"
                                value="{{ Auth::user()->last_login }}" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Login </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="status_account"
                                value="{{ Auth::user()->status_account }}" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" name="email"
                                value="{{ Auth::user()->email }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Password </label>
                        <div class="col-sm-9">
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" class="form-control" name="password" required>
                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i
                                        class="mdi mdi-eye-outline"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

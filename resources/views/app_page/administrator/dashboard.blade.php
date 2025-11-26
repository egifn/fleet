@extends('app_page.layout.layout_master')
@push('style-custome')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">DASHBOARD</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">data</a></li>
                                <li class="breadcrumb-item active">dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->roles == 'Superadmin')
                <div class="container mt-4">
                    <div class="row" style="border: 1px solid #e1e1e1; padding: 10px 10px;">
                        <p style="padding: 0 7px; font-size: 25px; font-weight: 500;">DATA STNK</p>
                        <!-- STNK -->
                        <div class="col-md-3">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data STNK Total</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total</h5>
                                        <h4 class="card-title-dashboard">{{ $stnkNextMonth ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>1 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $stnkNextMonth ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>5 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $stnkNewPlat ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data PRIMARY</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalPrimarystnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>1 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $primarystnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>5 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $primaryNewPlat ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data SECONDARY</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalSecondarystnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>1 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $secondarystnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>5 Th</h5>
                                        <h4 class="card-title-dashboard">{{ $secondaryNewPlat ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data STNK Selesai</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalSelesaistnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Primary</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalSelesaiPrimarystnk ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Secondary</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalSelesaiSecondarystnk ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KIR -->
                <div class="container mt-4">
                    <div class="row" style="border: 1px solid #e1e1e1; padding: 10px 10px;">
                        <p style="padding: 0 7px; font-size: 25px; font-weight: 500;">DATA KIR</p>
                        <!-- STNK -->
                        <div class="col-md-6">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data KIR Total</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total</h5>
                                        <h4 class="card-title-dashboard">{{ $Totalkir ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Primary</h5>
                                        <h4 class="card-title-dashboard">{{ $primarykir ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Secondary</h5>
                                        <h4 class="card-title-dashboard">{{ $secondarykir ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-dashboard">
                                <div class="card-header-dashboard">Data KIR Total</div>
                                <div class="card-body-dashboard">
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Total Selesai</h5>
                                        <h4 class="card-title-dashboard">{{ $TotalKirSelesai ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Primary</h5>
                                        <h4 class="card-title-dashboard">{{ $selesaiPrimarykir ?? 0 }}</h4>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <h5>Secondary</h5>
                                        <h4 class="card-title-dashboard">{{ $selesaiSecondarykir ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script></script>
@endsection
@push('script-custome')
@endpush

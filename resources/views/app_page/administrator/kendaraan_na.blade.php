@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA KENDARAAN</h4>
                    <form action="{{ route('admin.kendaraan_na.kendaraan_na_excel') }}" target="_blank" method="get" enctype="multipart/form-data">
                        <div class="page-title-right">
                            <button class="btn btn-success btn-sm" type="submit">E x c e l </button>
                        </div>
                    </form>
                    <!--  Large modal example -->
                    <div class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="#" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Tambah Kendaraan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Polisi <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="no_polisi" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Rangka <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="no_rangka" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Mesin <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="no_mesin" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama Pemilik <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="nama_pemilik" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Merek <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="merek" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tipe <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="type" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Rasio Ideal <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="rasio_ideal" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Model <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="model" id="model" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Rak">Rak</option>
                                                    <option value="Box">Box</option>
                                                    <option value="Krangkeng">Krangkeng</option>
                                                    <option value="Lost Bak">Lost Bak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tahun <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="tahun" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Warna Mobil <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="warna" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kapasitas Mesin <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="kapasitas_mesin" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">kategori <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="kategori" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Perusahaan <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="perusahaan" id="perusahaan" required>
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
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Penempatan <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0" required>
                                                </select>
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
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Kendaraan <span class="text-danger"><small>*</small></span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="status_kendaraan" id="status_kendaraan" data-id="0" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Dijual">Dijual</option>
                                                    <option value="Hilang">Hilang</option>
                                                    <option value="Rusak">Rusak</option>
                                                    <option value="Unused">Unused</option>
                                                    <option value="Used">Used</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Kepemilikan <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="status_kepemilikan" id="status_kepemilikan" data-id="0" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Hak Milik">Hak Milik</option>
                                                    <option value="Sewa">Sewa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Keterangan <span class="text-danger"><small>*</small></span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" name="keterangan" value="" placeholder="" required>
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
                                    <th hidden>id</th>
                                    <th>Nomor Polisi</th>
                                    <th>Nomor Rangka</th>
                                    <th>Nomor Mesin</th>
                                    <th>Nama Pemilik</th>
                                    <th>Merek</th>
                                    <th>Tipe</th>
                                    <th>Rasio Ideal</th>
                                    <th>Model</th>
                                    <th>Tahun</th>
                                    <th>Warna</th>
                                    <th>Kapasitas Mesin</th>
                                    <th>Kategori</th>
                                    <th hidden>Id Depo</th>
                                    <th>Penempatan</th>
                                    <th>Perusahaan</th>
                                    <th hidden>Id Segmen</th>
                                    <th>Segmen</th>
                                    <th>Status Kendaraan</th>
                                    <th>Status Kepemilikan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                    {{-- <th>Kapasitas Vol</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($dt_kendaraan as $item_kendaraan)
                                <tr>
                                    <td style="padding: 7px 5px;">{{ $no++ }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_kendaraan->id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->no_polisi }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->no_rangka }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->no_mesin }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_pemilik }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->merek }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->type }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->rasio_ideal }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->model }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->tahun }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->warna }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->kapasitas_mesin }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->kategori }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_kendaraan->penempatan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->name_branch }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->perusahaan }}</td>
                                    <td style="padding: 7px 5px;" hidden>{{ $item_kendaraan->id_segmen }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->nama_segmen }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kendaraan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->status_kepemilikan }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_kendaraan->keterangan }}</td>
                                    <td style="padding: 7px 5px;">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_kendaraan->id }}" style="padding: 1px 10px 1px 10px;">edit</a>
                                        <a href="{{ route('admin.branch.delete', $item_kendaraan->id) }}" id="delitems" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 1px 10px 1px 10px;">delete</a>
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_kendaraan->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.kendaraan.update') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Update Kendaraan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Polisi <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" class="form-control form-control-sm" name="id_upate" value="{{ $item_kendaraan->id }}" placeholder="">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="no_polisi_upate" value="{{ $item_kendaraan->no_polisi }}" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Rangka <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="no_rangka_upate" value="{{ $item_kendaraan->no_rangka }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomor Mesin <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="no_mesin_upate" value="{{ $item_kendaraan->no_mesin }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama Pemilik <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="nama_pemilik_upate" value="{{ $item_kendaraan->nama_pemilik }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Merek <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="merek_upate" value="{{ $item_kendaraan->merek }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tipe <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="type_upate" value="{{ $item_kendaraan->type }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Rasio Ideal <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="rasio_ideal_upate" value="{{ $item_kendaraan->rasio_ideal }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Model <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="model_upate" id="model" value="{{ $item_kendaraan->model }}" >
                                                                <option value="{{ $item_kendaraan->model }}">{{ $item_kendaraan->model }}</option>
                                                                <option value="Rak">Rak</option>
                                                                <option value="Box">Box</option>
                                                                <option value="Krangkeng">Krangkeng</option>
                                                                <option value="Lost Bak">Lost Bak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tahun <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="tahun_upate" value="{{ $item_kendaraan->tahun }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Warna Mobil <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="warna_upate" value="{{ $item_kendaraan->warna }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Kapasitas Mesin <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="kapasitas_mesin_upate" value="{{ $item_kendaraan->kapasitas_mesin }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">kategori <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="kategori_upate" value="{{ $item_kendaraan->kategori }}" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Perusahaan <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="perusahaan_upate" id="perusahaan" >
                                                                <option value="{{ $item_kendaraan->perusahaan }}">{{ $item_kendaraan->perusahaan }}</option>
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
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Penempatan <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="penempatan_upate" id="penempatan" data-id="0" >
                                                                <option value="{{ $item_kendaraan->penempatan }}">{{ $item_kendaraan->name_branch }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Segmen <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="id_segmen_upate" id="id_segmen" >
                                                                <option value="{{ $item_kendaraan->id_segmen }}">{{ $item_kendaraan->nama_segmen }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Kendaraan <span class="text-danger"><small>*</small></span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="status_kendaraan_upate" id="status_kendaraan" data-id="0" >
                                                                <option value="{{ $item_kendaraan->status_kendaraan }}">{{ $item_kendaraan->status_kendaraan }}</option>
                                                                <option value="Dijual">Dijual</option>
                                                                <option value="Hilang">Hilang</option>
                                                                <option value="Rusak">Rusak</option>
                                                                <option value="Unused">Unused</option>
                                                                <option value="Used">Used</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status Kepemilikan <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" name="status_kepemilikan_upate" id="status_kepemilikan" data-id="0" >
                                                                <option value="{{ $item_kendaraan->status_kepemilikan }}">{{ $item_kendaraan->status_kepemilikan }}</option>
                                                                <option value="Hak Milik">Hak Milik</option>
                                                                <option value="Sewa">Sewa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Keterangan <span class="text-danger"><small>*</small></span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" name="keterangan_upate" value="{{ $item_kendaraan->keterangan }}" placeholder="" >
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
            }
        });
    });
</script>
@endpush
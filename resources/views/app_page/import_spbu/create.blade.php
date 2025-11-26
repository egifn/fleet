@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Import Biaya SPBU</h4>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->roles == 'Superadmin')
                            <form action="#" method="post" enctype="multipart/form-data" id="import-data">
                            @elseif (Auth::user()->roles == 'Admin')
                            <form action="{{ route('user.bbm_spbu.store') }}" method="post" enctype="multipart/form-data" id="import-data">
                            @endif
                            {{ csrf_field() }}

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo<span
                                            class="text-danger"><small>*</small></span> </label>
                                    <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0">
                                        <option value="">Pilih Depo</option> 
                                        @foreach ($dt_branch as $branch)
                                            <option value="{{ $branch->code_branch }}" {{ request('penempatan') == $branch->code_branch ? 'selected' : '' }}>
                                                {{ $branch->code_branch }} | {{ $branch->name_branch }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Cari File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control form-control-sm" name="file"
                                            id="file" placeholder="">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-custome')
<script>
    document.getElementById("import-data").addEventListener("submit", function(event) {
        var penempatan = document.getElementById("penempatan").value;
        if (!penempatan) {
            alert("Pilih depo. Depo harus diisi.");
            event.preventDefault(); // Mencegah formulir untuk dikirim jika select box kosong
        }
    });
</script>
@endpush

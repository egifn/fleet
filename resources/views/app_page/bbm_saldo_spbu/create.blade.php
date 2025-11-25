@extends('app_page.layout.layout_master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah Saldo</h4>
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
                            <form action="{{ route('user.bbm_saldo_spbu.store') }}" method="post" enctype="multipart/form-data" id="import-data">
                            @endif
                            {{ csrf_field() }}

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Depo<span
                                            class="text-danger"><small>*</small></span> </label>
                                    <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="penempatan" id="penempatan" data-id="0">
                                        <option value="{{ $dt_branch->code_branch }}">{{ $dt_branch->name_branch }}</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Tagihan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="tagihan" id="tagihan" value="{{ number_format($dt_tr_bbm_spbu->total_spbu) }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sisa saldo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="sisa_saldo" id="sisa_saldo" value="{{ number_format($dt_tr_bbm_spbu_saldo->saldo_akhir ?? 0) }}" readonly>
                                    </div>
                                </div>
                               
                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Jml saldo yang ditambahkan </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="tambah_saldo" id="tambah_saldo" value="0">
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Saldo akhir </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="saldo_akhir" id="saldo_akhir" value="0" readonly>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Kembali</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('tambah_saldo');

        input.addEventListener('input', function (e) {
            let value = this.value.replace(/[^0-9]/g, ''); // hanya angka
            if (value) {
                this.value = new Intl.NumberFormat('en-US').format(value);
            } else {
                this.value = '';
            }
        });

        const tagihan = document.getElementById('tagihan');
        const sisaSaldo = document.getElementById('sisa_saldo');
        const saldoAkhir = document.getElementById('saldo_akhir');

        //Hapus format rupiah
        function parseRupiah(angka) {
            return parseInt(angka.replace(/[^0-9]/g, ''), 10) || 0;
        }

        //Ubah angka ke format rupiah
        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        function hitungSaldoAwal() {
            let sisa = parseRupiah(sisaSaldo.value);
            let tagih = parseRupiah(tagihan.value);
            let hasil = sisa - tagih;
            saldoAkhir.value = formatRupiah(hasil);
        }

        function updateSaldoAkhir() {
            let sisa = parseRupiah(sisaSaldo.value);
            let tagih = parseRupiah(tagihan.value);
            let tambahan = parseRupiah(input.value);
            let hasil = sisa - tagih + tambahan;
            saldoAkhir.value = formatRupiah(hasil);
        }

        [tagihan, sisaSaldo, input].forEach(input => {
            input.addEventListener('input', function () {
                let pos = input.selectionStart;
                let value = parseRupiah(input.value);
                input.value = formatRupiah(value);
                input.setSelectionRange(pos, pos);
                updateSaldoAkhir();
            });
        });
        hitungSaldoAwal();


    });


</script>
@endpush

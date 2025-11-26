<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use APP\Http\Controllers\WelcomeContrpller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| client-public
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::get('/', 'ADMIN\WelcomeController@index')->name('welcome');
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| admin-app
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('auth/administrator', 'AUTHENTICATION\AuthController@index')->name('login')->middleware('guest');
Route::post('auth/cek/login', 'AUTHENTICATION\AuthController@ceklogin')->name('login.cek')->middleware('guest');
Route::get('auth/logout', 'AUTHENTICATION\AuthController@logout')->name('logout');
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| ADMINISTRATOR
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/administrator', 'middleware' => ['auth', 'is_superadmin']], function () {
    # :: APP |  MASTER DASHBOARD
    Route::get('/dashboard', 'ADMIN\DashboardController@view')->name('admin.dashboard');
    Route::get('/dashboard/product', 'ADMIN\DashboardController@product')->name('admin.dashboard.product');
    # :: APP |  MASTER USERS
    Route::get('/users', 'ADMIN\UsersController@view')->name('admin.users.view');
    Route::post('/users/insert', 'ADMIN\UsersController@insert')->name('admin.users.insert');
    Route::post('/users/update', 'ADMIN\UsersController@update')->name('admin.users.update');
    Route::post('/users/update/status', 'ADMIN\UsersController@updatestatus')->name('admin.users.update.status');
    Route::get('/users/delete/{id}', 'ADMIN\UsersController@delete')->name('admin.users.delete');
    # :: APP |  MASTER ACTIVITIES LOG
    Route::get('/activities/log', 'ADMIN\ActivitieslogController@view')->name('admin.activities.log.view');
    # :: APP |  MASTER data_config_app
    Route::get('/set/config-app', 'ADMIN\Config_app@view')->name('admin.config_app.view');
    Route::post('/set/config-app/update', 'ADMIN\Config_app@update')->name('admin.config_app.update');
    # :: APP |  MASTER data_company_identity
    Route::get('/company-identity', 'ADMIN\Company_identity@view')->name('admin.company_identity.view');
    Route::post('/company-identity/update', 'ADMIN\Company_identity@update')->name('admin.company_identity.update');
    # :: APP | MASTER | BRANCH
    Route::get('/admin/branch', 'ADMIN\BranchController@view')->name('admin.branch.view');
    Route::post('/admin/branch/insert', 'ADMIN\BranchController@insert')->name('admin.branch.insert');
    Route::post('/admin/branch/update', 'ADMIN\BranchController@update')->name('admin.branch.update');
    Route::get('/admin/branch/delete/{id}', 'ADMIN\BranchController@delete')->name('admin.branch.delete');
    # :: APP | MASTER | KENDARAAN
    Route::get('/admin/kendaraan', 'ADMIN\KendaraanController@view')->name('admin.kendaraan.view');
    Route::post('/admin/kendaraan/insert', 'ADMIN\KendaraanController@insert')->name('admin.kendaraan.insert');
    Route::post('/admin/kendaraan/update', 'ADMIN\KendaraanController@update')->name('admin.kendaraan.update');
    Route::get('/admin/kendaraan/view_excel', 'ADMIN\KendaraanController@view_excel')->name('admin.kendaraan.view_excel');
    Route::get('/admin/kendaraan/master_tank', 'ADMIN\KendaraanController@master_tank')->name('admin.kendaraan.master_tank');
    Route::get('/admin/kendaraan/add_tank', 'ADMIN\KendaraanController@add_tank')->name('admin.kendaraan.add_tank');
    Route::post('/admin/kendaraan/update_tank', 'ADMIN\KendaraanController@update_tank')->name('admin.kendaraan.update_tank');
    Route::post('/admin/kendaraan/update_add_tank', 'ADMIN\KendaraanController@update_add_tank')->name('admin.kendaraan.update_add_tank');
    # :: APP | MASTER | KENDARAAN (di jual)
    Route::get('/admin/kendaraan_na', 'ADMIN\KendaraanNaController@view')->name('admin.kendaraan_na.view');
    Route::get('/admin/kendaraan_na/kendaraan_na_excel', 'ADMIN\KendaraanNaController@kendaraan_na_excel')->name('admin.kendaraan_na.kendaraan_na_excel');
    //Route::post('/admin/kendaraan_na/insert', 'ADMIN\KendaraanNaController@insert')->name('admin.kendaraan.insert');
    //Route::post('/admin/kendaraan_na/update', 'ADMIN\KendaraanNaController@update')->name('admin.kendaraan.update');
    # :: APP | MASTER | KENDARAAN SEWA
    Route::get('/admin/kendaraan_sewa', 'ADMIN\KendaraanSewaController@view')->name('admin.kendaraan_sewa.view');
    Route::post('/admin/kendaraan_sewa/insert', 'ADMIN\KendaraanSewaController@insert')->name('admin.kendaraan_sewa.insert');
    Route::get('/admin/kendaraan_sewa/kendaraan_sewa_excel', 'ADMIN\KendaraanSewaController@kendaraan_sewa_excel')->name('admin.kendaraan_sewa.kendaraan_sewa_excel');
    # :: APP | MASTER | FORKLIFT
    Route::get('/admin/forklift', 'ADMIN\ForkliftController@view')->name('admin.forklift.view');
    Route::post('/admin/forklift/insert', 'ADMIN\ForkliftController@insert')->name('admin.forklift.insert');
    Route::post('/admin/forklift/update', 'ADMIN\ForkliftController@update')->name('admin.forklift.update');
    Route::get('/admin/forklift/view_excel', 'ADMIN\ForkliftController@view_excel')->name('admin.forklift.view_excel');
    # :: APP | MASTER | SURAT KENDARAAN
    Route::get('/admin/surat', 'ADMIN\SuratController@view')->name('admin.surat.view');
    Route::post('/admin/surat/insert', 'ADMIN\SuratController@insert')->name('admin.surat.insert');
    # :: APP | MASTER | VENDOR
    Route::get('/admin/vendor', 'ADMIN\VendorController@view')->name('admin.vendor.view');
    Route::post('/admin/vendor/insert', 'ADMIN\VendorController@insert')->name('admin.vendor.insert');
    # :: APP | MASTER | BBM
    Route::get('/admin/databbm', 'ADMIN\DataBbmController@view')->name('admin.databbm.view');
    Route::get('/admin/databbm/get_branch', 'ADMIN\DataBbmController@data_branch')->name('admin.databbm.data_branch');
    Route::post('/admin/databbm/insert', 'ADMIN\DataBbmController@insert')->name('admin.databbm.insert');
    Route::post('/admin/databbm/update', 'ADMIN\DataBbmController@update')->name('admin.databbm.update');
    # :: APP | MASTER | SEGMEN
    Route::get('/admin/segmen', 'ADMIN\SegmenController@view')->name('admin.segmen.view');
    Route::post('/admin/segmen/insert', 'ADMIN\SegmenController@insert')->name('admin.segmen.insert');
    # :: APP | MASTER | SEGMEN PRODUK
    Route::get('/admin/segmen_produk', 'ADMIN\SegmenProdukController@view')->name('admin.segmen_produk.view');
    Route::post('/admin/segmen_produk/insert', 'ADMIN\SegmenProdukController@insert')->name('admin.segmen_produk.insert');
    # :: APP | MASTER | SEGMEN KENDARAAN
    Route::get('/admin/segmen_kendaraan', 'ADMIN\SegmenKendaraanController@view')->name('admin.segmen_kendaraan.view');
    Route::post('/admin/segmen_kendaraan/insert', 'ADMIN\SegmenKendaraanController@insert')->name('admin.segmen_kendaraan.insert');
    # :: APP | MASTER | SEGMEN RITASE
    Route::get('/admin/ritase', 'ADMIN\RitaseController@view')->name('admin.ritase.view');
    Route::post('/admin/ritase/insert', 'ADMIN\RitaseController@insert')->name('admin.ritase.insert');
    # :: APP | MASTER | KATEGORI
    Route::get('/admin/kategori', 'ADMIN\KategoriController@view')->name('admin.kategori.view');
    Route::post('/admin/kategori/insert', 'ADMIN\KategoriController@insert')->name('admin.kategori.insert');
    Route::post('/admin/kategori/update', 'ADMIN\KategoriController@update')->name('admin.kategori.update');

    # :: APP | UTILITAS
    Route::get('/admin/utilitas', 'ADMIN\UtilitasController@view')->name('admin.utilitas.view');
    Route::get('/admin/utilitas/create', 'ADMIN\UtilitasController@create')->name('admin.utilitas.create');
    Route::post('/admin/utilitas/store', 'ADMIN\UtilitasController@store')->name('admin.utilitas.store');
    # :: APP | BIAYA | BBM
    Route::get('/admin/bbm', 'ADMIN\BbmController@view')->name('admin.bbm.view');
    Route::get('/admin/bbm/create', 'ADMIN\BbmController@create')->name('admin.bbm.create');
    Route::get('/admin/bbm/getkm', 'ADMIN\BbmController@getkm')->name('admin.bbm.getkm');
    Route::post('/admin/bbm/insert', 'ADMIN\BbmController@insert')->name('admin.bbm.insert');
    Route::get('/admin/bbm/view_excel', 'ADMIN\BbmController@view_excel')->name('admin.bbm.view_excel');
    # :: APP | BIAYA | BBM FORKLIFT
    Route::get('/admin/bbm_forklift', 'ADMIN\BbmForkliftController@view')->name('admin.bbm_forklift.view');
    Route::get('/admin/bbm_forklift/create', 'ADMIN\BbmForkliftController@create')->name('admin.bbm_forklift.create');
    Route::get('/admin/bbm_forklift/getkm', 'ADMIN\BbmForkliftController@getkm')->name('admin.bbm_forklift.getkm');
    Route::post('/admin/bbm_forklift/insert', 'ADMIN\BbmForkliftController@insert')->name('admin.bbm_forklift.insert');
    Route::get('/admin/bbm_forklift/view_excel', 'ADMIN\BbmForkliftController@view_excel')->name('admin.bbm_forklift.view_excel');
    # :: APP | BIAYA | SPAREPART
    Route::get('/admin/sparepart', 'ADMIN\SparepartController@view')->name('admin.sparepart.view');
    Route::get('/admin/sparepart/create', 'ADMIN\SparepartController@create')->name('admin.sparepart.create');
    Route::post('/admin/sparepart/insert', 'ADMIN\SparepartController@insert')->name('admin.sparepart.insert');
    Route::get('/admin/sparepart/view_excel', 'ADMIN\SparepartController@view_excel')->name('admin.sparepart.view_excel');
    # :: APP | BIAYA | STNK
    Route::get('/admin/stnk', 'ADMIN\StnkController@view')->name('admin.stnk.view');
    Route::get('/admin/stnk/create', 'ADMIN\StnkController@create')->name('admin.stnk.create');
    Route::post('/admin/stnk/insert', 'ADMIN\StnkController@insert')->name('admin.stnk.insert');
    Route::post('/admin/stnk/save-attachment', 'ADMIN\StnkController@saveAttachment')->name('admin.stnk.saveattachment');
    # :: APP | BIAYA | KIR
    Route::get('/admin/kir', 'ADMIN\KirController@view')->name('admin.kir.view');
    Route::get('/admin/kir/create', 'ADMIN\KirController@create')->name('admin.kir.create');
    Route::post('/admin/kir/insert', 'ADMIN\KirController@insert')->name('admin.kir.insert');
    Route::post('/admin/kir/save-attachment', 'ADMIN\KirController@saveAttachment')->name('admin.kir.saveattachment');
    # :: APP | VOUCHER BBM
    Route::get('/admin/voucher', 'ADMIN\VoucherBbmController@view')->name('admin.voucher.view');
    Route::get('/admin/voucher/create', 'ADMIN\VoucherBbmController@create')->name('admin.voucher.create');
    Route::post('/admin/voucher/insert', 'ADMIN\VoucherBbmController@insert')->name('admin.voucher.insert');
    Route::post('/admin/voucher/save-attachment', 'ADMIN\VoucherBbmController@saveAttachment')->name('admin.voucher.saveattachment');
    // Route::post('/save-attachment', [BBMController::class, 'saveAttachment'])->name('save.attachment');
    Route::get('/admin/voucher/getkm', 'ADMIN\VoucherBbmController@getkm')->name('admin.voucher.getkm');
    Route::get('/admin/voucher/pdf', 'ADMIN\VoucherBbmController@pdf')->name('admin.voucher.pdf');
    Route::post('/admin/voucher/print', 'ADMIN\VoucherBbmController@print')->name('admin.voucher.print');
    Route::get('/admin/voucher/view_excel_pending', 'ADMIN\VoucherBbmController@view_excel_pending')->name('admin.voucher.view_excel_pending');
    Route::get('/admin/voucher/view_excel_kadaluarsa', 'ADMIN\VoucherBbmController@view_excel_kadaluarsa')->name('admin.voucher.view_excel_kadaluarsa');
    Route::get('/admin/voucher/view_excel_selesai', 'ADMIN\VoucherBbmController@view_excel_selesai')->name('admin.voucher.view_excel_selesai');

    # :: APP | BARCODE | 
    Route::get('/admin/barcode_scan', 'ADMIN\ScanBarcodeController@view')->name('admin.barcode_scan.view');
    Route::get('/admin/barcode_scan/get_armada_details/{barcode}', 'ADMIN\ScanBarcodeController@getArmadaDetail')->name('app/administrator/admin/barcode_scan/get_armada_details');
    Route::post('/admin/barcode_scan/store', 'ADMIN\ScanBarcodeController@store')->name('admin.barcode_scan/store.store');




    # :: APP | INFORMASI | UTILITAS
    Route::get('/admin/info_utilitas', 'ADMIN\InfoUtilitasController@view')->name('admin.info_utilitas.view');
    # :: APP | INFORMASI | BIAYA
    Route::get('/admin/info_biaya', 'ADMIN\InfoBiayaController@view')->name('admin.info_biaya.view');
    # :: APP | INFORMASI | BARCODE
    Route::get('/admin/info_barcode', 'ADMIN\InfoBarcodeController@view')->name('admin.info_barcode.view');
});

/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Admin
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/opsho', 'middleware' => ['auth', 'is_ops']], function () {
    Route::get('/dashboard', 'ADMIN\DashboardController@view')->name('ops.dashboard');
    Route::get('/dashboard', 'ADMIN\DashboardController@index')->name('dashboard');
});

/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Akunting
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/akunting', 'middleware' => ['auth', 'is_akunting']], function () {
    Route::get('/dashboard', 'ADMIN\DashboardController@view')->name('akunting.dashboard');

    # :: APP | BIAYA | BBM
    Route::get('/admin/bbm_akunting', 'ADMIN\BbmAkuntingController@view')->name('akunting.bbm_akunting.view');
    Route::get('/admin/bbm/view_excel', 'ADMIN\BbmController@view_excel')->name('akunting.bbm.view_excel');
    # :: APP | BIAYA | BBM FORKLIFT
    Route::get('/admin/bbm_forklift_akunting', 'ADMIN\BbmForkliftAkuntingController@view')->name('akunting.bbm_forklift_akunting.view');
    Route::get('/admin/bbm_forklift/view_excel', 'ADMIN\BbmForkliftController@view_excel')->name('akunting.bbm_forklift.view_excel');
    # :: APP | BIAYA | SPAREPART
    Route::get('/admin/sparepart_akunting', 'ADMIN\SparepartAkuntingController@view')->name('akunting.sparepart_akunting.view');
    Route::get('/admin/sparepart/view_excel', 'ADMIN\SparepartController@view_excel')->name('akunting.sparepart.view_excel');
    # :: APP | BIAYA | STNK
    Route::get('/admin/stnk_akunting', 'ADMIN\StnkAkuntingController@view')->name('akunting.stnk_akunting.view');
    # :: APP | BIAYA | KIR
    Route::get('/admin/kir_akunting', 'ADMIN\KirAkuntingController@view')->name('akunting.kir_akunting.view');
    Route::get('/admin/kir/create', 'ADMIN\KirController@create')->name('akunting.kir.create');
    Route::post('/admin/kir/insert', 'ADMIN\KirController@insert')->name('akunting.kir.insert');
    Route::post('/admin/kir/save-attachment', 'ADMIN\KirController@saveAttachment')->name('akunting.kir.saveattachment');
});

/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Admin
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/dashboard', 'ADMIN\DashboardController@view')->name('user.dashboard');

    # :: APP | MASTER | KATEGORI
    Route::get('/admin/kategori', 'ADMIN\KategoriController@view')->name('user.kategori.view');
    Route::post('/admin/kategori/insert', 'ADMIN\KategoriController@insert')->name('user.kategori.insert');
    Route::post('/admin/kategori/update', 'ADMIN\KategoriController@update')->name('user.kategori.update');

    # :: APP | UTILITAS
    Route::get('/admin/utilitas', 'ADMIN\UtilitasController@view')->name('user.utilitas.view');
    Route::get('/admin/utilitas/create', 'ADMIN\UtilitasController@create')->name('user.utilitas.create');
    Route::post('/admin/utilitas/store', 'ADMIN\UtilitasController@store')->name('user.utilitas.store');
    # :: APP | BIAYA | BBM
    Route::get('/admin/bbm', 'ADMIN\BbmController@view')->name('user.bbm.view');
    Route::get('/admin/bbm/create', 'ADMIN\BbmController@create')->name('user.bbm.create');
    Route::get('/admin/bbm/getkm', 'ADMIN\BbmController@getkm')->name('user.bbm.getkm');
    Route::post('/admin/bbm/insert', 'ADMIN\BbmController@insert')->name('user.bbm.insert');
    Route::get('/admin/bbm/view_excel', 'ADMIN\BbmController@view_excel')->name('user.bbm.view_excel');
    Route::get('/admin/bbm/getkm', 'ADMIN\BbmController@getkm')->name('user.bbm.getkm');
    # :: APP | BIAYA | BBM FORKLIFT
    Route::get('/admin/bbm_forklift', 'ADMIN\BbmForkliftController@view')->name('user.bbm_forklift.view');
    Route::get('/admin/bbm_forklift/create', 'ADMIN\BbmForkliftController@create')->name('user.bbm_forklift.create');
    Route::get('/admin/bbm_forklift/getkm', 'ADMIN\BbmForkliftController@getkm')->name('user.bbm_forklift.getkm');
    Route::post('/admin/bbm_forklift/insert', 'ADMIN\BbmForkliftController@insert')->name('user.bbm_forklift.insert');
    Route::get('/admin/bbm_forklift/view_excel', 'ADMIN\BbmForkliftController@view_excel')->name('user.bbm_forklift.view_excel');
    # :: APP | VOUCHER BBM
    Route::get('/admin/voucher', 'ADMIN\VoucherBbmController@view')->name('user.voucher.view');
    Route::get('/admin/voucher/create', 'ADMIN\VoucherBbmController@create')->name('user.voucher.create');
    Route::post('/admin/voucher/insert', 'ADMIN\VoucherBbmController@insert')->name('user.voucher.insert');
    Route::post('/admin/voucher/save-attachment', 'ADMIN\VoucherBbmController@saveAttachment')->name('user.voucher.saveattachment');
    Route::get('/admin/voucher/view_excel_pending', 'ADMIN\VoucherBbmController@view_excel_pending')->name('user.voucher.view_excel_pending');
    Route::get('/admin/voucher/view_excel_kadaluarsa', 'ADMIN\VoucherBbmController@view_excel_kadaluarsa')->name('user.voucher.view_excel_kadaluarsa');
    Route::get('/admin/voucher/view_excel_selesai', 'ADMIN\VoucherBbmController@view_excel_selesai')->name('user.voucher.view_excel_selesai');
    # :: APP | MASTER | FORKLIFT
    Route::get('/admin/forklift', 'ADMIN\ForkliftController@view')->name('user.forklift.view');
    Route::post('/admin/forklift/insert', 'ADMIN\ForkliftController@insert')->name('user.forklift.insert');
    Route::post('/admin/forklift/update', 'ADMIN\ForkliftController@update')->name('user.forklift.update');
    Route::get('/admin/forklift/view_excel', 'ADMIN\ForkliftController@view_excel')->name('user.forklift.view_excel');
    # :: APP | BIAYA | SPAREPART
    Route::get('/admin/sparepart', 'ADMIN\SparepartController@view')->name('user.sparepart.view');
    Route::get('/admin/sparepart/create', 'ADMIN\SparepartController@create')->name('user.sparepart.create');
    Route::post('/admin/sparepart/insert', 'ADMIN\SparepartController@insert')->name('user.sparepart.insert');
    Route::get('/admin/sparepart/view_excel', 'ADMIN\SparepartController@view_excel')->name('user.sparepart.view_excel');
    # :: APP | BIAYA | STNK
    Route::get('/admin/stnk', 'ADMIN\StnkController@view')->name('user.stnk.view');
    Route::get('/admin/stnk/create', 'ADMIN\StnkController@create')->name('user.stnk.create');
    Route::post('/admin/stnk/insert', 'ADMIN\StnkController@insert')->name('user.stnk.insert');
    Route::post('/admin/stnk/save-attachment', 'ADMIN\StnkController@saveAttachment')->name('user.stnk.saveattachment');
    # :: APP | BIAYA | KIR
    Route::get('/admin/kir', 'ADMIN\KirController@view')->name('user.kir.view');
    Route::get('/admin/kir/create', 'ADMIN\KirController@create')->name('user.kir.create');
    Route::post('/admin/kir/insert', 'ADMIN\KirController@insert')->name('user.kir.insert');
    Route::post('/admin/kir/save-attachment', 'ADMIN\KirController@saveAttachment')->name('user.kir.saveattachment');

    # :: APP | BARCODE | 
    Route::get('/admin/barcode_scan', 'ADMIN\ScanBarcodeController@view')->name('user.barcode_scan.view');
    //Route::get('/admin/barcode_scan/get_armada_details/{barcode}', 'ADMIN\ScanBarcodeController@getArmadaDetail');
    Route::get('/admin/barcode_scan/get_armada_details/{barcode}', 'ADMIN\ScanBarcodeController@getArmadaDetail')->name('user.barcode_scan.get_armada_details');

    # :: APP | BIAYA BBM SPBU |
    Route::get('/admin/bbm_spbu', 'ADMIN\DataBbmSpbuController@view')->name('user.bbm_spbu.view');
    Route::get('/admin/bbm_spbu/create', 'ADMIN\DataBbmSpbuController@create')->name('user.bbm_spbu.create');
    Route::post('/admin/bbm_spbu/import', 'ADMIN\DataBbmSpbuController@store')->name('user.bbm_spbu.store');

    # :: APP | BIAYA BBM SPBU |
    Route::get('/admin/bbm_saldo_spbu', 'ADMIN\DataBbmSaldoSpbuController@view')->name('user.bbm_saldo_spbu.view');
    Route::get('/admin/bbm_saldo_spbu/create', 'ADMIN\DataBbmSaldoSpbuController@create')->name('user.bbm_saldo_spbu.create');
    Route::post('/admin/bbm_saldo_spbu/store', 'ADMIN\DataBbmSaldoSpbuController@store')->name('user.bbm_saldo_spbu.store');
});
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| BDO
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/bod', 'middleware' => ['auth', 'is_bod']], function () {
    Route::get('/bod/dashboard', 'BOD\DashboardController@view')->name('bod.dashboard');
});
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| DATA JSON
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'json/', 'middleware' => ['auth']], function () {
    # JSON :: users
    Route::get('/users', 'DATA\JsonController@data_users')->name('json.data.users');
    Route::get('/users/details', 'DATA\JsonController@data_users_details')->name('json.data.users_details');
    # JSON :: branch
    Route::get('/branch', 'DATA\JsonController@data_branch')->name('json.data.branch');
    # JSON :: cek data
    Route::post('/cek/users/email', 'DATA\CekDataController@cek_email')->name('app.cek.email');
    Route::post('/users/update', 'DATA\UsersController@update')->name('app.users.update');
    # JSON :: segmen
    Route::get('/segmen', 'DATA\JsonController@data_segmen')->name('json.data.segmen');
    # JSON :: segmen kendaraan
    Route::get('/segmen_kendaraan', 'DATA\JsonController@data_segmen_kendaraan')->name('json.data.segmen_kendaraan');
    # JSON :: data kendaraan
    Route::get('/kendaraan', 'DATA\JsonController@data_kendaraan')->name('json.data.kendaraan');
    # JSON :: data forklift
    Route::get('/forklift', 'DATA\JsonController@data_forklift')->name('json.data.data_forklift');
    # JSON :: data BBM
    Route::get('/bbm', 'DATA\JsonController@data_bbm')->name('json.data.bbm');
    # JSON :: data Vendor
    Route::get('/vendor', 'DATA\JsonController@data_vendor')->name('json.data.vendor');
});
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| GENERAL
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'app/general/', 'middleware' => 'auth'], function () {
    Route::get('/report', 'GENERAL\ReportController@view')->name('app.report.view');
});
/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Clear Config cache
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('/config/cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Clear Config cleared';
});
Route::get('/clear/cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

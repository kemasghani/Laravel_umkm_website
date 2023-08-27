<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\AdminUmkmController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\AspekController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\RangkingController;
use App\Http\Controllers\Admin\SubkriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DataUmkmController;
use App\Http\Controllers\User\UmkmController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\UserDashboard;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing_page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('ubah-password', [UserController::class, 'changePassword'])->name('ubah-password');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('update-password');

    Route::prefix('user/home')->name('user.')->middleware('ensureUserRole:1')->group(function () {
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
        Route::get('/pengumuman', [UserDashboard::class, 'pengumuman'])->name('pengumuman');
        Route::resource('umkm', UmkmController::class);
        Route::post('/umkm/data-alamat', [UmkmController::class, 'updateDataAlamat'])->name('umkm.updateDataAlamat');
        Route::post('/umkm/pilihan-kecamatan', [UmkmController::class, 'updatePilihanKecamatan'])->name('umkm.updatePilihanKecamatan');
        Route::post('/umkm/upload-foto', [UmkmController::class, 'uploadFoto'])->name('umkm.uploadFoto');
        Route::resource('document', DocumentController::class);
        Route::get('/cetak-formulir', [UmkmController::class, 'indexCetak'])->name('cetak-formulir');
        Route::get('/download-pdf', [UmkmController::class, 'downloadPDF'])->name('download-pdf');
        Route::get('/show-pdf', [UmkmController::class, 'showPdf'])->name('show-pdf');
        Route::get('/data-umkm', [DataUmkmController::class, 'index'])->name('data-umkm');
        Route::post('/edit-data-umkm', [DataUmkmController::class, 'edit'])->name('editDataUmkm');
        Route::post('/update-data-umkm', [DataUmkmController::class, 'update'])->name('updateDataUmkm');
        Route::post('/hapus-data-umkm', [DataUmkmController::class, 'destroy'])->name('hapusDataUmkm');
        Route::post('/update-status', [DataUmkmController::class, 'updateStatus'])->name('update-status');

        Route::get('/data-berkas', [DocumentController::class, 'dataBerkas'])->name('umkm.index-document');
        Route::get('/download-tempat/{id}', [DocumentController::class, 'downloadTempat'])->name('umkm.download_tempat');
        Route::get('/download-kk/{id}', [DocumentController::class, 'downloadKk'])->name('umkm.download_kk');
        Route::get('/download-ktp/{id}', [DocumentController::class, 'downloadKtp'])->name('umkm.download_ktp');
        Route::get('/download-nib/{id}', [DocumentController::class, 'downloadNib'])->name('umkm.download_nib');
        Route::get('/download-all', [DocumentController::class, 'downloadAll'])->name('umkm.download_all');
        Route::post('/edit-document', [DocumentController::class, 'edit'])->name('umkm.edit-document');
        Route::post('/update-document', [DocumentController::class, 'update'])->name('umkm.update-document');
        Route::post('/hapus-document', [DocumentController::class, 'destroy'])->name('umkm.destroy-document');
        Route::post('/update-status-document', [DocumentController::class, 'updateStatus'])->name('update-status-document');
    });

    Route::prefix('admin/home')->name('admin.')->middleware('ensureAdminRole:2')->group(function () {
        //update
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/data-umkm', [AdminUmkmController::class, 'index'])->name('umkm.data-umkm');
        Route::post('/edit-data-umkm', [AdminUmkmController::class, 'edit'])->name('umkm.editDataUmkm');
        Route::post('/update-data-umkm', [AdminUmkmController::class, 'update'])->name('umkm.updateDataUmkm');
        Route::post('/hapus-data-umkm', [AdminUmkmController::class, 'destroy'])->name('umkm.hapusDataUmkm');
        Route::get('/data-berkas', [AdminDocumentController::class, 'index'])->name('umkm.index-document');
        Route::get('/download-tempat/{id}', [AdminDocumentController::class, 'downloadTempat'])->name('umkm.download_tempat');
        Route::get('/download-kk/{id}', [AdminDocumentController::class, 'downloadKk'])->name('umkm.download_kk');
        Route::get('/download-ktp/{id}', [AdminDocumentController::class, 'downloadKtp'])->name('umkm.download_ktp');
        Route::get('/download-nib/{id}', [AdminDocumentController::class, 'downloadNib'])->name('umkm.download_nib');
        Route::post('/edit-document', [AdminDocumentController::class, 'edit'])->name('umkm.edit-document');
        Route::post('/update-document', [AdminDocumentController::class, 'update'])->name('umkm.update-document');
        Route::post('/hapus-document', [AdminDocumentController::class, 'destroy'])->name('umkm.destroy-document');
        Route::post('/update-status', [AdminUmkmController::class, 'updateStatus'])->name('umkm.update-status');
        Route::post('/update-status-document', [AdminDocumentController::class, 'updateStatus'])->name('umkm.update-status-document');
        Route::resource('aspek', AspekController::class)->names('seleksi.aspek')->except(['show']);
        Route::resource('kriteria', KriteriaController::class)->names('seleksi.kriteria')->parameters(['kriteria' => 'kriteria'])->except(['show']);
        Route::resource('subkriteria', SubkriteriaController::class)->names('seleksi.subkriteria')->parameters(['subkriteria' => 'subkriteria'])->except(['show']);
        Route::resource('alternatif', AlternatifController::class)->names('seleksi.alternatif')->except(['show']);
        Route::post('/get-umkm', [AlternatifController::class, 'get_umkm'])->name('seleksi.alternatif.get-umkm');
        Route::post('/get-alternatif', [AlternatifController::class, 'get_alternatif'])->name('seleksi.alternatif.get-alternatif');
        Route::resource('penilaian', PenilaianController::class)->names('seleksi.penilaian');
        Route::resource('hasil', HasilController::class)->names('seleksi.hasil')->only(['index']);
        Route::resource('rangking', RangkingController::class)->names('seleksi.rangking')->only(['index']);
        Route::get('/rangking/pdf', [RangkingController::class, 'pdf'])->name('seleksi.rangking.pdf');


        //Admin Management
        Route::get('/admin_manage', [AdminUmkmController::class, 'manage_admin'])->name('umkm.manage_admin');
        Route::post('tambah/admin_manage', [AdminUmkmController::class, 'tambah_admin'])->name('umkm.tambah_admin');
        Route::post('edit/admin_manage', [AdminUmkmController::class, 'edit_admin'])->name('umkm.edit_admin');
        Route::post('hapus/admin_manage', [AdminUmkmController::class, 'hapus_admin'])->name('umkm.hapus_admin');

        //Admin Profile
        Route::get('/admin_profile', [AdminUmkmController::class, 'profile_admin'])->name('umkm.profile_admin');
        Route::post('upload-photo/admin_profile', [AdminUmkmController::class, 'upload_foto'])->name('umkm.upload_foto');
        Route::post('edit/admin_profile', [AdminUmkmController::class, 'edit_nama_admin'])->name('umkm.edit_nama_admin');

        //pemetaan umkm
        Route::get('/umkm_pemetaan', [AdminUmkmController::class, 'pemetaan_umkm'])->name('umkm.pemetaan_umkm');
        Route::get('/umkm_visualisasi', [AdminUmkmController::class, 'visualisasi_umkm'])->name('umkm.visualisasi_umkm');
        Route::get('/generate_pdf', [AdminUmkmController::class, 'pdf_download'])->name('umkm.pdf_download');
        Route::get('/search', 'PemetaanController@search');
    });
});

require __DIR__ . '/auth.php';

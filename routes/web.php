    <?php

    use App\Http\Controllers\BarangController;
    use App\Http\Controllers\BarangKeluarController;
    use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangOutController;
use App\Http\Controllers\BarangRusakController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengajuanKonfirmasi;
use App\Http\Controllers\PengajuanKonfirmasiController;
use App\Http\Controllers\ProfileSekolahController;
    use App\Http\Controllers\RuangController;
    use App\Http\Controllers\SumberController;
use App\Http\Controllers\UserController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\BarangRusak;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
        return view('adminlte::auth.login');
    });

        // Route::get('admin/barang', [BarangController::class, 'index'])->name('barang.index');
        // Route::get('admin/sumber', [SumberController::class, 'index'])->name('sumber.index');
        // Route::get('admin/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
        // Route::get('admin/barang-keluar', [BarangController::class, 'index'])->name('barang-keluar.index');
        // Route::get('admin/ruang', [RuangController::class, 'index'])->name('ruang.index');
        // Route::get('admin/ruang/create', [RuangController::class, 'create'])->name('ruang.create');
        // Route::post('admin/ruang/store', [RuangController::class, 'store'])->name('ruang.store');
        // Route::post('admin/ruang/hapus', [RuangController::class, 'store'])->name('ruang.destroy');

        Route::resource('admin/barang', BarangController::class)->middleware('auth');
        Route::resource('admin/barang-keluar', BarangKeluarController::class)->middleware('auth');
        Route::resource('admin/profile-sekolah', ProfileSekolahController::class)->middleware('checkRole:admin');
        Route::resource('admin/pengajuan', PengajuanController::class)->middleware('auth');
        Route::resource('admin/barang-rusak', BarangRusakController::class)->middleware('auth');
        Route::resource('admin/barang-out', BarangOutController::class)->middleware('auth');
        Route::resource('admin/user', UserController::class)->middleware('auth');
        Route::resource('admin/pengajuan-konfirmasi', PengajuanKonfirmasiController::class)->middleware('auth');
        
        // Route::get('laporan/', [LaporanController::class, 'laporan']);

        Route::get('/admin/gabolehmasuk', function () {
            return view('admin.gabolehmasuk'); });


Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
Route::get('petugas', function () { return view('petugas'); })->middleware(['checkRole:petugas,admin']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'dashboard'])->middleware('auth');




// Route::get('/pdf', [UserController::class, 'exportPDF']);
// Route::get('/pdf', [BarangController::class, 'exportPDF'])->middleware(['checkRole:petugas,admin']);

// Laporan
Route::get('/admin/laporan/laporanbmpdf', [App\Http\Controllers\LaporanController::class, 'laporanbmpdf'])->middleware('auth');
Route::get('/admin/laporan/laporanbkpdf', [App\Http\Controllers\LaporanController::class, 'laporanbkpdf'])->middleware('auth');
Route::get('/admin/laporan/laporanbppdf', [App\Http\Controllers\LaporanController::class, 'laporanbppdf'])->middleware('auth');
Route::get('/admin/laporan/laporanbrpdf', [App\Http\Controllers\LaporanController::class, 'laporanbrpdf'])->middleware('auth');
Route::get('/admin/laporan/laporanbjpdf', [App\Http\Controllers\LaporanController::class, 'laporanbjpdf'])->middleware('auth');
Route::get('/admin/laporan/laporanperruang', [App\Http\Controllers\LaporanController::class, 'laporanperruang'])->middleware('auth');

Route::get('/admin/pengajuanshow/index', [App\Http\Controllers\PengajuanKonfirmasiController::class, 'pengajuanshow'])->middleware('auth');



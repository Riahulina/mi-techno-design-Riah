<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DivisionMemberController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgjaController;
/*
|--------------------------------------------------------------------------
| Halaman Utama HMPS (bebas diakses)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('Home');
})->name('Home');

/*
|--------------------------------------------------------------------------
| Halaman Umum HMPS
|--------------------------------------------------------------------------
*/
Route::get('/about', [AboutController::class, 'index'])->name('about');

/*
|--------------------------------------------------------------------------
| Struktur Organisasi CRUD
|--------------------------------------------------------------------------
*/
Route::resource('structures', StructureController::class);

/*
|--------------------------------------------------------------------------
| Blog CRUD (hanya admin)
|--------------------------------------------------------------------------
*/

Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/kategori/{kategori}', [BlogController::class, 'byKategori'])->name('blogs.byKategori');

/*
| Halaman blog umum yang bisa dilihat semua user (read only)
*/
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/kategori/{kategori}', [BlogController::class, 'byKategori'])->name('blogs.byKategori');

/*
|--------------------------------------------------------------------------
| Divisions CRUD
|--------------------------------------------------------------------------
*/
Route::resource('divisions', DivisionController::class);

use App\Http\Controllers\AnggotaController;

// Tabel anggota di Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');

// Fitur anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/about/manage-anggota', [AnggotaController::class, 'manage'])->name('anggota.manage')->middleware('auth');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store')->middleware('auth');
Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update')->middleware('auth');
Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy')->middleware('auth');
Route::resource('anggotas', AnggotaController::class)->middleware('auth');


/*
|--------------------------------------------------------------------------
| Division Members (Nested, hanya admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('divisions/{division}')->group(function () {
        Route::get('members/create', [DivisionMemberController::class, 'create'])->name('division_members.create');
        Route::post('members', [DivisionMemberController::class, 'store'])->name('division_members.store');
        Route::get('members/{member}/edit', [DivisionMemberController::class, 'edit'])->name('division_members.edit');
        Route::put('members/{member}', [DivisionMemberController::class, 'update'])->name('division_members.update');
        Route::delete('members/{member}', [DivisionMemberController::class, 'destroy'])->name('division_members.destroy');
    });
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Dashboard & Profile
|--------------------------------------------------------------------------
*/Route::middleware(['auth'])->group(function () {
    // Dashboard hanya untuk admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('isAdmin')
        ->name('dashboard');

    // Profile (semua user bisa)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin-only routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', UserController::class);
    
});
use App\Http\Middleware\IsAdmin;

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
});


/*
|--------------------------------------------------------------------------
| Redirect /users untuk user biasa
|--------------------------------------------------------------------------
*/
Route::get('/users', function () {
    return redirect()->route('Home');
});



Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', UserController::class);
});


// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });


// Route::middleware([IsAdmin::class])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

use App\Http\Controllers\InsightController;

// 🟢 Halaman Insight — publik, semua orang bisa akses
Route::get('/insight', [InsightController::class, 'index'])->name('insight.index');

// 🟡 Kirim penilaian — cuma bisa kalau login
Route::middleware('auth')->group(function () {
    Route::post('/insight/{progja}/rate', [InsightController::class, 'rate'])->name('insight.rate');
});


// 🔴 CRUD Progja — cuma buat admin
app('router')->aliasMiddleware('isAdmin', \App\Http\Middleware\IsAdmin::class);

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('progjas', ProgjaController::class);
});
Route::get('/progjas', [ProgjaController::class, 'index'])->name('progjas.index');

/*
|--------------------------------------------------------------------------
| Route Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

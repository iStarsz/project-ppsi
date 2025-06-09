<?php

// routes/web.php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/public/object-detail/tmp', function () {
    return view('public.object_detail_tmp');
});



// Admin Route
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AoqrObjectController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SuperAdminManageAdminController;
use App\Http\Middleware\AdminAuthenticate;

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin dashboard dengan middleware auth
Route::prefix('admin')->name('admin.')->middleware(AdminAuthenticate::class)->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // CRUD Admin by Super Admin
    Route::get('manage-admins', [SuperAdminManageAdminController::class, 'index'])->name('manage-admins.index');
    Route::get('manage-admins/create', [SuperAdminManageAdminController::class, 'create'])->name('manage-admins.create');
    Route::post('manage-admins', [SuperAdminManageAdminController::class, 'store'])->name('manage-admins.store');
    Route::get('manage-admins/{id}/edit', [SuperAdminManageAdminController::class, 'edit'])->name('manage-admins.edit');
    Route::put('manage-admins/{id}', [SuperAdminManageAdminController::class, 'update'])->name('manage-admins.update');
    Route::delete('manage-admins/{id}', [SuperAdminManageAdminController::class, 'destroy'])->name('manage-admins.destroy');

    // CRUD Category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Perbaiki sini
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // CRUD AoqrObject
    Route::get('aoqr_objects', [AoqrObjectController::class, 'index'])->name('aoqr_objects.index');
    Route::get('aoqr_objects/create', [AoqrObjectController::class, 'create'])->name('aoqr_objects.create');
    Route::post('aoqr_objects', [AoqrObjectController::class, 'store'])->name('aoqr_objects.store');
    Route::get('aoqr_objects/{id}/edit', [AoqrObjectController::class, 'edit'])->name('aoqr_objects.edit');
    Route::put('aoqr_objects/{id}', [AoqrObjectController::class, 'update'])->name('aoqr_objects.update');
    Route::delete('aoqr_objects/{id}', [AoqrObjectController::class, 'destroy'])->name('aoqr_objects.destroy');
    Route::get('aoqr_objects/{id}', [AoqrObjectController::class, 'show'])->name('aoqr_objects.show');
    // Route untuk halaman QR Code (tampilan)
    Route::get('aoqr_objects/{id}/qrcode', [AoqrObjectController::class, 'viewQrCode'])->name('aoqr_objects.view_qrcode');
    // Route untuk generate QR Code
    Route::get('aoqr_objects/{id}/generate_qrcode', [AoqrObjectController::class, 'generateQrCode'])->name('aoqr_objects.generate_qrcode');
});


// Public Route
use App\Http\Controllers\Public\PublicObjectController;

// Route untuk menampilkan detail objek berdasarkan ID
Route::get('/object/{id}', [PublicObjectController::class, 'show'])->name('object.show');


// Route untuk halaman error saat objek tidak ditemukan
Route::get('/object/object-not-found', function () {
    return view('public.object_not_found');
})->name('object.not_found');

<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users');
Route::get('/expenses', [App\Http\Controllers\ExpenseController::class, 'index'])->middleware(['auth', 'verified'])->name('expenses');
Route::get('/settings', [App\Http\Controllers\UserSettingController::class, 'index'])->middleware(['auth', 'verified'])->name('settings');
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'getRoles'])->middleware(['auth', 'verified'])->name('roles');
Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'getPermissions'])->middleware(['auth', 'verified'])->name('permissions');
Route::get('/category', [App\Http\Controllers\ExpenseCategoryController::class, 'getCategory'])->middleware(['auth', 'verified'])->name('category');

Route::post('/role/new', [App\Http\Controllers\RoleController::class, 'newRole'])->middleware(['auth', 'verified'])->name('role.new');
Route::post('/permission/new', [App\Http\Controllers\PermissionController::class, 'newRermission'])->middleware(['auth', 'verified'])->name('permission.new');
Route::post('/category/new', [App\Http\Controllers\ExpenseCategoryController::class, 'newCategory'])->middleware(['auth', 'verified'])->name('category.new');

require __DIR__.'/auth.php';

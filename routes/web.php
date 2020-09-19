<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin home
Route::get('/dashboard/admin', 
[App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');

// Roles
Route::get('/dashboard/admin/roles', [App\Http\Controllers\Admin\AdminRolesController::class, 'index'])->name('admin.roles.index');
Route::post('/dashboard/admin/roles', [App\Http\Controllers\Admin\AdminRolesController::class, 'store'])->name('admin.roles.store');
Route::get('/dashboard/admin/roles/create', [App\Http\Controllers\Admin\AdminRolesController::class, 'create'])->name('admin.roles.create');
Route::get('/dashboard/admin/roles/{role}', [App\Http\Controllers\Admin\AdminRolesController::class, 'show'])->name('admin.roles.show');
Route::get('/dashboard/admin/roles/{role}/edit', [App\Http\Controllers\Admin\AdminRolesController::class, 'edit'])->name('admin.roles.edit');
Route::put('/dashboard/admin/roles/{role}', [App\Http\Controllers\Admin\AdminRolesController::class, 'update'])->name('admin.roles.update');
Route::delete('/dashboard/admin/roles/{role}', [App\Http\Controllers\Admin\AdminRolesController::class, 'destroy'])->name('admin.roles.destroy');

// Permissions
Route::get('/dashboard/admin/permissions', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'index'])->name('admin.permissions.index');
Route::post('/dashboard/admin/permissions', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'store'])->name('admin.permissions.store');
Route::get('/dashboard/admin/permissions/create', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'create'])->name('admin.permissions.create');
Route::get('/dashboard/admin/permissions/{permission}', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'show'])->name('admin.permissions.show');
Route::get('/dashboard/admin/permissions/{permission}/edit', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'edit'])->name('admin.permissions.edit');
Route::put('/dashboard/admin/permissions/{permission}', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'update'])->name('admin.permissions.update');
Route::delete('/dashboard/admin/permissions/{permission}', [App\Http\Controllers\Admin\AdminPermissionsController::class, 'destroy'])->name('admin.permissions.destroy');

// Admin Users
Route::get('/dashboard/admin/users', [App\Http\Controllers\Admin\AdminUsersController::class, 'index'])->name('admin.users.index');
Route::post('/dashboard/admin/users', [App\Http\Controllers\Admin\AdminUsersController::class, 'store'])->name('admin.users.store');
Route::get('/dashboard/admin/users/create', [App\Http\Controllers\Admin\AdminUsersController::class, 'create'])->name('admin.users.create');
Route::get('/dashboard/admin/users/{user}', [App\Http\Controllers\Admin\AdminUsersController::class, 'show'])->name('admin.users.show');
Route::get('/dashboard/admin/users/{user}/edit', [App\Http\Controllers\Admin\AdminUsersController::class, 'edit'])->name('admin.users.edit');
Route::put('/dashboard/admin/users/{user}', [App\Http\Controllers\Admin\AdminUsersController::class, 'update'])->name('admin.users.update');
Route::delete('/dashboard/admin/users/{user}', [App\Http\Controllers\Admin\AdminUsersController::class, 'destroy'])->name('admin.users.destroy');


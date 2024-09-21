<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/admin/home", [DashboardController::class, "index"])->name('admin.home');
Route::get("/admin/career", [DashboardController::class, "getCareer"])->name('admin.career');
Route::get("/admin/job", [DashboardController::class, "getJob"])->name('admin.job');
Route::get("/admin/user", [DashboardController::class, "getUser"])->name('admin.user');
Route::get("/admin/employer", [DashboardController::class, "getEmployer"])->name('admin.employer');
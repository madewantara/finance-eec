<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindivDashboardController;
use App\Http\Controllers\FindivProfileController;
use App\Http\Controllers\FindivAccountController;
use App\Http\Controllers\FindivCashController;
use App\Http\Controllers\FindivOperationalController;
use App\Http\Controllers\FindivEscrowController;
use App\Http\Controllers\FindivProjectController;
use App\Http\Controllers\FindivReportController;
use App\Http\Controllers\FindirDashboardController;
use App\Http\Controllers\FindirProfileController;
use App\Http\Controllers\FindirAccountController;
use App\Http\Controllers\FindirCashController;
use App\Http\Controllers\FindirOperationalController;
use App\Http\Controllers\FindirEscrowController;
use App\Http\Controllers\FindirProjectController;
use App\Http\Controllers\FindirReportController;

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
})->name('dashboard');

Route::group([
    'middleware' => 'finance.division',
    'prefix' => 'finance-division',
], function ($router) {
    Route::get('/dashboard', [App\Http\Controllers\FindivDashboardController::class, 'index'])->name('findiv.dashboard');

    //Account Menu
    Route::get('/account', [App\Http\Controllers\FindivAccountController::class, 'index'])->name('findiv.account-index');
    Route::get('/account/create', [App\Http\Controllers\FindivAccountController::class, 'create'])->name('findiv.account-create');
    Route::post('/account/post', [App\Http\Controllers\FindivAccountController::class, 'store'])->name('findiv.account-post');
    Route::get('/account/edit/{uuid}', [App\Http\Controllers\FindivAccountController::class, 'edit'])->name('findiv.account-edit');
    Route::post('/account/update/{uuid}', [App\Http\Controllers\FindivAccountController::class, 'update'])->name('findiv.account-update');
    Route::get('/account/export', [App\Http\Controllers\FindivAccountController::class, 'export'])->name('findiv.account-export');
    
    //Cash Menu
    Route::get('/cash', [App\Http\Controllers\FindivCashController::class, 'index'])->name('findiv.cash-index');
    Route::get('/cash/create', [App\Http\Controllers\FindivCashController::class, 'create'])->name('findiv.cash-create');
    Route::post('/cash/post', [App\Http\Controllers\FindivCashController::class, 'store'])->name('findiv.cash-post');
    Route::get('/cash/{uuid}', [App\Http\Controllers\FindivCashController::class, 'show'])->name('findiv.cash-detail');
    Route::get('/cash/edit/{uuid}', [App\Http\Controllers\FindivCashController::class, 'edit'])->name('findiv.cash-edit');
    Route::post('/cash/update/{uuid}', [App\Http\Controllers\FindivCashController::class, 'update'])->name('findiv.cash-update');
    Route::post('/cash/export', [App\Http\Controllers\FindivCashController::class, 'export'])->name('findiv.cash-export');
    Route::post('/cash/export/{uuid}', [App\Http\Controllers\FindivCashController::class, 'exportDetail'])->name('findiv.cash-detail-export');

    //Mandiri Operational Menu
    Route::get('/mandiri-operational', [App\Http\Controllers\FindivOperationalController::class, 'index'])->name('findiv.operational-index');
    Route::get('/mandiri-operational/create', [App\Http\Controllers\FindivOperationalController::class, 'create'])->name('findiv.operational-create');
    Route::post('/mandiri-operational/post', [App\Http\Controllers\FindivOperationalController::class, 'store'])->name('findiv.operational-post');
    Route::get('/mandiri-operational/{uuid}', [App\Http\Controllers\FindivOperationalController::class, 'show'])->name('findiv.operational-detail');
    Route::get('/mandiri-operational/edit/{uuid}', [App\Http\Controllers\FindivOperationalController::class, 'edit'])->name('findiv.operational-edit');
    Route::post('/mandiri-operational/update/{uuid}', [App\Http\Controllers\FindivOperationalController::class, 'update'])->name('findiv.operational-update');
    Route::post('/mandiri-operational/export', [App\Http\Controllers\FindivOperationalController::class, 'export'])->name('findiv.operational-export');
    Route::post('/mandiri-operational/export/{uuid}', [App\Http\Controllers\FindivOperationalController::class, 'exportDetail'])->name('findiv.operational-detail-export');

    //Mandiri Escrow Menu
    Route::get('/mandiri-escrow', [App\Http\Controllers\FindivEscrowController::class, 'index'])->name('findiv.escrow-index');
    Route::get('/mandiri-escrow/create', [App\Http\Controllers\FindivEscrowController::class, 'create'])->name('findiv.escrow-create');
    Route::post('/mandiri-escrow/post', [App\Http\Controllers\FindivEscrowController::class, 'store'])->name('findiv.escrow-post');
    Route::get('/mandiri-escrow/{uuid}', [App\Http\Controllers\FindivEscrowController::class, 'show'])->name('findiv.escrow-detail');
    Route::get('/mandiri-escrow/edit/{uuid}', [App\Http\Controllers\FindivEscrowController::class, 'edit'])->name('findiv.escrow-edit');
    Route::post('/mandiri-escrow/update/{uuid}', [App\Http\Controllers\FindivEscrowController::class, 'update'])->name('findiv.escrow-update');
    Route::post('/mandiri-escrow/export', [App\Http\Controllers\FindivEscrowController::class, 'export'])->name('findiv.escrow-export');
    Route::post('/mandiri-escrow/export/{uuid}', [App\Http\Controllers\FindivEscrowController::class, 'exportDetail'])->name('findiv.escrow-detail-export');
    
    //Project Menu
    Route::get('/project', [App\Http\Controllers\FindivProjectController::class, 'index'])->name('findiv.project-index');
    Route::get('/project/{uuid}', [App\Http\Controllers\FindivProjectController::class, 'show'])->name('findiv.project-detail');
    
    //Report
    Route::get('/report', [App\Http\Controllers\FindivReportController::class, 'index'])->name('findiv.report-index');
    Route::get('/report/{uuid}', [App\Http\Controllers\FindivReportController::class, 'show'])->name('findiv.report-detail');
    Route::post('/report/export/{uuid}', [App\Http\Controllers\FindivReportController::class, 'export'])->name('findiv.report-export');
    
    //Profile
    Route::get('/profile', [App\Http\Controllers\FindivProfileController::class, 'index'])->name('findiv.profile');
});

Route::group([
    'middleware' => 'finance.director',
    'prefix' => 'finance-director',
], function ($router) {
    Route::get('/dashboard', [App\Http\Controllers\FindirDashboardController::class, 'index'])->name('findir.dashboard');

    //Account Menu
    Route::get('/account', [App\Http\Controllers\FindirAccountController::class, 'index'])->name('findir.account-index');
    Route::get('/account/export', [App\Http\Controllers\FindirAccountController::class, 'export'])->name('findir.account-export');
    
    //Cash Menu
    Route::get('/cash', [App\Http\Controllers\FindirCashController::class, 'index'])->name('findir.cash-index');
    Route::get('/cash/{uuid}', [App\Http\Controllers\FindirCashController::class, 'show'])->name('findir.cash-detail');
    Route::post('/cash/export', [App\Http\Controllers\FindirCashController::class, 'export'])->name('findir.cash-export');
    Route::post('/cash/export/{uuid}', [App\Http\Controllers\FindirCashController::class, 'exportDetail'])->name('findir.cash-detail-export');

    //Mandiri Operational Menu
    Route::get('/mandiri-operational', [App\Http\Controllers\FindirOperationalController::class, 'index'])->name('findir.operational-index');
    Route::get('/mandiri-operational/{uuid}', [App\Http\Controllers\FindirOperationalController::class, 'show'])->name('findir.operational-detail');
    Route::post('/mandiri-operational/export', [App\Http\Controllers\FindirOperationalController::class, 'export'])->name('findir.operational-export');
    Route::post('/mandiri-operational/export/{uuid}', [App\Http\Controllers\FindirOperationalController::class, 'exportDetail'])->name('findir.operational-detail-export');

    //Mandiri Escrow Menu
    Route::get('/mandiri-escrow', [App\Http\Controllers\FindirEscrowController::class, 'index'])->name('findir.escrow-index');
    Route::get('/mandiri-escrow/{uuid}', [App\Http\Controllers\FindirEscrowController::class, 'show'])->name('findir.escrow-detail');
    Route::post('/mandiri-escrow/export', [App\Http\Controllers\FindirEscrowController::class, 'export'])->name('findir.escrow-export');
    Route::post('/mandiri-escrow/export/{uuid}', [App\Http\Controllers\FindirEscrowController::class, 'exportDetail'])->name('findir.escrow-detail-export');
    
    //Project Menu
    Route::get('/project', [App\Http\Controllers\FindirProjectController::class, 'index'])->name('findir.project-index');
    Route::get('/project/{uuid}', [App\Http\Controllers\FindirProjectController::class, 'show'])->name('findir.project-detail');
    
    //Report
    Route::get('/report', [App\Http\Controllers\FindirReportController::class, 'index'])->name('findir.report-index');
    Route::get('/report/{uuid}', [App\Http\Controllers\FindirReportController::class, 'show'])->name('findir.report-detail');
    Route::post('/report/export/{uuid}', [App\Http\Controllers\FindirReportController::class, 'export'])->name('findir.report-export');
    
    //Profile
    Route::get('/profile', [App\Http\Controllers\FindirProfileController::class, 'index'])->name('findir.profile');
});

require __DIR__.'/auth.php';
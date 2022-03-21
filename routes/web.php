<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindivDashboardController;
use App\Http\Controllers\FindivAccountController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group([
    'middleware' => ['finance.division'],
    'prefix' => 'finance-division'
], function ($router) {
    Route::get('/dashboard', [App\Http\Controllers\FindivDashboardController::class, 'index'])->name('findiv.dashboard');

    //Account Menu
    Route::get('/account', [App\Http\Controllers\FindivAccountController::class, 'index'])->name('findiv.account-index');
    Route::get('/account/create', [App\Http\Controllers\FindivAccountController::class, 'create'])->name('findiv.account-create');
    Route::post('/account/post', [App\Http\Controllers\FindivAccountController::class, 'store'])->name('findiv.account-post');
    Route::get('/account/edit/{uuid}', [App\Http\Controllers\FindivAccountController::class, 'edit'])->name('findiv.account-edit');
    Route::post('/account/update/{uuid}', [App\Http\Controllers\FindivAccountController::class, 'update'])->name('findiv.account-update');
    Route::delete('/account/update/{uuid}', [App\Http\Controllers\FindivAccountController::class, 'destroy'])->name('findiv.account-destroy');
    Route::get('/account/export', [App\Http\Controllers\FindivAccountController::class, 'export'])->name('findiv.account-export');

    //Project Menu
    Route::get('/project', [App\Http\Controllers\FindivProjectController::class, 'index'])->name('findiv.project-index');
    Route::get('/project/{uuid}', [App\Http\Controllers\FindivProjectController::class, 'show'])->name('findiv.project-detail');

    //Profile
    Route::get('/profile', [App\Http\Controllers\FindivProfileController::class, 'index'])->name('findiv.profile');
});

require __DIR__.'/auth.php';
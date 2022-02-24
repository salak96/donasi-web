<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
Route::group(['middleware' => 'auth'], function() {

        //route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    });
});

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    if ($redirectDashboardRoute = config('voyager.custom.dashboard.redirect_route')) {
        Route::get('/', ['uses' => function (Request $request) use ($redirectDashboardRoute) {
            return Redirect::route($redirectDashboardRoute);
        }, 'as' => 'voyager.dashboard']);
    }
});

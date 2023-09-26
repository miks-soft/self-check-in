<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum', 'locale']], function () {
    Route::group(['prefix' => 'localization', ], function (){
        Route::get('/locales', [\App\Http\Controllers\Api\LocalizationController::class, 'locales']);
        Route::get('/texts', [\App\Http\Controllers\Api\LocalizationController::class, 'texts']);
    });

    Route::group(['prefix' => 'rooms', ], function (){
        Route::get('/find', [\App\Http\Controllers\Api\BookingController::class, 'rooms']);
    });

    Route::group(['prefix' => 'paysystems', ], function (){
        Route::get('/', [\App\Http\Controllers\Api\BookingController::class, 'paysystems']);
    });

    Route::group(['prefix' => 'booking', ], function (){
        Route::put('/', [\App\Http\Controllers\Api\BookingController::class, 'putBooking']);

        Route::group(['prefix' => 'payment', ], function (){
            Route::get('/status', [\App\Http\Controllers\Api\BookingController::class, 'paymentStatus']);
        });

        Route::group(['prefix' => 'print', ], function (){
            Route::post('/', [\App\Http\Controllers\Api\BookingController::class, 'print']);
            Route::get('/status', [\App\Http\Controllers\Api\BookingController::class, 'printStatus']);
        });

        Route::group(['prefix' => 'cancel', ], function (){
            Route::post('/', [\App\Http\Controllers\Api\BookingController::class, 'annulateBooking']);
        });
    });
});

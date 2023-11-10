<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\SeatController;
use \App\Http\Controllers\Api\BookingController;
use \App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
 * User Login
 */
Route::controller(UserController::class)->group(function () {
    Route::post('/login', [UserController::class,'login']);
});


/*
* List All Available Seats
*/
    Route::get('/available-seats', [SeatController::class,'availableSeats']);
/*
* User Booking Available Seats
*/
    Route::post('/booking', [BookingController::class,'booking']);


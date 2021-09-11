<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RestaurantController;

Route::get('/', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/reservations', function () {
    return view('admin.reservations');
})->name('view.reservations');

Route::post('/client/create', [ClientController::class, 'create'])->name('create.client');
Route::get('/getClients', [ClientController::class, 'getAll']);
Route::get('/getClientsList', [ClientController::class, 'getClients'])->name('get.clients');

Route::get('/getReservations', [ReservationController::class, 'getAll'])->name('get.reservations');

Route::get('/getRestList', [RestaurantController::class, 'getRestaurants'])->name('get.rest');
Route::get('/getSectionsList', [RestaurantController::class, 'getSections'])->name('get.sections');
Route::get('/getTablesList/{rest}/{section}', [RestaurantController::class, 'getTables'])->name('get.tables');
Route::post('/reservation/create', [ReservationController::class, 'create'])->name('create.reservation');
Route::patch('/reservation/update', [ReservationController::class, 'update'])->name('update.reservation');

Route::get('/getReservation/{id}', [ReservationController::class, 'show'])->name('get.reservartion.byId');
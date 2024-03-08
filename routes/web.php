<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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

Route::get("/", function() {
    return view("home");
})->name("home")->middleware('checkRole');

// user routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [EventController::class,'showEvent'])->name('userdash');
        Route::get('/readEventUser/{id}',[EventController::class,'showForUser'])->name('readEventUser');
        Route::post('/reserve/{id}',[ReservationController::class,'reserve'])->name('reserve');
        Route::get('/ticket/{id}',[ReservationController::class,'ticket'])->name('ticket');
        Route::get('/search', [EventController::class, 'search'])->name('search');
        Route::get('/filtrer', [EventController::class, 'filterByCategory'])->name('filtrer');
    });
});

// organizator routes

Route::middleware(['auth'])->group(function () {
    Route::prefix('organizator')->name('organizator.')->group(function () {
        Route::get('/organdashboard',[EventController::class, 'index'])->name('organdashboard');

        Route::get('/createvent',[EventController::class,'create'])->name('createvent');
        Route::post('/storevent',[EventController::class,'store'])->name('storevent');
        Route::get('/readevente/{id}',[EventController::class,'show'])->name('readevent');
        Route::delete('/eventdestroy/{id}',[EventController::class,'destroy'])->name('eventdestroy');
        Route::get('/editevent/{id}',[EventController::class,'edit'])->name('editevent');
        Route::put('/updatevent/{id}',[EventController::class,'update'])->name('updatevent');
        Route::get('/Reservation',[ReservationController::class,'Reservation'])->name('Reservation');
        Route::patch('/confirmReservation/{id}',[ReservationController::class,'confirmReservation'])->name('confirmReservation');

    });
});



// admin routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/admindashboard',[AdminController::class,'index'])->name('admindashboard');
        Route::patch('/toggleAccess/{user}',[AdminController::class,'toggleAccess'])->name('toggleAccess');
        Route::get('/categories',[CategoryController::class,'index'])->name('categories');
// event read more
        Route::get('/events',[AdminController::class,'events'])->name('events');
        Route::patch('/validatevent/{event}',[AdminController::class,'validateEvent'])->name('validateEvent');

        Route::post('/storecat',[CategoryController::class,'store'])->name('storecat');
        Route::delete('/destroycat/{id}',[CategoryController::class,'destroy'])->name('destroycat');

    });
});



require __DIR__ . '/auth.php';

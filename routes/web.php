<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BassController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
use App\Models\book;
use App\Models\Schedule as ModelsSchedule;
use Illuminate\Console\Scheduling\Schedule;
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

Route::get('/',[AdminController::class,'welcome']);
Route::post('/store',[AdminController::class,'store'])->name("booking.create");
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/create', [AdminController::class, 'index'])->name("login.create");


    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/create', [BassController::class, 'bass']);
    Route::get('/bass/delete/{id}', [BassController::class, 'delete_data'])->name("bass.delete");
    Route::post('/bass/create', [BassController::class, 'store'])->name("bass.create");
    Route::get('/trip/create', [TripController::class, 'trip']);
    Route::post('/trip', [TripController::class, 'store'])->name("trip.create");
    Route::get('/trip/delete/{id}', [TripController::class, 'delete_data'])->name("trip.delete");
    Route::get('/schedule/create', [ScheduleController::class, 'schedule']);
    Route::post('/schedule', [ScheduleController::class, 'store'])->name("schedule.create");
    Route::get('/schedule/delete/{id}', [ScheduleController::class, 'delete_data'])->name("schedule.delete");
    Route::get('/seat/create', [TicketController::class, 'seat']);
    Route::post('/seat', [TicketController::class, 'store'])->name("seat.create");
    Route::get('/seat/delete/{id}', [TicketController::class, 'delete_data'])->name("seat.delete");
    Route::get('/booking/create', [BookController::class, 'booking']);
    Route::post('/booking', [BookController::class, 'store'])->name("booking.create");
    Route::get('/booking/delete/{id}', [BookController::class, 'delete_data'])->name("booking.delete");



});

// Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $book=book::all();
        return view('dashboard',compact('book'));
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Route::post('/booking', [ProfileController::class, 'booking'])->name('profile.booking');

    });

    require __DIR__.'/auth.php';
// });


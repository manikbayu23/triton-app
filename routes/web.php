<?php

use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\VariationController;
use App\Models\Variation;

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

// Home Page

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program{id}', [HomeController::class, 'show'])->name('program.show');
Route::post('/booking', [HomeController::class, 'booking'])->name('booking');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');
Route::get('/tentor/{id}', [HomeController::class, 'tentor'])->name('tentor');
Route::get('/vision-mission', [HomeController::class, 'vision'])->name('vision-mission');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // bookings admin
    Route::prefix('bookings')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::put('/confirmation-booking/{id}', [BookingController::class, 'confirmation'])->name('confirmation');
        Route::get('/{id}/detail-booking', [BookingController::class, 'show'])->name('show');
    });

    // level admin
    Route::prefix('levels')->name('level.')->group(function () {
        Route::get('/', [LevelController::class, 'index'])->name('index');
        Route::post('/add-level', [LevelController::class, 'store'])->name('store');
        Route::post('/update-level/{id}', [LevelController::class, 'update'])->name('update');
        Route::get('/delete-level/{id}', [LevelController::class, 'destroy'])->name('destroy');
    });

    // rooms admin
    Route::prefix('rooms')->name('room.')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::post('/add-room', [RoomController::class, 'store'])->name('store');
        Route::post('/update-room/{id}', [RoomController::class, 'update'])->name('update');
        Route::get('/delete-room/{id}', [RoomController::class, 'destroy'])->name('destroy');
    });

    // times admin
    Route::prefix('times')->name('time.')->group(function () {
        Route::get('/', [TimeController::class, 'index'])->name('index');
        Route::post('/add-time', [TimeController::class, 'store'])->name('store');
        Route::post('/update-time/{id}', [TimeController::class, 'update'])->name('update');
        Route::get('/delete-time/{id}', [TimeController::class, 'destroy'])->name('destroy');
    });

    // program admin
    Route::prefix('list_program')->name('list_program.')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('index');
        Route::get('/create-program', [ProgramController::class, 'create'])->name('create');
        Route::post('/add-program', [ProgramController::class, 'store'])->name('store');
        Route::get('/edit-program/{id}', [ProgramController::class, 'edit'])->name('edit');
        Route::post('/update-program/{id}', [ProgramController::class, 'update'])->name('update');
        Route::get('/delete-program/{id}', [ProgramController::class, 'destroy'])->name('destroy');
    });

    // variation admin
    Route::prefix('variations')->name('variation.')->group(function () {
        Route::get('/{id}', [VariationController::class, 'index'])->name('index');
        // Route::get('/create-program', [ProgramController::class, 'create'])->name('create');
        // Route::post('/add-program', [ProgramController::class, 'store'])->name('store');
        // Route::get('/edit-program/{id}', [ProgramController::class, 'edit'])->name('edit');
        // // Route::post('/update-level/{id}', [LevelController::class, 'update'])->name('update');
        // Route::get('/delete-program/{id}', [ProgramController::class, 'destroy'])->name('destroy');
    });

    // teacher admin
    Route::prefix('teachers')->name('teacher.')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('edit');
        Route::post('/update-teacher/{id}', [TeacherController::class, 'update'])->name('update');
        Route::get('/delete-teacher/{id}', [TeacherController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('subjects')->name('subject.')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/store', [SubjectController::class, 'store'])->name('store');
        Route::get('/edit-subject/{id}', [SubjectController::class, 'edit'])->name('edit');
        Route::post('/update-subject/{id}', [SubjectController::class, 'update'])->name('update');
        Route::get('/delete-subject/{id}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    // profile admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/show-room', [HomeController::class, 'show_room'])->name('program.show-room');
});

Route::fallback(function () {
    return view('under-construction');
});

require __DIR__ . '/auth.php';

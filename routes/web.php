<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// cards

Route::get('/cards', [CardController::class, 'getAllCards']);

// keep reading

Route::get('/keepReading', function () {
    return view('keepReading');
});

// edit

Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');
Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');

// delete

Route::delete('/cards/{card}', [CardController::class, 'delete'])->name('cards.delete');


// add
Route::get('/addNewCard', function () {
    return view('addNewCard');
});


Route::post('/addNewCard', [CardController::class, 'store'])->name('addNewCard.store');




Route::get('/login',  [LoginController::class, 'showLoginForm']);
Route::middleware(['web'])->group(function () {
    Auth::routes();
});


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

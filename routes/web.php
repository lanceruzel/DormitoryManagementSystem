<?php

use App\Livewire\AdminPageIncludes\AdminPage;
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

Route::get('/', AdminPage::class)->middleware('auth');
Route::get('/dashboard', AdminPage::class)->middleware('auth')->name('admin-dashboard');
Route::get('/room-management', AdminPage::class)->middleware('auth')->name('admin-room');
Route::get('/student-management', AdminPage::class)->middleware('auth')->name('admin-student');
Route::get('/maintenance-management', AdminPage::class)->middleware('auth')->name('admin-maintenance');
Route::get('/bill-management', AdminPage::class)->middleware('auth')->name('admin-bill');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
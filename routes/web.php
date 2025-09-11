<?php

use App\Livewire\HomePage;
use App\Livewire\Notify\NotAcceptedPage;
use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\HistoryPage;
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
Route::get('/', HomePage::class)->name('home');
Route::get('/not-accepted', NotAcceptedPage::class)
    ->name('notify.not-accepted');
Route::get('/about', AboutPage::class)
    ->name('lambag.about');
Route::get('/history', HistoryPage::class)
    ->name('lambag.history');
Route::get('/logagain', function () {
    return redirect( '/lambag-admin');
})->name('login');
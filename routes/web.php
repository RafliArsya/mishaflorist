<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Katalog;
use App\Http\Livewire\Detail;
use App\Http\Livewire\Admin\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Product;

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

Route::get('/', Home::class)->name('home');
Route::get('/', fn () => redirect()->route('home'));
Route::get('/home', Home::class)->name('home');
Route::get('/katalog', Katalog::class)->name('katalog');
Route::get('/detail/{slug}', Detail::class)->name('detail');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', Login::class)->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/', fn () => redirect()->route('admin.dashboard'));

        Route::get('/product', Product::class)->name('admin.products');
    });
});

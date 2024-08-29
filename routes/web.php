<?php

use App\Http\Livewire\Auth\LoginPage;
use App\Http\Livewire\FormCancer;
use App\Http\Livewire\FormCancerEdit;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\PasienDetailPage;
use Illuminate\Support\Facades\Route;

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

Route::get('login', LoginPage::class)->name('login');
Route::middleware(['auth'])->group(function () {
Route::get('/', HomePage::class);
Route::get('pasien-regs/{norm}', PasienDetailPage::class);
Route::get('form-cancer', FormCancer::class);
Route::get('form-cancer-edit', FormCancerEdit::class);
});


<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\PropertyController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/property', [PropertyController::class, 'index'])->name('property');
    Route::delete('/property/{id}', [PropertyController::class, 'destroy'])->name('property.delete');
    Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
    Route::post('/property', [PropertyController::class, 'store'])->name('property.store');
    Route::get('/properties', [PropertyController::class, 'list'])->name('property.list');

    Route::get('/contract', [ContractController::class, 'index'])->name('contract');
    Route::delete('/contract/{id}', [ContractController::class, 'destroy'])->name('contract.delete');
    Route::get('/contract/create', [ContractController::class, 'create'])->name('contract.create');
    Route::post('/contract', [ContractController::class, 'store'])->name('contract.store');

});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    Inertia\Inertia::share('header', 'Dashboard');
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

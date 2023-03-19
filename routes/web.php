<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('house/{id}', [HomeController::class, 'house'])->name('single.house');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('house', HouseController::class);
    Route::post('house/features', [HouseController::class, 'storeFeature'])->name('house.features.store');
    Route::get('house/features/{id}/destroy', [HouseController::class, 'destroyFeature'])->name('house.features.destroy');
    Route::post('house/images', [HouseController::class, 'storeImage'])->name('house.images.store');
    Route::get('house/images/{id}/destroy', [HouseController::class, 'destroyImage'])->name('house.images.destroy');
});


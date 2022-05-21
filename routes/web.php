<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plant\PlantController;
use App\Http\Controllers\User\PlantController as UserPlantsController;

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
Route::middleware(['auth'])
    ->group(function () {
        Route::get('/',[\App\Http\Controllers\Plant\PlantController::class,'index'])->name(
            'index');
        Route::get('/user-collection/',[\App\Http\Controllers\Plant\PlantController::class,'userPlants'])->name(
            'user.collection');

        Route::resource('plants',PlantController::class);

        //USER PLANTS
        Route::delete('user-collection',[UserPlantsController::class, 'remove'])
        ->name('user.plant.remove');

        Route::get('user-collection',[UserPlantsController::class,'list'])
        ->name('user.plant.list');

    });

Auth::routes();
Route::get('/send-notification',[\App\Http\Controllers\WateringNotifficationController::class,'sendNotification']);

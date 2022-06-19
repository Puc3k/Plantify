<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plant\PlantController;
use App\Http\Controllers\User\PlantController as NoteUserPlantController;

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
        Route::get('/',[NoteUserPlantController::class,'index'])->name(
            'index');

        Route::get('/user-collection/',[NoteUserPlantController::class,'userPlants'])->name(
            'user.collection');

        Route::resource('plants',NoteUserPlantController::class);

        //USER PLANTS
        Route::delete('user-collection',[NoteUserPlantController::class, 'remove'])
        ->name('user.plant.remove');

        Route::get('user-collection',[NoteUserPlantController::class,'list'])
        ->name('user.plant.list');

        Route::get('user-collection/{plantId}',[NoteUserPlantController::class,'show'])
            ->name('user.plant.show');


        //USER NOTES
        Route::get('user-collection/notes/{plantId}',[NoteUserPlantController::class,'getNotes'])
            ->name('user.plant.note');
        Route::get('user-collection/notes/{plantId}',[NoteUserPlantController::class,'edit'])
            ->name('user.note.edit');
        Route::post('update',[NoteUserPlantController::class,'update'])
            ->name('user.note.update');

    });

Auth::routes();
Route::get('/send-notification',[\App\Http\Controllers\WateringNotifficationController::class,'sendNotification']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plant\PlantController;
use App\Http\Controllers\User\PlantController as NoteUserPlantController;
use App\Http\Controllers\User\UserProfileController;

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
        Route::get('/',[PlantController::class,'index'])->name(
            'index');

        Route::get('/user-collection/',[NoteUserPlantController::class,'userPlants'])->name(
            'user.collection');

        Route::resource('plants',NoteUserPlantController::class);

        //USER PROFILE
        Route::group(['prefix'=> 'user','as'=>'user.','namespace'=>'User'], function() {
            Route::get('profile', [UserProfileController::class, 'profile'])
                ->name('profile');
            Route::get('edit', [UserProfileController::class, 'edit'])
                ->name('edit');
            Route::post('update', [UserProfileController::class, 'update'])
                ->name('update');
        });


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
        Route::get('user-collection/notes/create/{plantId}',[NoteUserPlantController::class,'create'])
            ->name('user.note.create');
        Route::post('update',[NoteUserPlantController::class,'update'])
            ->name('user.note.update');
        Route::delete('user-collection/notes/',[NoteUserPlantController::class,'removeNote'])
            ->name('user.note.remove');
    });

Auth::routes();
Route::get('/send-notification',[\App\Http\Controllers\WateringNotifficationController::class,'sendNotification']);

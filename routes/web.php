<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
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

Route::get('/', function () {
    return view('admin.dashboard');
});


Route::get('/form', function () {
    return view('admin.form');
});

Route::get('/personal-info', function () {
    return view('admin.personal');
});
Route::post('/personal-info', [formController::class, 'storePerson']);
Route::get('/personal-info', [formController::class, 'showInfo']);
Route::get('/editPerson/{id}', [formController::class, 'editPerson']);
Route::post('/updatePerson/{id}', [formController::class, 'updatePerson']);
Route::get('/deletePerson/{id}', [formController::class, 'deletePerson']);

Route::post('/create', [formController::class, 'storeData']);
Route::get('/show', [formController::class, 'showData']);
Route::get('/edit/{title}', [formController::class, 'editData']);
Route::post('/update/{title}', [formController::class, 'updateData']);
Route::get('/delete/{id}', [formController::class, 'deleteData']);


Route::get('/project', function () {
    return view('admin.create_project');
});
Route::post('/create-project', [formController::class, 'storeProject']);
Route::get('/project', [formController::class, 'showProject']);
Route::get('/edit-project/{id}', [formController::class, 'editProject']);
Route::post('/update-project/{id}', [formController::class, 'updateProject']);
Route::get('/delete-project/{id}', [formController::class, 'deleteProject']);
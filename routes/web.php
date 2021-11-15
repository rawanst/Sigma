<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;


Route::get('/', [TrainingController::class, 'list'])->name('trainingList');
Route::get('/trainings/add', [TrainingController::class, 'add'])->name('trainingAdd')->middleware('auth','verified');
Route::post('/trainings/add', [TrainingController::class, 'store'])->name('trainingStore')->middleware('auth','verified');
Route::get('/trainings/{id}', [TrainingController::class, 'details'])->name('trainingDetails');
Route::post('/trainings/{id}/update', [TrainingController::class, 'update'])->name('trainingUpdate')->middleware('auth','verified');
Route::put('/trainings/{id}/update/picture', [TrainingController::class, 'updatePicture'])->name('trainingUpdatePicture')->middleware('auth','verified');
Route::delete('/trainings/{id}/delete', [TrainingController::class, 'delete'])->name('trainingDelete')->middleware('auth','verified');

Route::post('/comment/{training}', [CommentController::class, 'store'])->name('commentStore');
Route::delete('/comment/delete/{id}', [CommentController::class, 'deleteComment'])->name('commentDelete');

Route::get('/categories', [CategoryController::class, 'list'])->name('categoryList');
Route::get('/categories/add', [CategoryController::class, 'add'])->name('categoryAdd');
Route::post('/categories/add', [CategoryController::class, 'store'])->name('categoryStore');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categoryUpdate');
Route::delete('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categoryDelete');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('send');
Route::put('/register/update/{email}', [UserController::class, 'registerUpdate'])->name('isNewUser');

require __DIR__.'/auth.php';

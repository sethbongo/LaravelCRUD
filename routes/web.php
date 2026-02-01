<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewPagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'landingPageView'])->name('landingpageview');


Route::get('/signup', [UserController::class, 'signupView'])->name('signup');

Route::post('/postsignup', [UserController::class, 'register'])->name('register_account');

Route::post('/login', [UserController::class, 'login'])->name('login_account');

Route::post('/logout', [UserController::class, 'logout'])->name( 'logout_user');


Route::get('/welcome', [TaskController::class, 'getTasks'])->name('welcome');

Route::post('/tasks', [TaskController::class, 'savetask'])->name('saveTasks');

Route::get('/edittask/{task}', [TaskController::class, 'editTask'])->name('editTask');

Route::put('/updatetask/{task}', [TaskController::class, 'updateTask'])->name('updateTask');

Route::delete('/deletetasks/{task}', [TaskController::class, 'taskdelete'])->name('deletepost');
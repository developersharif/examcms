<?php

use system\router\Route;
use app\web\controller\HomeController;
use app\web\controller\AdminController;
use app\web\middleware\Auth;
/* User Routes */

Route::any('/', [HomeController::class]);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'check_login']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/registration', [HomeController::class, 'register']);
Route::post('/registration', [HomeController::class, 'check_register']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/exam/$id', [HomeController::class, 'exam']);
Route::get('/exam/result/$id', [HomeController::class, 'result']);
/* admin routes */
Route::get('/admin', ['controller' => AdminController::class, 'index', 'middleware' => Auth::class]);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::any('/admin/teacher/add', ['controller' => AdminController::class, 'add_teacher', 'middleware' => Auth::class]);
Route::get('/admin/teachers', ['controller' => AdminController::class, 'teachers', 'middleware' => Auth::class]);
Route::get('/admin/student/add', ['controller' => AdminController::class, 'add_student', 'middleware' => Auth::class]);
Route::post('/admin/student/add', ['controller' => AdminController::class, 'add_student', 'middleware' => Auth::class]);
Route::get('/admin/students', ['controller' => AdminController::class, 'students', 'middleware' => Auth::class]);
Route::get('/admin/exam/add', ['controller' => AdminController::class, 'add_exam', 'middleware' => Auth::class]);
Route::post('/admin/exam/add', ['controller' => AdminController::class, 'add_exam', 'middleware' => Auth::class]);
Route::get('/admin/exams', ['controller' => AdminController::class, 'exams', 'middleware' => Auth::class]);
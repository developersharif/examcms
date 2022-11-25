<?php

use system\router\Route;
use app\web\controller\HomeController;
use app\web\controller\AdminController;
use app\web\middleware\Auth;
use app\web\middleware\UserAuth;
/* User Routes */

Route::any('/', ['controller' => HomeController::class, 'index', 'middleware' => UserAuth::class]);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'check_login']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/profile', ['controller' => HomeController::class, 'profile', 'middleware' => UserAuth::class]);
Route::any('/exam/$id', ['controller' => HomeController::class, 'exam', 'middleware' => UserAuth::class]);
Route::get('/result/$id', ['controller' => HomeController::class, 'result', 'middleware' => UserAuth::class]);
Route::get('/results', ['controller' => HomeController::class, 'results', 'middleware' => UserAuth::class]);
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
Route::any('/admin/check/$id', ['controller' => AdminController::class, 'check_exam', 'middleware' => Auth::class]);
Route::any('/admin/attend', ['controller' => AdminController::class, 'exam_attend', 'middleware' => Auth::class]);
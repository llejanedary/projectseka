<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexTeacherController;
use App\Http\Controllers\IndexStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TAController;


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
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'registerForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/indexteacher', [IndexTeacherController::class, 'index'])->name('indexteacher');
Route::post('/makesubject', [IndexTeacherController::class, 'create'])->name('makesubject');


// Route::get('/indexstudent', [IndexStudentController::class, 'index'])->name('indexstudent');


Route::get('class/{id}', [TeacherController::class, "stdlist"])->name('class');
Route::get('score', [TeacherController::class, "stdscore"])->name('score');
Route::get('addstd/{id}', [TeacherController::class, "addstd"])->name('addstd');


Route::post('searchstd', [TeacherController::class, 'searchstd'])->name('searchstd');
Route::get('createlab/{id}', [TeacherController::class, "createLab"])->name('createLab');

Route::get('talist/{id}', [TeacherController::class, "talist"])->name('talist');
Route::get('addta', [TeacherController::class, "addta"])->name('addta');
Route::post('/addStudentToClass/{id}', [TeacherController::class, 'addStudentToClass'])->name('addStudentToClass');

Route::post('searchta', [TeacherController::class, 'searchta'])->name('searchta');


Route::post('deletestd', [TeacherController::class, 'deletestd'])->name('deletestd');
Route::post('deleteta', [TeacherController::class, 'deleteta'])->name('deleteta');

Route::get('/student', [StudentController::class,'student']);

Route::get('/detailStudent',function () {
    return view('detailStudent');
});
Route::get('Home_TA',[TAController::class, "index"]);
// Route::get('HomeTA', [TAController::class, 'name'])->name('name');
Route::get('TAaddsc', [TAController::class, 'TAadd']);
// Route::get('TAview', [TAController::class, 'TAview'])->name('TAview');
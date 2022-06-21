<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\WaliMuridController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\TeacherTestController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\AiController;

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
Route::get('/', function(){
    return view('landing');
})->middleware(['guest:walimurid', 'guest:siswa', 'guest:pengajar']);
Route::prefix('walimurid')->name('walimurid.')->group(function(){
    Route::middleware(['guest:walimurid'])->group(function(){   
        Route::get('/register', [WaliMuridController::class, 'registerWaliView']);
        Route::get('/login', [WaliMuridController::class, 'loginWaliView']);
    });
    Route::middleware(['auth:walimurid'])->group(function(){
        Route::get('/dashboard', [WaliMuridController::class, 'dashboard']);
        Route::get('/logout', [WaliMuridController::class, 'logout']);
        Route::get('/konsultasi', [KonsultasiController::class, 'view']);
        Route::get('/lihat-nilai', [LihatNilaiController::class, 'scoreView']);
        Route::get('/profile', [WaliMuridController::class, 'profile']);
        Route::get('/editpassword', [WaliMuridController::class, 'editPassword']);
        Route::get('/konsultasi/edit/{id_konsultasi}', [KonsultasiController::class, 'edit']);
        Route::get('/konsultasi/delete/{id_konsultasi}', [KonsultasiController::class, 'destroy']);
        
    });
});

Route::prefix('pengajar')->name('pengajar.')->group(function(){
    Route::middleware(['guest:pengajar'])->group(function(){   
        Route::get('/register', [PengajarController::class, 'registerPengajarView']);
        Route::get('/login', [PengajarController::class, 'loginPengajarView']);
    });
    Route::middleware(['auth:pengajar'])->group(function(){
        Route::get('/dashboard', [PengajarController::class, 'dashboard']);
        Route::get('pengajar/course-material', [CourseMaterialController::class, 'index']);
        Route::get('/course-material', [CourseMaterialController::class, 'index']);
        Route::get('/test', [TeacherTestController::class, 'index']);
        Route::get('/course', [CourseController::class, 'index']);
        Route::get('/logout', [PengajarController::class, 'logout']);
        Route::get('/konsultasi', [KonsultasiController::class, 'show']);   
        Route::get('/singlecourse/{id_course}', [PengajarController::class, 'singleCourseView']);
        Route::get('/course/delete/{id_course}', [CourseController::class, 'destroy']);
        Route::get('/course/edit/{id_course}', [CourseController::class, 'edit']);
        Route::get('/course-material/edit/{idl}', [CourseMaterialController::class, 'edit']);
        Route::get('/test/edit/{id_testpaper}', [TeacherTestController::class, 'edit']);
        Route::get('/test/delete/{id_testpaper}', [TeacherTestController::class, 'destroy']);
        Route::get('/singletest/{id_test}', [PengajarController::class, 'singleTestView']);
        Route::get('/singletest/{id_test}/{id_siswa}', [PengajarController::class, 'siswaTaskView']);
        Route::get('/profile', [PengajarController::class, 'profile']);
        Route::get('/editpassword', [PengajarController::class, 'editPassword']);
        Route::get('/konsultasi/delete/{id_konsultasi}', [KonsultasiController::class, 'destroy']);
        Route::get('/singlekonsultasi/{id_konsultasi}', [KonsultasiController::class, 'singleKonsultasiView']);
    });
});

Route::prefix('siswa')->name('siswa.')->group(function(){
    Route::middleware(['guest:siswa'])->group(function(){   
        Route::get('/register', [SiswaController::class, 'registerSiswaView']);
        Route::get('/login', [SiswaController::class, 'loginSiswaView']);
    });
    Route::middleware(['auth:siswa'])->group(function(){
        Route::get('/dashboard', [SiswaController::class, 'dashboard']);
        Route::get('/logout', [SiswaController::class, 'logout']);
        Route::get('/singlecourse/{id_course}', [SiswaController::class, 'singleCourseView']);
        Route::get('/course', [SiswaController::class, 'courseView']);
        Route::get('/course/assign/{id_course}', [SiswaController::class, 'assignCourse']);
        Route::get('/singletest/{id_test}', [SiswaController::class, 'singleTestView']);
        Route::get('/lihat-nilai', [LihatNilaiController::class, 'scoreView']);
        Route::get('/ai', [AiController::class, 'searchVideoView']);
        Route::get('/profile', [SiswaController::class, 'profile']);
        Route::get('/editpassword', [SiswaController::class, 'editPassword']);
    });
});


Route::post('siswa/ai', [AiController::class, 'searchVideo']);
Route::post('walimurid/register', [WaliMuridController::class, 'registerWali']);
Route::post('walimurid/login', [WaliMuridController::class, 'loginWali']);
Route::post('walimurid/konsultasi/{id_wali}', [KonsultasiController::class, 'store']);
Route::post('walimurid/profile/{id_wali}', [WaliMuridController::class, 'updateProfile']);
Route::post('walimurid/editpassword/{id_wali}', [WaliMuridController::class, 'updatePassword']);
Route::post('walimurid/konsultasi/update/{id_konsultasi}', [KonsultasiController::class, 'update']);

Route::post('pengajar/course/tambah/{id_pengajar}', [CourseController::class, 'store']);
Route::post('pengajar/course-material/tambah', [CourseMaterialController::class, 'store']);
Route::post('pengajar/course-material/update/{id}', [CourseMaterialController::class, 'update']);
Route::post('pengajar/test/tambah', [TeacherTestController::class, 'store']);
Route::post('pengajar/test/update/{id_testpaper}', [TeacherTestController::class, 'update']);
Route::post('pengajar/course/update/{id_course}', [CourseController::class, 'update']);
Route::post('/singletest/{id_test}/{id_siswa}', [PengajarController::class, 'giveScore']);
Route::post('pengajar/profile/{id_pengajar}', [PengajarController::class, 'updateProfile']);
Route::post('pengajar/editpassword/{id_pengajar}', [PengajarController::class, 'updatePassword']);

Route::post('pengajar/register', [PengajarController::class, 'registerPengajar']);
Route::post('pengajar/login', [PengajarController::class, 'loginPengajar']);
Route::post('/konsultasi/assign/{id_konsultasi}', [KonsultasiController::class, 'assign']);

Route::post('siswa/register', [SiswaController::class, 'registerSiswa']);
Route::post('siswa/login', [SiswaController::class, 'loginSiswa']);
Route::post('/singletest/{id_test}', [SiswaController::class, 'answerTest']);
Route::post('siswa/profile/{id_siswa}', [SiswaController::class, 'updateProfile']);
Route::post('siswa/editpassword/{id_siswa}', [SiswaController::class, 'updatePassword']);

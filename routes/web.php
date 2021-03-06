<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/login','App\Http\Controllers\HomeController@getLogin')->name('login');
Route::get('/register','App\Http\Controllers\HomeController@getRegister');

Route::post('/login','App\Http\Controllers\HomeController@postLogin');
Route::get('/logout','App\Http\Controllers\HomeController@postLogout');

Route::middleware(['auth'])->group(function(){
// Admin
Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('Dashboard');
Route::get('/students','App\Http\Controllers\AdminController@getStudents')->name('Students');
Route::get('/students/{id}','App\Http\Controllers\AdminController@getSpecificStudents')->name('Students');
Route::get('/faculties','App\Http\Controllers\AdminController@getFaculties')->name('Faculties');
Route::get('/courses','App\Http\Controllers\AdminController@getCourses')->name('Courses');
Route::get('/study-materials','App\Http\Controllers\AdminController@getStudyMaterial')->name('Study Materials');
Route::get('/settings','App\Http\Controllers\AdminController@getSettings')->name('Settings');

Route::post('/add-course','App\Http\Controllers\AdminController@addCourse')->name('add-course');
Route::post('/update-course','App\Http\Controllers\AdminController@updateCourse');

Route::post('/approve/{id}', 'App\Http\Controllers\AdminController@approve');
Route::post('/decline/{id}', 'App\Http\Controllers\AdminController@decline');

Route::post('/add-study-material','App\Http\Controllers\AdminController@addStudyMaterial');
Route::post('/add-setting','App\Http\Controllers\AdminController@addSetting');
Route::post('/update-setting','App\Http\Controllers\AdminController@updateSetting');
Route::post('/change-video/{id}','App\Http\Controllers\AdminController@changeVideo');


// Faculty
Route::post('/add-faculty','App\Http\Controllers\AdminController@addFaculty')->name('add-faculty');
Route::post('/update-faculty', 'App\Http\Controllers\AdminController@updateFaculty');
Route::post('/delete-faculty','App\Http\Controllers\AdminController@deleteFaculty');


Route::post('/update-student','App\Http\Controllers\StudentsController@updateStudent');
Route::post('/delete-student','App\Http\Controllers\StudentsController@deleteStudent');

Route::post('/video-watched','App\Http\Controllers\StudentsController@watchedVideo');

});
// Student
Route::post('/register','App\Http\Controllers\StudentsController@postRegister')->name('Register');

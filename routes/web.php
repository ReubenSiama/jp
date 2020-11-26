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
Route::get('/faculties','App\Http\Controllers\AdminController@getFaculties')->name('Faculties');
Route::get('/courses','App\Http\Controllers\AdminController@getCourses')->name('Courses');
Route::get('/study-materials','App\Http\Controllers\AdminController@getStudyMaterial')->name('Study Materials');
Route::get('/settings','App\Http\Controllers\AdminController@getSettings')->name('Settings');

Route::post('/add-course','App\Http\Controllers\AdminController@addCourse')->name('add-course');
Route::post('/add-faculty','App\Http\Controllers\AdminController@addFaculty')->name('add-faculty');

Route::post('/approve/{id}', 'App\Http\Controllers\AdminController@approve');
Route::post('/decline/{id}', 'App\Http\Controllers\AdminController@decline');

Route::post('/add-study-material','App\Http\Controllers\AdminController@addStudyMaterial');
Route::post('/add-setting','App\Http\Controllers\AdminController@addSetting');

// Faculty

});
// Student
Route::post('/register','App\Http\Controllers\StudentsController@postRegister')->name('Register');

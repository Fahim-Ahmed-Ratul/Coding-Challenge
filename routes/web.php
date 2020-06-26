<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/db', function () {
    return view('includes.dbconnection');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function (Request $request) {
    $UserId=$request->session()->get('info');
    return view('dashboard',compact('UserId'));
});

Route::get('/add-expense', function (Request $request) {
  $UserId=$request->session()->get('info');
    return view('add-expense',compact('UserId'));
});

Route::get('/month', function (Request $request) {
  $UserId=$request->session()->get('info');
    return view('expense-monthwise-reports',compact('UserId'));
});

Route::get('/date', function (Request $request) {
  $UserId=$request->session()->get('info');
    return view('expense-datewise-reports',compact('UserId'));
});

Route::get('/year', function (Request $request) {
    $UserId=$request->session()->get('info');
    return view('expense-yearwise-reports',compact('UserId'));
});

Route::get('/downloadPDF','ExpenseController@downloadPDF')->name('download');
Route::get('/download1PDF','ExpenseController@download1PDF')->name('download1');
Route::get('/download2PDF','ExpenseController@download2PDF')->name('download2');

// Route::get('/manageexpense', function () {
//     return view('add-expense');
// });

Route::post('/register','LoginController@store')->name('registeruser');
Route::post('/login','LoginController@login')->name('login');
Route::post('/add-expense','ExpenseController@store')->name('addexpense');
Route::get('/manage-expense','ExpenseController@show')->name('manageexpense');

Route::get('/delete-expense/{id}','ExpenseController@destroy')->name('delete');

Route::get('/delete-expense/{id}','ExpenseController@destroy')->name('delete');

Route::get('/user-profile','LoginController@edit')->name('user');

Route::post('/update-user-profile','LoginController@update')->name('update');

Route::get('/change-password','LoginController@change')->name('change');

Route::post('/update-password','LoginController@updatepassword')->name('update-password');


Route::post('/month-report','ExpenseController@mreport')->name('month-report');
Route::post('/date-report','ExpenseController@dreport')->name('date-report');
Route::post('/year-report','ExpenseController@yreport')->name('year-report');

Route::get('/logout','LoginController@logout')->name('logout');

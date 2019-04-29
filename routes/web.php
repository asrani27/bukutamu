<?php

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
    return view('welcome');
});

Route::get('/agenda', 'FrontController@index')->name('agenda');
Route::post('/bukutamu/store', 'FrontController@store')->name('sb');

Route::get('/loginadmin', function () {
    if(Auth::check()) {
        return redirect()->route('home');
    } 
    return view('login');
});

Route::get('logout', function() {
    Auth::logout();
    return redirect()->to('/');
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/delete/{id}', 'HomeController@delete');
Route::get('/home/edit/{id}', 'HomeController@edit');
Route::post('/home/update/{id}', 'HomeController@update')->name('updateAgenda');
Route::get('/user', 'UserController@index')->name('user');
Route::post('/user/simpan', 'UserController@store')->name('simpanuser');
Route::post('/user/edit', 'UserController@update')->name('edituser');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/pdf/totalAgenda', 'PdfController@agendaAll')->name('totalAgenda');
Route::get('/pdf/agendaToday', 'PdfController@agendaToday')->name('agendaToday');
Route::get('/pdf/agendaMonth', 'PdfController@agendaMonth')->name('agendaMonth');
Route::get('/pdf/report', 'PdfController@pdf')->name('pdf');
Route::post('/pdf/report/print', 'PdfController@printpdf')->name('printpdf');

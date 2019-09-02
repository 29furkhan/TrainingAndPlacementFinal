<?php
// use App\TPODB;
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

Route::get('/', 'PagesController@getDashboard' );


Route::get('/dashboard','PagesController@getDashboard');   

Route::get('/php/insert/login','ProcessController@insertLoginDetails');
Route::get('/php/insert/logincheck','ProcessController@checkLoginAndEnter');
Route::POST('/php/insert/checkavailability/email','ProcessController@checkAvailabilityEmail');

Route::get('/main','ProcessController@index');   
  


Route::get('/reset',function(){
    return view('pages.Student.reset');
});

Route::get('/signUp',function(){
    return view('pages.Student.signUp');
});

Route::POST('gotoconnect', 'connect@checkData');
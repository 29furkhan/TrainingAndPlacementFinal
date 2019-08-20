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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard','PagesController@getDashboard');   

Route::get('/common', function () {
    return view( 'layouts.commonLayout');
});


// Route::group(['prefix' => 'students'], function () {
//     Route::get('/export','PagesController@exportStudentsData');
// });


Route::get('/export','TPODBController@index');
Route::get('/export/fetch_data','TPODBController@fetch_data');

Route::get('/login',function(){
    return view('pages.login');
});

Route::get('/reset',function(){
    return view('pages.Student.reset');
});

Route::get('/signUp',function(){
    return view('pages.Student.signUp');
});
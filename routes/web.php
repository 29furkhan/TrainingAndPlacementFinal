<?php
// use App\TPODB;
use App\Exports\mainDBExport;
use Maatwebsite\Excel\Facades\Excel;
 
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


Route::get('/errorUserPage',function(){
    return view('Pages.errorUserPage');
});

Route::get('/', function(){
    return view('temp');
} );

Route::GET('/php/sendyearandbranch','DBController@getYearAndBranch');

Route::POST('/php/export','DBController@excel');


Route::get('/dashboard','PagesController@getDashboard');   

Route::get('/php/insert/login','ProcessController@insertLoginDetails');

Route::post('/php/insert/logincheck','ProcessController@checkLoginAndEnter');

Route::get('/php/insert/checkavailability/email','ProcessController@checkAvailabilityEmail');

Route::get('/main','ProcessController@index');   

Route::get('/export','DBController@index');

Route::POST('/php/export/query','ProcessController@samePageAJAX');

Route::get('/php/logout', 'ProcessController@logout');


Route::get('/reset',function(){
    return view('pages.reset');
});

Route::get('/signUp',function(){
    return view('pages.signUp');
});

Route::get('/php/insert/profile','ProcessController@insertProfileDetails');

Route::get('/profile','ProcessController@Rbranch');

Route::get('/student', function () {
    return view('pages.Student.dashboardStudent');
});

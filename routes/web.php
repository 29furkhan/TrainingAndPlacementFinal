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

// Route::resource('/activityStudent','PaymentsController');




Route::GET('/php/activity/getDataForAttendance','ActivitiesController@sendDataForAttendance');
Route::GET('/php/record/attendance','ActivitiesController@RecordAttendance');


// ROutes for PhotoGallery
Route::GET('/photogalleryTPO','PhotoGalleryController@index');
// End of Photo Gallery Routes

// Routes for Drives
Route::GET('/php/drive/edit/get','DrivesController@edit');
Route::GET('/php/edit/drive','DrivesController@editData');
Route::GET('/php/drive/delete','DrivesController@dltData');

// Student Drives Routes

Route::GET('/driveStudent','DrivesController@indexStudent');

// End of Drives ROutes

// Routes For Counselling Portal Added By Prashant
Route::get('/counselling','ProcessController@Couns');

Route::get('/counsellingTPO','CounsellingController@index');

Route::get('/php/add/video','CounsellingController@create');

Route::GET('/php/video/delete','CounsellingController@deleteVideo');

Route::GET('/php/edit/video','CounsellingController@editVideo');
//Routes End

Route::GET('/php/video/edit/get','CounsellingController@getDataToEdit');

Route::get('/drivesTPO','DrivesController@index');

Route::get('/php/create/drive','DrivesController@create');

Route::get('/notAllowedDevice',function(){
    return view('pages.notAllowedDevice');
});
Route::GET('/php/activity/edit/get','ActivitiesController@getDataToEdit');


Route::GET('/php/edit/activity','ActivitiesController@editActivity');


Route::GET('/activityStudent','StudentActivityController@index');
Route::GET('/activityStudent/storeData','StudentActivityController@storeData');

Route::GET('/php/activity/download','ActivitiesController@exportActivity');
Route::GET('/php/activity/delete','ActivitiesController@deleteActivity');

Route::GET('/php/create/activity','ActivitiesController@createActivity');


Route::POST('/paytm-callback','PaymentsController@paytmCallback');

Route::get('/php/errorUserPage',function(){
    return view('pages.errorUserPage');
});

Route::get('/process','StudentsController@processStudents');


Route::get('/activities','ActivitiesController@index');

Route::get('/php/insert/updatestudent','StudentsController@updateStudent');

Route::get('/php/insert/searchstudent','StudentsController@searchStudent');


Route::get('/underConstructionPage',function(){
    return view('pages.underConstructionPage');
});

Route::get('/', 'ProcessController@index' );

Route::GET('/php/sendyearandbranch','DBController@index');

Route::POST('/php/export','DBController@excel');


Route::get('/dashboard','PagesController@getDashboard');   

Route::get('/php/insert/login','ProcessController@insertLoginDetails');

Route::post('/php/insert/logincheck','ProcessController@checkLoginAndEnter');

Route::get('/php/insert/checkavailability/email','ProcessController@checkAvailabilityEmail');

Route::get('/php/insert/checkavailability/caserp_id','ProcessController@checkAvailabilityCASERP_ID');

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


Route::POST('/php/getclasses','ProcessController@getClassForGivenBranch');

Route::get('/reset', 'SendEmailController@index');

Route::post('/reset/send', 'SendEmailController@send');

Route::get('/ResetPassword',function(){
    return view('pages.resetPassword');
})->name('ResetPassword');

Route::get('/php/insert/resetP','ProcessController@resetP');


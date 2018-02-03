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
    return view('home1');

    // SELECT * FROM users;
    // $users = DB::table('users')->get();
    // dd($users);

    // SELECT * FROM users WHERE id=1;
    // $users = DB::table('users')->get('id', 1)->get();
    // dd($users);
});

Route::get('/services', function(){
    return view('services');
});
Auth::routes();



Route::get('custom-register','CustomAuthController@showRegisterForm')->name('custom.register');
Route::post('custom-register','CustomAuthController@register');

Route::get('custom-login','CustomAuthController@showLoginForm')->name('custom.login');
Route::post('custom-login','CustomAuthController@login');

Route::get('/loginerror', function () {
    return view('loginerror');
});

//Route::resource('/services','ServicesController');

// Route::get('/services', function () {
//     return view('createServices');
// });

//Route::get('/services/get_datatable','ServicesController@get_datatable');


/*Route::resource('/services','ServicesController');
Route::resource('/appointments','AppointmentsController');*/


Route::middleware('auth')->prefix('admin')->group(function () { 
	Route::get('/home', 'HomeController@index');
    
    Route::resource('/users', 'UsersController');
    Route::get('/get-users', 'UsersController@all');
    Route::get('/my-profile', 'UsersController@myProfile');
    Route::post('/change-password', 'UsersController@changePassword');
    
    Route::resource('/services', 'ServicesController');
    Route::get('/get-services', 'ServicesController@all');
    
    Route::resource('/patients', 'PatientControler');
    Route::get('/get-patients', 'PatientControler@all');
    Route::get('/view_p/{id}', 'PatientControler@view_p');
    Route::get('/reset_patient_pass/{id}', 'PatientControler@resetPassword');


    Route::resource('/cases', 'CasesController');
    Route::get('/get-cases', 'CasesController@all');

    Route::resource('/time-slots', 'TimeSlotsController');
    Route::get('/get-time-slots', 'TimeSlotsController@all');
 
    Route::resource('/appointments','AppointmentsController');
    Route::get('/get-appointments', 'AppointmentsController@all');
    Route::get('/getAvalableTime/{id?}', 'AppointmentsController@getAvalableTime');


    Route::resource('/check-up','CheckUpController');
    Route::get('/precheckup/{id}', 'CheckUpController@precheckup');
    Route::post('/save_precheckup', 'CheckUpController@save_precheckup');
    Route::get('/checkup/{id}', 'CheckUpController@checkup');
    Route::post('/save_checkup/{id}', 'CheckUpController@save_checkup');

    Route::get('/get-appointments-today', 'CheckUpController@all');
    Route::get('/get-appointments-past', 'CheckUpController@past');

    Route::get('cases-reports', 'ReportsController@cases_reports');
    Route::get('/get-cases_reports/{id}', 'ReportsController@getCasesReports');
    Route::get('appointment-reports', 'ReportsController@appointment_reports');
    Route::get('/get-appointment_reports', 'ReportsController@getAppointmentReports');
});

Route::middleware('auth')->prefix('patients')->group(function () { 
    Route::resource('/home', 'PatientControler');
    Route::get('/show/{id}', 'PatientControler@show');
    Route::get('/editMyProfile/{id}','PatientControler@editMyProfile');

    Route::get('/updateaccount', 'PatientControler@updateaccount');
    Route::post('/changeMyPass/{id}','PatientControler@changePassword');
    Route::get('/appointments', 'PatientControler@appointments');
    Route::get('/request_apt_form', 'PatientControler@request_apt_form');
    Route::post('/save_request_apt', 'PatientControler@save_request_apt');
});



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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/careers', 'Recruitment\jobOpportunityController@viewCareers');
Route::get('/list-careers', 'Recruitment\jobOpportunityController@listCareers');

Route::get('/applyNowTrigger/{id}', 'Recruitment\jobOpportunityController@applyNow');
Route::get('/terms', 'termsAgreement@viewTerms');

Route::group(['prefix' => 'profiling'], function() {
    Route::get('initiate', 'Recruitment\Profiling@initiateProfiling');
    Route::post('sendApplication', 'Recruitment\Profiling@processApplication');
});

Route::group(['prefix' => 'Applicant'], function(){
    Route::get('/', 'ApplicantAccounts\ApplicantController@index');
    Route::get('examination', 'Integration\ExamController@index');
    Route::get('login', 'ApplicantAccounts\loginController@index');
    Route::post('login', 'ApplicantAccounts\loginController@executeLogin');
    Route::get('logout', 'ApplicantAccounts\loginController@executeLogout');
    Route::post('checkSchedule','ApplicantAccounts\ApplicantController@checkSched');
});


Route::get('success', function() {
    return view('Profiling.success');
});


Route::group(['prefix' => 'Vendors'], function() {
    Route::get('/', 'Vendor\VendorController@index');
    Route::get('/registration', function(){
        return view('Vendor.register');
    });
    Route::get('/Dashboard', 'Vendor\PortalController@dashboard');
    Route::post('/login', 'Vendor\VendorController@login');
    Route::post('/registration', 'Vendor\VendorController@registration');
    Route::get('logout', 'Vendor\VendorController@logout');
});
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/careers', 'Recruitment\jobOpportunityController@viewCareers');
Route::get('/list-careers', 'Recruitment\jobOpportunityController@listCareers');

Route::get('/applyNowTrigger/{id}', 'Recruitment\jobOpportunityController@applyNow');
Route::get('/terms', 'termsAgreement@viewTerms');


Route::group(['prefix' => 'profiling'], function() {

    Route::get('initiate', 'Recruitment\Profiling@initiateProfiling');

});

Route::group(['prefix' => 'services'], function(){

    Route::resource('customers', 'CRM\CRM');
    Route::resource('booking', 'CRM\bookingController');

});
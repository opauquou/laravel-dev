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

/**********************************
 * Demo Routes
 **********************************/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', ['as' => 'home', 'uses' => 'WelcomeController@index']);
Route::get('/widgets', ['as' => 'widgets', 'uses' => 'WelcomeController@widget']);
Route::get('/calendar', ['as' => 'calendar', 'uses' => 'WelcomeController@calendar']);

// CHARTS Routes
Route::get('/CHARTS/js', ['as' => 'jsCharts', 'uses' => 'WelcomeController@jsCharts']);
Route::get('/CHARTS/morris', ['as' => 'morrisCharts', 'uses' => 'WelcomeController@morrisCharts']);
Route::get('/CHARTS/flot', ['as' => 'flotCharts', 'uses' => 'WelcomeController@flotCharts']);
Route::get('/CHARTS/inline', ['as' => 'inlineCharts', 'uses' => 'WelcomeController@inlineCharts']);

// UI Routes
Route::get('/UI/general', ['as' => 'generalUi', 'uses' => 'WelcomeController@generalUi']);
Route::get('/UI/icons', ['as' => 'iconsUi', 'uses' => 'WelcomeController@iconsUi']);
Route::get('/UI/buttons', ['as' => 'buttonsUi', 'uses' => 'WelcomeController@buttonsUi']);
Route::get('/UI/sliders', ['as' => 'slidersUi', 'uses' => 'WelcomeController@slidersUi']);
Route::get('/UI/timeLines', ['as' => 'timeLinesUi', 'uses' => 'WelcomeController@timeLinesUi']);
Route::get('/UI/modals', ['as' => 'modalsUi', 'uses' => 'WelcomeController@modalsUi']);

// FORMS Routes
Route::get('/FORMS/general', ['as' => 'generalForm', 'uses' => 'WelcomeController@generalForm']);
Route::get('/FORMS/advanced', ['as' => 'advancedForm', 'uses' => 'WelcomeController@advancedForm']);
Route::get('/FORMS/editors', ['as' => 'editorsForm', 'uses' => 'WelcomeController@editorsForm']);

// TABLES Routes
Route::get('/TABLES/simple', ['as' => 'simpleTables', 'uses' => 'WelcomeController@simpleTables']);
Route::get('/TABLES/data', ['as' => 'dataTables', 'uses' => 'WelcomeController@dataTables']);

// MAILS Routes
Route::get('/mail/inbox', ['as' => 'mailBox', 'uses' => 'WelcomeController@mailBox']);
Route::get('/mail/compose', ['as' => 'mailCompose', 'uses' => 'WelcomeController@mailCompose']);
Route::get('/mail/message/{msgCode?}', ['as' => 'mailRead', 'uses' => 'WelcomeController@mailRead']);

// EXAMPLES Routes
Route::get('/EXAMPLES/invoice', ['as' => 'invoicePage', 'uses' => 'WelcomeController@invoicePage']);
Route::get('/EXAMPLES/profile', ['as' => 'profilePage', 'uses' => 'WelcomeController@profilePage']);
Route::get('/EXAMPLES/login', ['as' => 'loginPage', 'uses' => 'WelcomeController@loginPage']);
Route::get('/EXAMPLES/register', ['as' => 'registerPage', 'uses' => 'WelcomeController@registerPage']);
Route::get('/EXAMPLES/lock-screen', ['as' => 'lockPage', 'uses' => 'WelcomeController@lockPage']);
Route::get('/EXAMPLES/error-404', ['as' => 'error.404', 'uses' => 'WelcomeController@error404']);
Route::get('/EXAMPLES/error-500', ['as' => 'error.500', 'uses' => 'WelcomeController@error500']);


/********************************
 * Application Route
 ********************************/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

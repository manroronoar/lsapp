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

//Route::get('/', function () {
//    return view('home');
//});


   

Auth::routes();

Route::get('test', 'Testcontroller@index');


//Route::resource('momc', 'kpimonitormcController');
Route::get('motmc', 'kpimonitormcController@index2')->middleware('auth');
Route::get('momc', 'kpimonitormcController@index')->middleware('auth');
Route::get('momc/readdata', 'kpimonitormcController@readdata')->middleware('auth');
Route::get('momc/readdatabymc/{valuesmcs}', 'kpimonitormcController@readdatabymc')->middleware('auth');
Route::get('momc/readdataindex/{valuemc}', 'kpimonitormcController@readdataindex')->middleware('auth');
Route::get('momc/readdataChart', 'kpimonitormcController@Chart')->middleware('auth');

Route::get('loay1', 'kpiLocationAY1Controller@index')->middleware('auth');



//Route::get('momc/readdmc/{yyyy}/{mmmm}/{dddd}/{varmc}/{searchreport}/{shift}', 'kpimonitormcController@readdataforoeebymc')->middleware('auth');
//Route::resource('oeed', 'kpioeeDetailController')->middleware('auth');
Route::get('oeeds/{mcnumber}', 'kpioeeDetailController@index2')->middleware('auth');
Route::get('oeeds/readdmc/{yyyy}/{mmmm}/{dddd}/{yyyye}/{mmmme}/{dddde}/{varmc}/{shift}/{typeday}', 'kpioeeDetailController@readdata2')->middleware('auth');
Route::get('oeeds/loopchart/{yyyy}/{mmmm}/{dddd}/{yyyye}/{mmmme}/{dddde}/{varmc}/{shift}/{typeday}', 'kpioeeDetailController@loopchart')->middleware('auth');
//loopchart
Route::get('oeed/{mcnumber}', 'kpioeeDetailController@index')->middleware('auth');
Route::get('oeed/readdmc/{yyyy}/{mmmm}/{dddd}/{varmc}/{shift}/{typeday}', 'kpioeeDetailController@readdata')->middleware('auth');
//Route::get('oeed', 'kpioeeDetailController')->middleware('auth');


Route::resource('/', 'kpidashboardController')->middleware('auth');
Route::resource('/kpi', 'kpidashboardController')->middleware('auth');
Route::get('kpireaddatamc/readdata/{todayS}/{todayE}/{tomonths}', 'kpiGetDataController@readdata')->middleware('auth');

Route::resource('oee', 'kpioeeController')->middleware('auth');
//Route::get('oee','kpioeeController@index');
//Route::post('oee', 'kpioeedetail')->middleware('auth');
//Route::resource('oeed', 'kpioeeDetailController')->middleware('auth');


Route::resource('mcs', 'kpimcsController')->middleware('auth');
Route::post('mcs/update', 'kpimcsController@update')->name('mcs.update');
Route::get('mcs/destroy/{id}', 'kpimcsController@destroy');

Route::resource('nod', 'NodeController')->middleware('auth');
Route::post('nod/update', 'NodeController@update')->name('nod.update');
//Route::post('nod/edit/{id}', 'NodeController@edit');
Route::get('nod/destroy/{id}', 'NodeController@destroy');

Route::resource('shi', 'ShiftController')->middleware('auth');
Route::post('shi/update', 'ShiftController@update')->name('shi.update');
Route::get('shi/destroy/{id}', 'ShiftController@destroy');

Route::resource('sti', 'SetupcodeController')->middleware('auth');
Route::post('sti/update', 'SetupcodeController@update')->name('sti.update');
Route::get('sti/destroy/{id}', 'SetupcodeController@destroy');

Route::resource('dtc', 'DowncodeController')->middleware('auth');
Route::post('dtc/update', 'DowncodeController@update')->name('dtc.update');
Route::get('dtc/destroy/{id}', 'DowncodeController@destroy');

Route::resource('hsi', 'kpiheadersetsController')->middleware('auth');
Route::post('hsi/update', 'kpiheadersetsController@update')->name('hsi.update');
Route::get('hsi/destroy/{id}', 'kpiheadersetsController@destroy');

Route::resource('bit', 'BitdownController')->middleware('auth');
Route::post('bit/update', 'BitdownController@update')->name('bit.update');
Route::get('bit/destroy/{id}', 'BitdownController@destroy');

Route::resource('loc', 'kpilocationController')->middleware('auth');
Route::post('loc/update', 'kpilocationController@update')->name('loc.update');
Route::get('loc/destroy/{id}', 'kpilocationController@destroy');

Route::resource('seq', 'kpisetqualityController')->middleware('auth');
Route::post('seq/update', 'kpisetqualityController@update')->name('seq.update');
Route::get('seq/destroy/{id}', 'kpisetqualityController@destroy');

Route::get('testgetjson', 'GetnodejsonController@index');
Route::post('testgetjson', 'GetnodejsonController@store');

//Route::resource('sample', 'ShiftController');
///Route::post('sample/update', 'ShiftController@update')->name('sample.update');
//Route::get('sample/destroy/{id}', 'ShiftController@destroy');
















<?php

use Illuminate\Support\Facades\Route;

use App\Category;
use App\Mail\ApprovalMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/welcome', function() {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index');

// go to controller

Route::get('/', 'CatViewController@index');
Route::get('/support', 'CatViewController@support')->middleware('auth')->middleware('verified');
Route::post('/support/submit', 'CatViewController@supportsubmit')->middleware('auth')->middleware('verified');
Route::get('/ajax-get-categories', 'AjaxController@getCategories'); // ajax gets categories

Route::post('/addCategory', 'CatViewController@store')->middleware('auth')->middleware('verified');
Route::post('/submit', 'CatViewController@submit')->middleware('auth')->middleware('verified');

Route::get('/approve/requestID/{requestID}', 'ApprovalMailController@approve');
Route::get('/refuse/requestID/{requestID}', 'ApprovalMailController@refuse');

Route::get('/admin-request-list', 'RequestListController@indexAdmin')->middleware('auth')->middleware('verified');
Route::get('/user-request-list', 'RequestListController@indexUser')->middleware('auth')->middleware('verified');
Route::get('/admin-request-list/show/requestID/{requestID}', 'RequestListController@showAdmin')->middleware('auth')->middleware('verified');
Route::get('/user-request-list/requestID/{requestID}', 'RequestListController@showUser')->middleware('auth')->middleware('verified');
Route::get('/ajax-get-progress/{requestID}', 'AjaxController@getProgress'); // ajax gets progress by id
Route::get('/ajax-get-remark/{requestID}', 'AjaxController@getRemark'); // ajax gets remark by id
Route::post('/admin-request-list-status-update/requestID/{requestID}', 'RequestListController@update')->middleware('auth')->middleware('verified');
Route::get('/delete/requestID/{requestID}', 'RequestListController@delete')->middleware('auth')->middleware('verified');
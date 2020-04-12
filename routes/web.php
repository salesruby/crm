<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/setup','SetupController@index')->name('setup');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
//  Just add a route to that method separately, before you register the resource
    Route::get('leads/upload', 'LeadController@upload')->name('leads.upload');
    Route::post('leads/upload/post', 'LeadController@uploadPost')->name('leads.upload.post');
    Route::resource('leads','LeadController');
    Route::resource('products','ProductController');
    Route::resource('statuses','StatusController');
    Route::get('deals/index', 'DealController@index')->name('deals.index');
    Route::get('deals/open', 'DealController@open')->name('deals.open');
    Route::get('deals/closed', 'DealController@closed' )->name('deals.closed');
    Route::get('deals/search', 'DealController@search' )->name('deals.search');
//protect the pending route
    Route::get('deals/pending', 'DealController@pending')->name('deals.pending');
    Route::get('deals/{id}/confirm', 'DealController@confirm')->name('confirm');
    Route::get('chats/{lead_id}/deal/{deal_id}','ChatController@showForm')->name('chats.create');
    Route::post('chats/store','ChatController@storeChat')->name('chats.store');
    Route::get('status/{lead_id}/product/{product_id}','ProductStatusController@showForm')->name('product_status.edit');
    Route::post('status/store','ProductStatusController@storeStatus')->name('product_status.store');
    Route::get('tasks/index','TaskController@index')->name('tasks.index');
    Route::post('/tasks/update','TaskController@update');
});


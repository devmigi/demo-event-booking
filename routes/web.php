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

Auth::routes();
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});

Route::get('/', 'HomeController@coupondunia');
Route::post('/', 'HomeController@couponduniaCalculate');

Route::get('event/{id}', 'HomeController@register')->name('home');
Route::post('event/{id}', 'HomeController@save');

Route::get('ticket/{id}', 'HomeController@ticket');

Route::get('/admin/home', 'HomeController@home');

Route::get('/admin/events', 'Admin\EventController@all')->name('events');
Route::get('/admin/event/{id}', 'Admin\EventController@show');
Route::get('/admin/event/{id}/tickets', 'Admin\EventController@tickets');

Route::get('/admin/tickets/{type?}', 'Admin\TicketController@all')->name('tickets');
Route::get('/admin/ticket/{id}', 'Admin\TicketController@show');

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'admin','as' => 'voyager.', 'middleware' => 'admin.user'], function()
{
    Route::resource('/contact-messages', '\App\Http\Controllers\Admin\Voyager\ContactMessageController');
    Route::get('/ExportMembers','\App\Http\Controllers\Admin\Voyager\ExcelController@exportMember')->name('export.member');
    Route::get('/ExportSubscribers','\App\Http\Controllers\Admin\Voyager\ExcelController@exportSubscriber')->name('export.subscriber');
});

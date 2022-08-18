<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;

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

Route::get('/tickets/userindex', 'App\Http\Controllers\TicketController@userindex')->name('tickets.userindex');

Route::resource('tickets', TicketController::class);

Route::post('/tickets/create', 'App\Http\Controllers\TicketController@store')->name('tickets.store');

Route::post('/tickets/{ticket}', 'App\Http\Controllers\TicketController@update')->name('tickets.update');

Route::get('/tickets/delete/{ticket}', 'App\Http\Controllers\TicketController@delete')->name('tickets.delete');

Route::post('/tickets/delete/{ticket}', 'App\Http\Controllers\TicketController@destroy')->name('tickets.destroy');

Route::resource('bookings', BookingController::class);







//AUTH ROUTE FOR BOTH
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/routes', 'App\Http\Controllers\DashboardController@routes')->name('dashboard.routes');
});

//FOR USERS

Route::group(['middleware' => ['auth', 'role:user']], function() {
    
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

//FOR ADMINS
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/


require __DIR__.'/auth.php';


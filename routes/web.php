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
// // Verifying
// 	Auth::routes(['verify' => true]);

Route::group(
	[
		'prefix'     => 'admin',
		'namespace'  => 'Admin',
		'middleware' => 'auth',
	],
	function () {
		
        Route::resource('mobil','MobilController');
        Route::resource('merk','MerkController');
       	Route::get('/', function () {
	    	return view('admin.index');
		})->middleware('auth');


        
	}
);

Route::group(
	[
		'prefix'     => 'akses',
		'namespace'  => 'Akses',
	],
	function () {
		
        Route::resource('register','AksesController');
        Route::get('/login','AksesController@login');
        Route::post('/login','AksesController@postlogin')->name('login');
        Route::get('/akses/login', 'AksesController@logout')->name('logout');
        Route::get('/user_verify/{token}', 'AksesController@verifyUser');
    }
);


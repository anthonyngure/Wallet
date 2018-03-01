<?php
	
	use Illuminate\Http\Request;
	
	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	
	ob_start('ob_gzhandler');
	
	Route::middleware('auth:api')->get('/user', function (Request $request) {
		return $request->user();
	});
	
	
	Route::group(['prefix' => 'v1', 'guard' => 'api'], function () {
		
		Route::group(['prefix' => 'auth'], function () {
			Route::post('phoneSignIn', 'AuthController@phoneSignIn');
			Route::post('verification', 'AuthController@verification');
			Route::post('webSignIn', 'AuthController@webSignIn');
		});
		
		
		Route::resource('topUps', 'TopUpController');
		
		Route::group(['middleware' => 'auth:api'], function () {
			
			Route::post('auth/signOut', 'AuthController@signOut');
			Route::get('auth/user', 'AuthController@user');
			
			Route::resource('matatus', 'MatatuController');
			Route::resource('matatuTrips', 'MatatuTripController');
			
		});
		
	});



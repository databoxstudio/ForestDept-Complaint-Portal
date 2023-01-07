<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/***Routes For Auth */  
Route::post('/  ', 'Api\AuthController@register');
Route::post('/resend-otp', 'Api\AuthController@resendOTP');
Route::post('/verify-otp', 'Api\AuthController@verifyOTP');
Route::post('/login', 'Api\AuthController@login');
Route::post('/login-with-otp', 'Api\AuthController@loginWithOTP');
Route::post('/send-forgot-password-otp', 'Api\AuthController@SendForgotPasswordOTP');
Route::post('/verify-forgot-password-otp', 'Api\AuthController@verifyForgotPasswordOTP');
Route::post('/reset-password', 'Api\AuthController@resetPassword');
/***Routes For Auth */  

Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::get('logout', 'Api\AuthController@logout');
      Route::post('update-basic-details', 'Api\AgentController@updateBasicDetails');
	  Route::post('update-local-address', 'Api\AgentController@updateLocalAddressDetails');
	  Route::post('update-permanent-address', 'Api\AgentController@updatePermanentAddressDetails');
	  Route::post('update-kyc-aadhar', 'Api\AgentController@updateKycAadhar');
	  Route::post('update-kyc-driving-licence', 'Api\AgentController@updateKycDrivingLicence');
	  Route::post('update-kyc-pan', 'Api\AgentController@updateKycPan');
	  Route::post('update-bank-account', 'Api\AgentController@updateBankAccount');

	  Route::get('get-profile-updated-status', 'Api\AgentController@getProfileUpdatedStatus');

	 // Route::get('get-dropdowns', 'Api\CommonController@getDropdowns');
	  Route::any('get-user-data', 'Api\AuthController@getUser');

	  
  });
  Route::get('get-dropdowns', 'Api\CommonController@getDropdowns');
Route::prefix('supervisor')->middleware(['auth:api','is_supervisor'])->group(function () {
    Route::post('start-day', 'Api\SupervisorLogsController@startDay');
	Route::post('end-day', 'Api\SupervisorLogsController@endDay');

	Route::get('get-agent-list', 'Api\SupervisorLogsController@getAgentsList');
	Route::get('agent-view', 'Api\SupervisorLogsController@viewAgentDetails');
	Route::post('edit-delivery-type', 'Api\SupervisorLogsController@editDeliveryType');

	Route::post('deliverytypeselected', 'Api\SupervisorLogsController@deliverytypeselected');
	
	
});



Route::get('deliverytypeselected', 'Api\SupervisorLogsController@deliverytypeselected');

Route::get('get-agent-test', 'Api\SupervisorLogsController@getAgentsListTest');
Route::get('download_report_url', 'Api\SupervisorLogsController@downloadProfileDocument')->name('download_report_url');
Route::get('agent_idcard_url', 'Api\AgentLogsController@downloadIdCard')->name('agent_idcard_url');

Route::middleware(['auth:api','is_agent'])->group(function () {
    Route::post('start-day', 'Api\AgentLogsController@startDay');
	Route::post('end-day', 'Api\AgentLogsController@endDay');
	Route::post('update-packets', 'Api\AgentLogsController@updatePackets');
	Route::get('agent-download-document', 'Api\AgentLogsController@returnIdCardUrl');
});


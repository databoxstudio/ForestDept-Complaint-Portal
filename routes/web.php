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

    return redirect(route('login'));

});



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


/*

    UserModule

*/

Route::namespace('UsersModule')->prefix('UsersModule')->middleware(['auth'])->name('usersModule.')->group(function () {

    

     // UserModule         



     Route::get('/users','UsersController@index')->name('users');

     Route::get('/users/create','UsersController@create')->name('create');

     Route::post('/users/save','UsersController@save')->name('save');

     Route::get('/users/edit/{id}','UsersController@edit')->name('edit');

     Route::post('/users/update','UsersController@update')->name('update');

     

     Route::get('/users/editprofile','UsersController@editprofile')->name('editprofile');

     Route::post('/users/updateprofile','UsersController@updateprofile')->name('updateprofile');

     

     Route::get('/users/view/{id}','UsersController@view')->name('view');








         Route::get('/changePassword','UsersController@changePassword')->name('changePassword');

     Route::post('/changeAdminPassword','UsersController@changeAdminPassword')->name('changeAdminPassword');





      

  

});



/*

    agentsModule

*/

Route::namespace('StaffModule')->prefix('StaffModule')->middleware(['auth'])->name('staffModule.')->group(function () {

    

     // UserModule         



     Route::get('/staff','StaffController@index')->name('staff');

     Route::get('/staff/create','StaffController@create')->name('create');

     Route::post('/staff/save','StaffController@save')->name('save');

     Route::get('/staff/edit/{id}','StaffController@edit')->name('edit');

     Route::post('/staff/update','StaffController@update')->name('update');

     Route::get('/staff/view/{id}','StaffController@view')->name('view');
     

     Route::get('/staff/delete/{id}','StaffController@delete')->name('delete');

     

     Route::get('/staff/enable/{id}','StaffController@enable')->name('enable');
     Route::get('/staff/blacklist/{id}','StaffController@blacklist')->name('blacklist');





});



/*

    customers Module

*/

Route::namespace('CustomersModule')->prefix('CustomersModule')->middleware(['auth'])->name('customersModule.')->group(function () {

    

     // UserModule         



     Route::get('/customers','CustomerController@index')->name('customers');

     Route::get('/customers/create','CustomerController@create')->name('create');

     Route::post('/customers/save','CustomerController@save')->name('save');

     Route::get('/customers/edit/{id}','CustomerController@edit')->name('edit');

     Route::post('/customers/update','CustomerController@update')->name('update');

     Route::get('/customers/view/{id}','CustomerController@view')->name('view');

     Route::get('/customers/delete/{id}','CustomerController@delete')->name('delete');



});

/*

    complaints Module

*/

Route::namespace('ComplaintsModule')->prefix('ComplaintsModule')->middleware(['auth'])->name('complaintsModule.')->group(function () {

    

     // UserModule         



     Route::get('/complaints','ComplaintsController@index')->name('complaints');

     Route::get('/complaints/create','ComplaintsController@create')->name('create');

     Route::post('/complaints/save','ComplaintsController@save')->name('save');

     Route::get('/complaints/edit/{id}','ComplaintsController@edit')->name('edit');

     Route::post('/complaints/update','ComplaintsController@update')->name('update');

     Route::get('/complaints/view/{id}','ComplaintsController@view')->name('view');
     Route::get('/complaints/preview/{id}','ComplaintsController@preview')->name('preview');

     Route::get('/complaints/delete/{id}','ComplaintsController@delete')->name('delete');
     
      Route::get('/complaints/contactnumbers','ComplaintsController@contactnumbers')->name('contactnumbers');




});



Route::namespace('PrintModule')->prefix('PrintModule')->middleware(['auth'])->name('printModule.')->group(function () {


    Route::get('/getcomplaints','PrintController@index')->name('index');
Route::get('/prndetail/{id}','PrintController@prndetail')->name('prndetail');

});









Route::namespace('ForestareasModule')->prefix('ForestareasModule')->middleware(['auth'])->name('forestareasModule.')->group(function () {

        Route::get('/getforestarea/{id}','ForestareasController@getForestarea')->name('getforestarea');
});


Route::namespace('VillagesModule')->prefix('VillagesModule')->middleware(['auth'])->name('villagesModule.')->group(function () {

        Route::get('/getvillage/{id}','VillagesController@getVillage')->name('getvillage');
});



Route::get('changepassword', function() {
    $user = App\User::where('email', 'vishal133882@gmail.com')->first();
    $user->password = Hash::make('123456');
    $user->save();
 
    echo 'Password changed successfully.';
});


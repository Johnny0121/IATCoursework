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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Register routes with CRUD stubs
Route::resource('animals', 'AnimalController');
Route::resource('adoptionrequests', 'AdoptionRequestController');
Route::resource('users', 'UserController');
Route::resource('images', 'ImageController');

// Account views
//Route::get('/accounts/{role}', 'UserController@accountIndex');
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

// AdoptionRequest additional routes
Route::get('makerequest/{id}', 'AdoptionRequestController@makeadoptionrequest');
Route::post('adoptionrequest/{id}/approve', 'AdoptionRequestController@approveAdoptionRequest');
Route::post('adoptionrequest/{id}/reject', 'AdoptionRequestController@rejectAdoptionRequest');
// Route::get('adoptions', 'AdoptionRequestController@showAdoptions');

// Route::get('/adoptions', function(){
//
//   // Set up query - join 3 tables where adoption_requests is connecting entity (return empty cells also)
//   $query = "SELECT a.id AS animalid, a.name, a.animal, a.availability, ar.state, u.id AS userid, u.forename, u.surname
//   FROM adoption_requests AS ar
//   LEFT JOIN users AS u ON ar.userid = u.id
//   RIGHT JOIN animals AS a ON ar.animalid = a.id";
//
//   $data = DB::select($query);
//   // var_dump($data);
//   return view('adoptionrequests.adoption', compact('data'));
// });
Route::get('/adoptions', 'AdoptionRequestController@showAdoptions');

// Animal additional routes
Route::get('availableanimals', 'AnimalController@showAvailableAnimals')->name('animals.showAvailableAnimals');
Route::post('animals/filter', 'AnimalController@filterByType')->name('animals.filterByType');

// Image additional routes
Route::get('animal/{id}/newimage', 'ImageController@addNewImage')->name('animals.addNewImage');
Route::get('animal/imagelist', 'ImageController@removeImage');

// Miscellaneous views
Route::get('contact', function(){return view('contact');});
Route::get('tac', function(){return view('terms_and_conditions');});
Route::get('dataprotection', function(){return view('data_protection');});
Route::get('references', function(){return view('references');});

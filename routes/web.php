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
    return view('home');
});
Route::get('/hostel-facility', function () {
    return view('hostelFacility');
});
Route::get('/rules&regulation', function () {
    return view('rules');
});
Route::get('/notice', function () {
    return view('notice');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signin', 'UserController@signin');
Route::post('/signup', 'UserController@signup');

//student routes
Route::get('/student', 'studentController@home');
Route::get('/male-hostel', 'hostelController@maleHostel');
Route::get('/female-hostel', 'hostelController@femaleHostel');



//admin routes
Route::get('/admin', 'adminController@home');
Route::get('/approved-user', 'adminController@approvedUser');
Route::get('/approve-user', 'adminController@approveUser');
Route::get('/unapproved-user', 'adminController@unapprovedUser');


//super admin routes
Route::get('/superadmin', 'superAdminController@home');
Route::get('/admin-list', 'superAdminController@adminList');
Route::get('/add-admin', 'superAdminController@addAdmin');
Route::post('/add-admin', 'superAdminController@insertAdmin');
Route::post('/add-hostel', 'superAdminController@insertHostel');
Route::get('/hostel-list', 'superAdminController@hostelList');
Route::get('/add-hostel', 'superAdminController@addHostel');
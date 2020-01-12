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
Route::get('/canteen', function () {
    return view('canteen');
});
Route::get('/others', function () {
    return view('others');
});
Route::get('/entertainment', function () {
    return view('entertainment');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/mail', 'adminController@approveUser');

Route::post('/signin', 'UserController@signin');
Route::post('/signup', 'UserController@signup');

//student routes
Route::get('/student', 'studentController@home');
Route::get('/upload-receipt', 'studentController@uploadReceipt');
Route::get('/student-payment', 'studentController@paymentHistory');
Route::post('/upload-receipt', 'studentController@insertReceipt');


Route::get('/boys-hostel', 'hostelController@maleHostel');
Route::get('/girls-hostel', 'hostelController@femaleHostel');
Route::get('/apply', 'hostelController@apply');

Route::post('/apply', 'hostelController@insertApplication');



//admin routes
Route::get('/admin', 'adminController@home');
Route::get('/pending-payment', 'adminController@pendingPayment');
Route::get('/payment-history', 'adminController@paymentHistory');
Route::get('/approve-payment', 'adminController@approvePayment');
Route::get('/approved-user', 'adminController@approvedUser');
Route::get('/approve-application', 'adminController@approveUser');
Route::post('/approve-application', 'adminController@confirmApprove');
Route::post('/reject-application', 'adminController@reject');
Route::get('/unapproved-application', 'adminController@unapprovedUser');
Route::get('/approved-application', 'adminController@approvedUser');
Route::get('/rooms', 'adminController@roomList');
Route::get('/view-room', 'adminController@viewRoom');
Route::get('/cancel-book', 'adminController@cancelBook');
Route::post('/supervisor', 'adminController@supervisor');
Route::post('/registrar', 'adminController@registrar');
Route::get('/signatures', function(){
    return view('admin.signatures');
});

//super admin routes
Route::get('/superadmin', 'superAdminController@home');
Route::get('/admin-list', 'superAdminController@adminList');
Route::get('/add-admin', 'superAdminController@addAdmin');
Route::post('/add-admin', 'superAdminController@insertAdmin');
Route::post('/add-room', 'superAdminController@insertHostel');
Route::get('/room-list', 'superAdminController@hostelList');
Route::get('/add-room', 'superAdminController@addHostel');
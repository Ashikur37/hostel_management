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
Route::get('/notice', 'hostelController@notice');
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
Route::get('/logout', 'UserController@logout');
Route::post('/signup', 'UserController@signup');

//student routes
Route::get('/student', 'studentController@home');
Route::post('/update-image', 'studentController@updateImage');
Route::get('/update-student-message', 'studentController@updateMessage');
Route::get('/delete-student-message', 'studentController@deleteMessage');
Route::post('/leave-application', 'studentController@leaveApp');
Route::get('/change-password', 'studentController@changePassword');
Route::post('/change-password', 'studentController@updatePassword');
Route::get('/profile', 'studentController@profile');
Route::get('/upload-receipt', 'studentController@uploadReceipt');
Route::get('/upload-canteen-receipt', 'studentController@uploadCanteenReceipt');
Route::get('/student-payment', 'studentController@paymentHistory');
Route::get('/student-canteen-payment', 'studentController@canteenPaymentHistory');
Route::post('/upload-receipt', 'studentController@insertReceipt');
Route::post('/upload-canteen-receipt', 'studentController@insertCanteenReceipt');

Route::get('/student-message', 'studentController@message');
Route::get('/student-notice', 'studentController@notice');
Route::post('/student-message', 'studentController@insertMessage');

Route::get('/boys-hostel', 'hostelController@maleHostel');
Route::get('/girls-hostel', 'hostelController@femaleHostel');
Route::get('/apply', 'hostelController@apply');
Route::get('/check-number', 'UserController@checkNumber');

Route::post('/apply', 'hostelController@insertApplication');



//admin routes
Route::get('/admin', 'adminController@home');
Route::get('/due-payment', 'adminController@duePayment');
Route::get('/add-student-data', 'adminController@addStudentData');
Route::get('/student-data-list', 'adminController@studentData');
Route::get('/delete-student-data', 'adminController@deleteStudentData');
Route::post('/add-student-data', 'adminController@insertStudentData');


Route::get('/update-admin-message', 'adminController@updateMessage');
Route::get('/delete-admin-message', 'adminController@deleteMessage');
Route::get('/leave-list', 'adminController@leaveList');
Route::get('/approve-leave', 'adminController@approveLeave');
Route::post('/unapprove-leave', 'adminController@unapproveLeave');
Route::get('/add-notice', 'adminController@addNotice');
Route::post('/add-notice', 'adminController@insertNotice');
Route::get('/notice-list', 'adminController@noticeList');
Route::post('/add-room', 'adminController@insertHostel');
Route::get('/add-room', 'adminController@addHostel');
Route::get('/room-list', 'adminController@hostelList');
Route::get('/admin-message', 'adminController@message');
Route::get('/update-fine', 'adminController@updateFine');
Route::post('/admin-message', 'adminController@insertMessage');
Route::get('/admin-inbox', 'adminController@inbox');
Route::get('/pending-payment', 'adminController@pendingPayment');
Route::get('/payment-history', 'adminController@paymentHistory');
Route::get('/pending-payment-canteen', 'adminController@pendingPaymentCanteen');
Route::get('/payment-history-canteen', 'adminController@paymentHistoryCanteen');
Route::get('/approve-payment', 'adminController@approvePayment');
Route::get('/approve-payment-canteen', 'adminController@approvePaymentCanteen');
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
Route::get('/delete-admin', 'superAdminController@deleteAdmin');
Route::get('/add-admin', 'superAdminController@addAdmin');
Route::get('/edit-admin', 'superAdminController@editAdmin');
Route::post('/edit-admin', 'superAdminController@updateAdmin');
Route::get('/edit-admin', 'superAdminController@editAdmin');

Route::post('/add-admin', 'superAdminController@insertAdmin');



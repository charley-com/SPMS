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
    return redirect ()->route('studentsLogin');
});
Route::get('/test', function () {
    return view('test');
});

Route::group(['middleware' =>['protectedPages']], function(){
    Route::post('/profileUpdate', [App\Http\Controllers\StudentController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/addProjectTopic', [App\Http\Controllers\StudentController::class, 'addProjectTopic'])->name('addProjectTopic');
    Route::post('/addProjectTopic', [App\Http\Controllers\StudentController::class, 'ProjectTopic'])->name('ProjectTopic');
    Route::get('/addComplain', [App\Http\Controllers\StudentController::class, 'addComplain'])->name('addComplain');
    Route::post('/addComplain', [App\Http\Controllers\StudentController::class, 'complain'])->name('complain');
    Route::get('/createGroup', [App\Http\Controllers\StudentController::class, 'createGroup'])->name('createGroup');
    Route::post('/groupMember', [App\Http\Controllers\StudentController::class, 'groupMember'])->name('groupMember');
    Route::get('/studentHome', [App\Http\Controllers\StudentController::class, 'studentHome'])->name('studentHome');   
    Route::get('/studentProfile', [App\Http\Controllers\StudentController::class, 'studentProfile'])->name('studentProfile');
    Route::post('/noGroup', [App\Http\Controllers\StudentController::class, 'noGroup'])->name('noGroup');
    
    //Route::post('/updateProfile', [App\Http\Controllers\StudentController::class, 'updateProfile'])->name('updateProfile');
    
    Route::get('/uploadProject', [App\Http\Controllers\StudentController::class, 'uploadProject'])->name('uploadProject');
    Route::post('/uploadProject', [App\Http\Controllers\StudentController::class, 'uploadProjectFile'])->name('uploadProjectFile');
    Route::get('/viewApprovedTopic', [App\Http\Controllers\StudentController::class, 'viewApprovedTopic'])->name('viewApprovedTopic');
    Route::get('/studentArchive', [App\Http\Controllers\StudentController::class, 'studentArchive'])->name('studentArchive');   
    Route::resource('student', 'App\Http\Controllers\StudentsController');
    Route::get('/studentFullProfile', [App\Http\Controllers\StudentController::class, 'studentFullProfile'])->name('studentFullProfile');
});
    Route::get('/studentsLogin', [App\Http\Controllers\StudentsLoginController::class, 'studentsLogin'])->name('studentsLogin');
    Route::post('/login_student', [App\Http\Controllers\StudentController::class, 'login_student'])->name('login_student');

Route::group(['middleware' => ['adminProtectedPages']], function(){
    Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/addStaff', [App\Http\Controllers\AdminController::class, 'addStaff'])->name('addStaff');
    Route::get('/manageStaff', [App\Http\Controllers\AdminController::class, 'manageStaff'])->name('manageStaff');
    Route::post('/uploadStaff', [App\Http\Controllers\AdminController::class, 'uploadStaff'])->name('uploadStaff');

});

Route::group(['middleware' => ['staffProtectedPages']], function(){
    Route::get('/approveTopic', [App\Http\Controllers\StaffController::class, 'approveTopic'])->name('approveTopic');
    Route::post('/topicApprove', [App\Http\Controllers\StaffController::class, 'topicApprove'])->name('topicApprove');
    Route::get('/staffHome', [App\Http\Controllers\StaffController::class, 'staffHome'])->name('staffHome');
    Route::get('/staffProfile', [App\Http\Controllers\StaffController::class, 'staffProfile'])->name('staffProfile');
    Route::post('/staffProfile', [App\Http\Controllers\StaffController::class, 'update'])->name('update');
    Route::get('/staffComplain', [App\Http\Controllers\StaffController::class, 'staffComplain'])->name('staffComplain');
    Route::get('/staffProject', [App\Http\Controllers\StaffController::class, 'staffSubmission'])->name('staffSubmission');
    Route::get('/staffApproveGroup', [App\Http\Controllers\StaffController::class, 'approveGroup'])->name('approveGroup');
    Route::get('/staffStudent', [App\Http\Controllers\StaffController::class, 'staffStudent'])->name('staffStudent');
    Route::get('/staffArchive', [App\Http\Controllers\StaffController::class, 'staffArchive'])->name('staffArchive');
    Route::get('/groupMembers', [App\Http\Controllers\StaffController::class, 'groupMembers'])->name('groupMembers');
    Route::get('/topicSingle', [App\Http\Controllers\StaffController::class, 'topicSingle'])->name('topicSingle');
    Route::get('/staffFullProfile', [App\Http\Controllers\StaffController::class, 'staffFullProfile'])->name('staffFullProfile');
    Route::get('/projectGroupFullProfile', [App\Http\Controllers\StaffController::class, 'projectGroupFullProfile'])->name('projectGroupFullProfile');
    Route::post('/approve', [App\Http\Controllers\StaffController::class, 'approve'])->name('approve');

    Route::get('/hodHome', [App\Http\Controllers\HodController::class, 'hodHome'])->name('hodHome');
    Route::get('/hodComplain', [App\Http\Controllers\HodController::class, 'hodComplain'])->name('hodComplain');
    Route::get('/hodProject', [App\Http\Controllers\HodController::class, 'hodProject'])->name('hodProject');
    Route::get('/viewStaff', [App\Http\Controllers\HodController::class, 'viewStaff'])->name('viewStaff');
    Route::get('/hodStudent', [App\Http\Controllers\HodController::class, 'hodStudent'])->name('hodStudent');
    Route::get('/hodArchive', [App\Http\Controllers\HodController::class, 'hodArchive'])->name('hodArchive');
    Route::get('/hodViewGroup', [App\Http\Controllers\HodController::class, 'groupFullProfile'])->name('groupFullProfile');

    Route::get('/coordHome', [App\Http\Controllers\CoordinatorController::class, 'coordHome'])->name('coordHome');
    Route::get('/coordComplain', [App\Http\Controllers\CoordinatorController::class, 'coordComplain'])->name('coordComplain');
    Route::get('/coordProject', [App\Http\Controllers\CoordinatorController::class, 'coordProject'])->name('coordProject');
    Route::get('/coordStudent', [App\Http\Controllers\CoordinatorController::class, 'coordStudent'])->name('coordStudent');
    Route::get('/coordUploadStudent', [App\Http\Controllers\CoordinatorController::class, 'coordUploadStudent'])->name('coordUploadStudent');
    Route::post('/coordUploadStudent', [App\Http\Controllers\CoordinatorController::class, 'uploadStudent'])->name('uploadStudent');
    Route::get('/coordSupervisor', [App\Http\Controllers\CoordinatorController::class, 'coordSupervisor'])->name('coordSupervisor');
    Route::get('/coordArchive', [App\Http\Controllers\CoordinatorController::class, 'coordArchive'])->name('coordArchive');

});

    Route::get('/staffLogin', [App\Http\Controllers\StaffLoginController::class, 'staffLogin'])->name('staffLogin');
    Route::post('/login_staff', [App\Http\Controllers\StaffController::class, 'login_staff'])->name('login_staff');



Route::get('/adminLogin', [App\Http\Controllers\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
Route::post('/login_admin', [App\Http\Controllers\AdminController::class, 'login_admin'])->name('login_admin');


Route::get('/logoutAdmin', function(){
    if(session()->has('username')){
        session()->pull('username');
    }
    return redirect ('adminLogin');
});


Route::get('/logoutCoordinator', function(){
    if(session()->has('last_name')){
        session()->pull('last_name');
    }
    return redirect ('staffLogin');
});

Route::get('/logoutHod', function(){
    if(session()->has('last_name')){
        session()->pull('last_name');
    }
    return redirect ('staffLogin');
});

Route::get('/logoutStaff', function(){
    if(session()->has('last_name')){
        session()->pull('last_name');
    }
    return redirect ('staffLogin');
});
Route::get('/staffStudent/logoutStaff', function(){
    if(session()->has('last_name')){
        session()->pull('last_name');
    }
    return redirect ('staffLogin');
});

Route::get('/logoutStudent', function(){
    if(session()->has('last_name')){
        session()->pull('last_name');
    }
    return redirect ('studentsLogin');
});




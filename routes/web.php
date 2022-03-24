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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/StudentHome', [App\Http\Controllers\StudentHomeController::class, 'index'])->name('StudentHome');

Route::get('/GPSController', [App\Http\Controllers\GPSController::class, 'index'])->name('GPSControllerOut');
Route::post('/GPSController', [App\Http\Controllers\GPSController::class, 'index'])->name('GPSControllerIn');

Route::get('/AttendanceTotalStudent', [App\Http\Controllers\Attendance\AttendanceTotalStudent::class, 'index'])->name('AttendanceTotalStudent');
//Route::post('/AttendanceTotalStudent', [App\Http\Controllers\Attendance\AttendanceTotalStudent::class, 'index'])->name('AttendanceTotalStudentOut');

Route::get('/Attendance', [App\Http\Controllers\Attendance\AttendanceClassStudent::class, 'index'])->name('AttendanceClassStudentOut');
Route::post('/Attendance', [App\Http\Controllers\Attendance\AttendanceClassStudent::class, 'index'])->name('AttendanceClassStudentIn');

Route::get('/CurrentClass', [App\Http\Controllers\Attendance\ProfessorCurrentClass::class, 'index'])->name('ProfessorCurrentClass');
Route::post('/CurrentClass', [App\Http\Controllers\Attendance\ProfessorCurrentClass::class, 'index'])->name('ProfessorCurrentClassIn');

Route::get('/Edit', [App\Http\Controllers\Attendance\EditForwarder::class, 'index'])->name('EditForwarderOut');
Route::post('/Edit', [App\Http\Controllers\Attendance\EditForwarder::class, 'index'])->name('EditForwarderIn');

Route::get('/EditController', [App\Http\Controllers\Attendance\EditController::class, 'index'])->name('EditControllerOut');
Route::post('/EditController', [App\Http\Controllers\Attendance\EditController::class, 'index'])->name('EditControllerIn');

Route::get('/ClassList', [App\Http\Controllers\Attendance\ProfessorClassList::class, 'index'])->name('ProfessorClassList');

Route::get('/DateList', [App\Http\Controllers\Attendance\ProfessorDateList::class, 'index'])->name('ProfessorDateListOut');
Route::post('/DateList', [App\Http\Controllers\Attendance\ProfessorDateList::class, 'index'])->name('ProfessorDateListIn');

Route::get('/AttendanceView', [App\Http\Controllers\Attendance\AttendanceView::class, 'index'])->name('AttendanceViewOut');
Route::post('/AttendanceView', [App\Http\Controllers\Attendance\AttendanceView::class, 'index'])->name('AttendanceViewIn');

Route::get('/SetLocation', [App\Http\Controllers\Location\SetLocation::class, 'index'])->name('SetLocationOut');
Route::post('/SetLocation', [App\Http\Controllers\Location\SetLocation::class, 'index'])->name('SetLocationIn');

Route::get('/SetLocationForwarder', [App\Http\Controllers\Location\SetLocationForwarder::class, 'index'])->name('SetLocationForwarder');

Route::get('/LocationClassList', [App\Http\Controllers\Location\LocationClassList::class, 'index'])->name('LocationClassList');

Route::get('/LocationDateList', [App\Http\Controllers\Location\LocationDateList::class, 'index'])->name('LocationDateListOut');
Route::post('/LocationDateList', [App\Http\Controllers\Location\LocationDateList::class, 'index'])->name('LocationDateListIn');

Route::get('/DisplayPasscode', [App\Http\Controllers\DisplayPasscode::class, 'index'])->name('DisplayPasscode');

Route::get('/EnterPasscode', [App\Http\Controllers\EnterPasscode::class, 'index'])->name('EnterPasscode');
//Route::post('/GPSController', [App\Http\Controllers\EnterPasscode::class, 'index'])->name('EnterPasscodeIn');

Route::get('/PasscodeForwarder', [App\Http\Controllers\PasscodeForwarder::class, 'index'])->name('PasscodeForwarderOut');
Route::post('/PasscodeForwarder', [App\Http\Controllers\PasscodeForwarder::class, 'index'])->name('PasscodeForwarder');

Route::get('/VerifyPasscode', [App\Http\Controllers\VerifyPasscode::class, 'index'])->name('VerifyPasscodeOut');
Route::post('/VerifyPasscode', [App\Http\Controllers\VerifyPasscode::class, 'index'])->name('VerifyPasscode');
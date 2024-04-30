<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Notifications\CertificateApproved;
use App\Http\Controllers\BaptismController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'baptisms' => BaptismController::class,
    'marriages' => MarriageController::class,
    'reports' => ReportController::class,

]);

//pdf tryout
Route::get('/generate-pdf/{id}', [App\Http\Controllers\PdfController::class,'generatePdf'])->name('generate-pdf');
Route::get('/generatemarriage-pdf/{id}', [App\Http\Controllers\PdfController::class,'generatemarriagePdf'])->name('generatemarriage-pdf');

//route for approving baptism
Route::patch('/baptisms/{id}/approve', [BaptismController::class,'approve'])->name('baptisms.approve');

//route for approving marriage
Route::patch('/marriage/{id}/approve', [MarriageController::class, 'approve'])->name('marriages.approve');



// routes for reports page
Route::get('/baptism-report', [ReportController::class,'generateBaptismsReport'])->name('baptism-report');
Route::get('/marriage-report',  [ReportController::class,'generateMarriagesReport'])->name('marriage-report');
Route::get('/user-report',  [ReportController::class,'generateUsersReport'])->name('user-report');

//routes for pdfs
Route::get('/user-pdf',  [ReportController::class,'userpdf'])->name('user-pdf');
Route::get('/baptism-pdf',  [ReportController::class,'baptismpdf'])->name('baptism-pdf');
Route::get('/marriage-pdf',  [ReportController::class,'marriagepdf'])->name('marriage-pdf');


//routes for verifying the user 

// Define Custom Verification Routes
Route::controller(VerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});

// Define Custom User Registration & Login Routes
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'home')->name('home');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(VerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});
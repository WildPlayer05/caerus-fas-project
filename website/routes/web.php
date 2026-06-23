<?php

use App\Http\Controllers\MessageController;
use Illuminate\Http\Response;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierProfileController;
use App\Http\Controllers\MessageControllerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

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

// Basic Routes
Route::view('/', 'welcome')->name('welcome');
Route::view('/joinus', 'joinus' )->name('joinus');
Route::view('/ourvision', 'ourvision' )->name('ourvision');
Route::get('/product', [ContractController::class, 'list'] )->name('product');
Route::view('/aboutus', 'aboutus' )->name('aboutus');
Route::view('/websitemap', 'websitemap' )->name('websitemap');
//Route::view('/carbonfootprint', 'carbonFootprint' )->name('carbonFootprint');
Route::get('/carbonfootprint', [ContractController::class, 'footprint'] )->name('carbonFootprint');

Route::view('/acceptance', 'auth/acceptance' )->name('acceptance');

// Routes for Login/Logout/Signup/ForgottenPassword
Route::get('user/login', function () {
    return view('auth/login');
})->name('login');

Route::post('user/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('user/signup', function () {
    return view('auth/signup');
})->name('signup');

Route::get('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [\App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [\App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('user/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

Route::post('user/signup/private', [RegisterController::class, 'registerPrivate'])->name('signup.registerPrivate');
Route::post('user/signup/business', [RegisterController::class, 'registerBusiness'])->name('signup.registerBusiness');
Route::post('user/signup/supplier', [RegisterController::class, 'registerSupplier'])->name('signup.registerSupplier');

Route::get('user/signup/verify/{id}', [RegisterController::class, 'verifier'])->name('signup.verify');
Route::post('user/signup/verify', [RegisterController::class, 'verify'])->name('signup.verify.post');

//Route for Users
Route::middleware(['auth:web'])->group(function () {
    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('user/contract/{id}', [ContractController::class, 'index'])->name('user.contract');
    Route::get('user/contract/dismiss/{id}', [ContractController::class, 'dismissContract'])->name('user.contract.dismiss');
    Route::get('/user/stipulateContract/{id}', [ContractController::class, 'stipulateContract'])->name('user.stipulate');
    Route::get('user/payment', [\App\Http\Controllers\PaymentController::class, 'showPayment'])->name('payment.form');
    Route::post('user/process-payment', [\App\Http\Controllers\PaymentController::class, 'processPayment'])->name('user.payment');
    Route::post('/user/storeContract/{id}', [ContractController::class, 'storeContract'])->name('user.store');
    Route::resource('user/profile', \App\Http\Controllers\UserController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::get('user/contract/invoice/{id}', [ContractController::class, 'invoicePDF'])->name('user.invoice');
    Route::get('user/getMessages', [MessageController::class, 'getMessages'])->name('user.getMessages');
    Route::post('user/sendMessage', [MessageController::class, 'sendMessage'])->name('user.sendMessage');
});

// Routes for Suppliers
Route::middleware(['auth:supplier'])->group(function () {
    Route::get('supplier/dashboard', [SupplierController::class, 'overview'])->name('supplier.overview');
    Route::get('supplier/dashboard/payment', [SupplierController::class, 'managePayments'])->name('supplier.payment');
    Route::get('supplier/dashboard/manageContracts', [SupplierController::class, 'manageContracts'])->name('supplier.manage');
    Route::get('supplier/dashboard/createContract', [SupplierController::class, 'createContract'])->name('supplier.create');
    Route::post('supplier/dashboard/createContract/store', [SupplierController::class, 'storeContract'])->name('supplier.store');
    Route::get('supplier/dashboard/modifyContract/{id}', [SupplierController::class, 'editContract'])->name('supplier.edit');
    Route::post('supplier/dashboard/updateContract/{id}', [SupplierController::class, 'updateContract'])->name('supplier.update');
    Route::get('supplier/dashboard/deleteContract/{id}', [SupplierController::class, 'deleteContract'])->name('supplier.delete');

    Route::get('supplier/profile', [SupplierProfileController::class, 'index'])->name('supplier.profile');
    Route::post('supplier/profile/update', [SupplierProfileController::class, 'update'])->name('supplier.profile.update');
});

Route::get('chart', function () {
    return view('fatturaChart');
});

// Observability: endpoint di scraping in formato Prometheus (RED metrics).
// In produzione va protetto a livello di rete/reverse-proxy (non è dato pubblico applicativo).
Route::get('/metrics', [\App\Http\Controllers\MetricsController::class, 'index'])->name('metrics');

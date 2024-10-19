<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::prefix("user")->group(function () {

            Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [LoginController::class, 'login']);
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');

            // Registration Routes...
            Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('register', [RegisterController::class, 'register']);

            // Password Reset Routes...
            Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
            Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
            Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
            Route::post('password/reset', [ResetPasswordController::class, 'reset']);
        });
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard/user', [App\Http\Controllers\HomeController::class, 'index'])->name('ehab')->middleware('auth');
        // Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');



        // صفحة تسجيل الدخول

        // مسارات الإداريين
        Route::prefix('admin')->group(
            function () {

            // صفحة تسجيل الدخول
            Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');

            // معالجة تسجيل الدخول
            Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');

            // تسجيل الخروج

            Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
            Route::middleware(['auth:admins'])->group(function () {

                Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

            });
        }
        );
        Route::middleware(['auth:admins'])->group(function () {
            //########################Section Routes#########################\\
            Route::resource('section',SectionController::class);
            Route::resource('doctor', DoctorController::class);

        });

    }


);

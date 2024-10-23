<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    
    Route::get('login', [AuthenticationController::class, 'createLogin'])
                ->name('login');

    Route::post('login', [AuthenticationController::class, 'storeLogin']);

    Route::get('forgot-password', [AuthenticationController::class, 'createForgotPassword'])
                ->name('password.request');

    Route::post('forgot-password', [AuthenticationController::class, 'storeForgotPassword'])
                ->name('password.email');

    Route::get('reset-password/{token}', [AuthenticationController::class, 'createResetPassword'])
                ->name('password.reset');

    Route::post('reset-password', [AuthenticationController::class, 'storeResetPassword'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::get('register', [AuthenticationController::class, 'createRegister'])->name('register');    
    Route::post('register', [AuthenticationController::class, 'storeRegister']);
    Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');

    Route::get('/', [HomeController::class, 'create'])->name('admin.index');

    Route::get('/profile', [UserController::class, 'create'])->name('admin.profile-edit');
    Route::post('/profile-image', [UserController::class, 'storeProfileImage'])->name('update-image');
    Route::post('/profile-info', [UserController::class, 'storeProfileInfo'])->name('update-info');
    Route::post('/profile-password', [UserController::class, 'storePassword'])->name('update-password');

    Route::get('/users', [UserController::class, 'createUsers'])->name('admin.users');
    Route::post('/users', [UserController::class, 'storeUser'])->name('admin.add.users');
    Route::get('/users/delete/{user:id}', [UserController::class, 'deleteUsers'])->name('admin.user.delete');
    Route::get('/users/update/{user:id}', [UserController::class, 'createUpdateUsers'])->name('admin.user.update');
    Route::post('/users/update-info', [UserController::class, 'updateUsers'])->name('admin.user.update.info');
    Route::post('/users/update-image', [UserController::class, 'updateUsersImage'])->name('admin.user.update.image');
    Route::post('/users/update-password', [UserController::class, 'updateUserPassword'])->name('admin.user.update.password');

    Route::get('/upload-books', [BookController::class, 'createBook'])->name('admin.upload');
    Route::post('/upload-books', [BookController::class, 'storeBook'])->name('admin.upload.store');

    Route::get('/settings/company-info', [SettingsController::class, 'createCompanyInfo'])->name('admin.settings.company.info');
    Route::post('/settings/company-info', [SettingsController::class, 'storeCompanyInfo'])->name('admin.settings.company.info.update');
    Route::get('/settings/company-logo', [SettingsController::class, 'createCompanyLogo'])->name('admin.settings.company.logo');
    Route::post('/settings/company-logo-1', [SettingsController::class, 'storeCompanyLogo1'])->name('admin.settings.company.logo-1.update');
    Route::post('/settings/company-logo-2', [SettingsController::class, 'storeCompanyLogo2'])->name('admin.settings.company.logo-2.update');
    Route::get('/settings/social-media-handles', [SettingsController::class, 'createSocailMediaHandles'])->name('admin.settings.company.socials');
    Route::post('/settings/social-media-handles', [SettingsController::class, 'storeSocailMediaHandles'])->name('admin.settings.company.socials.update');
    Route::get('/settings/smtp-configuration', [SettingsController::class, 'createSMTPConfig'])->name('admin.settings.company.smtp');
    Route::post('/settings/smtp-configuration', [SettingsController::class, 'storeSMTPConfig'])->name('admin.settings.company.smtp.update');

});
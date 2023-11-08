<?php

use App\Http\Controllers\Administrator\BorrowingController;
use App\Http\Controllers\Administrator\BorrowingHistoryController;
use App\Http\Controllers\Administrator\BorrowingReportController;
use App\Http\Controllers\Administrator\BorrowingReportPrintController;
use App\Http\Controllers\Administrator\ItemController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProfileSettingController;
use App\Http\Controllers\Administrator\ProgramStudyController;
use App\Http\Controllers\Administrator\SchoolClassController;
use App\Http\Controllers\Administrator\StudentController;
use App\Http\Controllers\Administrator\SubjectController;
use App\Http\Controllers\Administrator\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:administrator')->name('administrators.')->prefix('administrator')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('items', ItemController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::resource('program-studies', ProgramStudyController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::resource('subjects', SubjectController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::resource('students', StudentController::class)->except(
        'create',
        'show',
        'edit'
    );

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/report', [BorrowingReportController::class, 'index'])->name('borrowings-report.index');
    Route::get('/borrowings/validate/{borrowing}',[BorrowingController::class, 'validateBorrowing'])->name('borrowings.validate');

    Route::controller(ProfileSettingController::class)->group(function () {
        Route::get('/profile/settings', 'index')->name('profile-settings.index');
        Route::put('/profile/settings', 'update')->name('profile-settings.update');
    });

    Route::get('/borrowings/report/print/{start_date}/{end_date}', [BorrowingReportPrintController::class, 'print'])->name('borrowings-report.print');
});

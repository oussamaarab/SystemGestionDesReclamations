<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReclamationController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'permission:view_dashboard'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::middleware(['permission:manage_divisions'])->group(function () {
        Route::resource('divisions', DivisionController::class);
    });

    Route::middleware(['permission:manage_services'])->group(function () {
        Route::resource('services', ServiceController::class);
    });

    Route::middleware(['permission:view_own_service'])->group(function () {
        Route::get('/my-service', [ServiceController::class, 'myService'])
            ->name('services.my');
    });

    Route::middleware(['permission:manage_users'])->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware(['permission:view_reclamations'])->group(function () {
        Route::get('/reclamations', [ReclamationController::class, 'index'])
            ->name('reclamations.index');
    });

    Route::middleware(['permission:create_reclamations'])->group(function () {
        Route::get('/reclamations/create', [ReclamationController::class, 'create'])
            ->name('reclamations.create');

        Route::post('/reclamations', [ReclamationController::class, 'store'])
            ->name('reclamations.store');
    });

    Route::middleware(['permission:assign_reclamations'])->group(function () {
        Route::get('/reclamations/{reclamation}/assign', [ReclamationController::class, 'assignForm'])
            ->name('reclamations.assign');

        Route::post('/reclamations/{reclamation}/assign', [ReclamationController::class, 'assignStore'])
            ->name('reclamations.assign.store');
    });

    Route::middleware(['permission:transfer_reclamations'])->group(function () {
        Route::get('/reclamations/{reclamation}/transfer', [ReclamationController::class, 'transferForm'])
            ->name('reclamations.transfer');

        Route::post('/reclamations/{reclamation}/transfer', [ReclamationController::class, 'transferStore'])
            ->name('reclamations.transfer.store');
    });

    Route::middleware(['permission:respond_reclamations'])->group(function () {
        Route::get('/reclamations/{reclamation}/response', [ReclamationController::class, 'responseForm'])
            ->name('reclamations.response');

        Route::post('/reclamations/{reclamation}/response', [ReclamationController::class, 'responseStore'])
            ->name('reclamations.response.store');
    });

    Route::middleware(['permission:view_reclamations'])->group(function () {
        Route::get('/reclamations/{reclamation}', [ReclamationController::class, 'show'])
            ->name('reclamations.show');
    });
});

require __DIR__ . '/auth.php';
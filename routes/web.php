<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Students
Route::prefix('student-management')->group(function () {
    // Route::get('list', [StudentListController::class, 'view'])->name('student-management.list');
     Route::get('applications', [\App\Http\Controllers\ApplicationsController::class, 'index'])->name('student-management.applications');
    // Route::get('enrolments', [EnrolmentsController::class, 'view'])->name('student-management.enrolments');
});
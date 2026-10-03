<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/candidature', [CandidateController::class, 'create'])
    ->name('candidates.create');
Route::post('/candidature', [CandidateController::class, 'store'])
    ->name('candidates.store');
Route::get('/candidature/success', [CandidateController::class, 'success'])
    ->name('candidates.success');
/*
|--------------------------------------------------------------------------
| Authentification recruteur
|--------------------------------------------------------------------------
*/
Route::get('/login', [AdminAuthController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])
    ->name('login.store');
Route::post('/logout', [AdminAuthController::class, 'logout'])
    ->name('logout');
/*
|--------------------------------------------------------------------------
| Dashboard recruteur
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/dashboard/candidatures/{application}', [DashboardController::class, 'show'])
        ->name('dashboard.show');
    Route::get(
    '/dashboard/candidatures/{application}/cv',
    [DashboardController::class, 'downloadCv']
)->name('dashboard.cv');
    Route::patch(
        '/dashboard/candidatures/{application}/status',
        [DashboardController::class, 'updateStatus']
    )->name('dashboard.status');
});
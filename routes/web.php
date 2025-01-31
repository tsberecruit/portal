<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\CandidateExperienceController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('get-state/{country_id}', [LocationController::class, 'getStates'])->name('get-states');
Route::get('get-cities/{state_id}', [LocationController::class, 'getCities'])->name('get-cities');

/** Candidates Dashboard Routes */
Route::group([
                'Middleware' => ['auth', 'verified', 'user.role:candidate'],
                'prefix' => 'candidate',
                'as' => 'candidate.'
            ],
            function(){
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/basic-info-update', [CandidateProfileController::class, 'basicInfoUpdate'])->name('profile.basic-info.update');
    Route::post('/profile/profile-info-update', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.profile-info.update');
    Route::resource('experience', CandidateExperienceController::class);
});

/** Company Dashboard Routes */
Route::group([
    'Middleware' => ['auth', 'verified', 'user.role:company'],
    'prefix' => 'company',
    'as' => 'company.'
],
function(){
    /**Dashbard */
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');
    /** Company Prfiel Rutes */
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.company-info');
    Route::post('/profile/founding-info', [CompanyProfileController::class, 'updateFoundingInfo'])->name('profile.founding-info');
    Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
    Route::post('/profile/password-update', [CompanyProfileController::class, 'updatePassword'])->name('profile.password-update');
});



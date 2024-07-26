<?php


use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('work',WorkController::class);
    Route::get('/application/create/{work}', [JobApplicationController::class, 'create'])->name('Application.create');
    Route::resource('Application',JobApplicationController::class)->except(['create']);
    Route::get('manage-applications/{id}',[WorkController::class,'manageApplications'])->name('manageApplications');
    Route::get('cv/{cv}',[WorkController::class,'downloadCv'])->name('download');
});
require __DIR__.'/auth.php';

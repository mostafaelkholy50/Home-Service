<?php

use App\Models\Our_Provider;
use App\Models\our_service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OurProviderController;

Route::get('/', function () {
    $providers = Our_Provider::with(['user', 'service'])->latest()->get();

    $services = our_service::all();
    return view('welcome', compact('providers','services'));
})->name('home');

Route::get('/dashboard', function () {
 // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Get the provider data associated with the authenticated user
            // We use first() because we assume one user has one provider entry
            $provider = Our_Provider::where('user_id', $user->id)->with('service')->first();

            // Return the view and pass the provider data to it
            return view('dashboard', compact('user', 'provider'));
        }})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/provider/add-service', [OurProviderController::class, 'createServiceForm'])->name('provider.create-service');
    Route::post('/provider/add-service', [OurProviderController::class, 'storeService'])->name('provider.store-service');
});

Route::get('/AllService', [OurProviderController::class, 'AllService'])->name(name: 'provider.AllService');
Route::get('/service', [OurProviderController::class, 'Service']);
Route::get('/provider', [OurProviderController::class, 'provider'])->name('provider.show');

require __DIR__.'/auth.php';

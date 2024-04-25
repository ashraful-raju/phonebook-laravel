<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'totalContacts' => Contact::count()
        ]);
    })->name('dashboard');

    Route::resource('contacts', ContactController::class);

    Route::resource('contacts.detail', DetailController::class)->only([
        'store', 'update', 'destroy'
    ])->scoped();

    Route::resource('contacts.address', AddressController::class)->only([
        'store', 'update', 'destroy'
    ])->scoped();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::any('/test', function (\Illuminate\Http\Request $request) {
    return response()->json(Contact::all()->toArray());
});

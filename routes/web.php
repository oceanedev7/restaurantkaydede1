<?php

use App\Http\Middleware\Role;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ListClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.user.home');
})->name('accueil');

Route::get('/contact', function () {
    return view('pages.user.contact');
})->name('contactez-nous');

Route::get('/notrecarte', [ProductViewController::class, 'index'])->name('notrecarte');
Route::get('/produit/{id}', [ProductViewController::class, 'show'])->name('produit');
Route::post('/demandedecontact', [ContactController::class, 'create'])->name('contact');

Route::get('/reserver', function () {
    return view('pages.user.reserver');
})->name('reserverView');

Route::post('/reserver', [ReservationController::class, 'create'])->name('reserver');

Route::get('/authentification', function () {
    return view('auth.authentification');
})->name('authentification');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/nouvellereservation', [ReservationController::class, 'index'])->name('newresa');
Route::get('/addproduct', [AddProductController::class, 'index'])->name('afficherProduit');
Route::post('/createproduct', [AddProductController::class, 'create'])->name('ajouterProduit');
Route::get('/deleteproduct/{id}', [AddProductController::class, 'destroy'])->name('supprimerProduit');
Route::get('/editproduct/{id}', [AddProductController::class, 'edit'])->name('editProduit');
Route::post('/updateproduct/{id}', [AddProductController::class, 'update'])->name('updateProduit');
Route::get('/demandecontact', [ContactController::class, 'index'])->name('afficherContact');
Route::get('/deletecontact/{id}', [ContactController::class, 'destroy'])->name('supprimerContact');
Route::get('/listeclients', [ListClientController::class, 'index'])->name('afficherClients');
});

Route::middleware(['auth', 'role:user'])->group(function () {
Route::get('/commanderenligne', [CommandeController::class, 'index'])->name('commande');

});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TypeController;



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





/* Link Pagine Home */
Route::get('/', [PublicController::class, 'home'])->name('Home');




/* Link Pagina About Us */
Route::get('/Chi-Siamo', [PublicController::class, 'aboutUs'])->name('AboutUs');

Route::get('/Chi-Siamo/dettagli/{name}', [PublicController::class, 'aboutUsDetails'])->name('AboutUsDetails');




/* Link Pagina Contatti */
Route::get('/Contatti', function() {
    return view('Contacts');
})->name('Contacts');




/* Link Pagina Servizi */
Route::get('/Servizi', [ServicesController::class, 'servicesList'])->name('services.ServicesList');

Route::get('/Servizi/dettagli/{computer}', [ServicesController::class, 'servicesDetails'])->name('services.ServicesDetails');

Route::get('/Servizi/modifica/{computer}', [ServicesController::class, 'servicesModify'])->name('services.ServicesModify');

Route::put('/Servizi/aggiorna/{computer}', [ServicesController::class, 'servicesUpdate'])->name('services.ServicesUpdate');

Route::delete('/Servizi/cancellazione/{computer}', [ServicesController::class, 'servicesDelete'])->name('services.ServicesDelete');




/* Invio Email */
Route::post('/ContattiEmail', [PublicController::class, 'contattiEmail'])->name('email.contattiEmail');





/* Inserimento prodotto dall'utente */
Route::get('/CreazioneProdotto', [ServicesController::class, 'servicesCreation'])->name('services.ServicesCreation');




/* Invio feedback una volta completato il prodotto */
Route::post('/CreazioneProdottoSubmit', [ServicesController::class, 'storeData'])->name('services.Submit');




// Profilo Utente
Route::get('/Utente/Profilo', [PublicController::class, 'profilo'])->name('user.Profilo');




// Type of Services
Route::get('/Tipologie/creazione', [TypeController::class, 'typesCreate'])->name('type.Create');
Route::post('/Tipologie/creazione/submit', [TypeController::class, 'typesStore'])->name('type.Submit');
route::get('/Tipologie/index', [TypeController::class, 'typesIndex'])->name('type.Index');
Route::get('/Tipologie/list/{type}', [TypeController::class, 'typesList'])->name('type.List');




// Post Route for testing
Route::get('/Posts', [PublicController::class, 'Posts'])->name('Posts');
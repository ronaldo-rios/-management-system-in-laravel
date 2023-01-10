<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProviderController;
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

Route::get('/', [MainController::class, 'main'])->name('site.index');
Route::get('/sobre-nos', [AboutController::class, 'about'])->name('site.about');
Route::get('/contato', [ContactController::class, 'contact'])->name('site.contact');
Route::post('/contato', [ContactController::class, 'saveContact'])->name('site.contact');
Route::get('/login', [ContactController::class, 'signIn'])->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'showClients';})->name('app.clients');
    Route::get('/fornecedores', [ProviderController::class, 'index'])->name('app.providers');
    Route::get('/produtos', function(){ return 'showProducts';})->name('app.products');
});

//contingency route or alternative router in case the user accesses a non-existing route:
Route::fallback( function() {
    echo ("Rota acessada não existe.<a href='/'> Clique aqui</a> para voltar à página inicial");
});
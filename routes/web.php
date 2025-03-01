<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\UserController;

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
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'signIn'])->name('site.login');

Route::middleware('auth')->prefix('/app')->group(function(){
    Route::resource('usuario', UserController::class)->middleware('is_admin');
    Route::get('/home', [HomeController::class, 'homeIndex'])->name('app.home');
    Route::get('/logout', [LoginController::class, 'logOut'])->name('app.logout');
    Route::get('/fornecedor', [ProviderController::class, 'index'])->name('app.providers');
    Route::get('/fornecedor/editar/{id}/{msg?}', [ProviderController::class, 'updateProvider'])->name('app.providers.update');
    Route::get('/fornecedor/deletar/{id}', [ProviderController::class, 'destroyProvider'])->name('app.providers.destroy');
    Route::post('/fornecedor/listar', [ProviderController::class, 'listProvider'])->name('app.providers.list');
    Route::get('/fornecedor/listar/{msg?}', [ProviderController::class, 'listProvider'])->name('app.providers.list');
    Route::get('/fornecedor/add', [ProviderController::class, 'addProvider'])->name('app.providers.add');
    Route::post('/fornecedor/add', [ProviderController::class, 'addProvider'])->name('app.providers.add.post');
    Route::resource('product', ProductController::class);
    Route::resource('produto-detalhe', ProductDetailController::class);
    Route::resource('cliente', ClientController::class);
    Route::resource('pedido', OrderController::class);
    Route::get('pedido-produto/create/{order}', [ProductOrderController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{order}', [ProductOrderController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{product_order}/{order_id}', [ProductOrderController::class, 'destroy'])->name('pedido-produto.destroy');
    

});

//contingency route or alternative router in case the user accesses a non-existing route:
Route::fallback( function() {
    echo ("Rota acessada não existe.<a href='/'> Clique aqui</a> para voltar à página inicial");
});
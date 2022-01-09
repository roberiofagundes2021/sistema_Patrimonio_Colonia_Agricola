<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; 
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\PrevisaoEntregarController;
use App\Http\Controllers\ReservaController;

use App\Http\Controllers\SalaController;
use App\Http\Controllers\TesteController;


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
    return view('welcome');
});


Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');





Route::get('/index/usuarios',[UsuarioController::class,'index'])->name('usuario.index');

Route::post('/create/usuarios',[UsuarioController::class,'create'])->name('usuario.create');

Route::get('/create/usuarios',[UsuarioController::class,'create'])->name('usuario.create');

Route::post('/storeusuarios',[UsuarioController::class,'store'])->name('usuario.store');

Route::post('/usuarios/edit/{id}',[UsuarioController::class,'edit'])->name('usuario.edit');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuario.delete');



Route::get('/index/sala',[SalaController::class,'index'])->name('sala.index');

Route::post('/create/sala',[SalaController::class,'create'])->name('sala.create');

Route::get('/create/sala',[SalaController::class,'create'])->name('sala.create');

Route::post('/storesala',[SalaController::class,'store'])->name('sala.store');

Route::post('/sala/edit/{id}',[SalaController::class,'edit'])->name('sala.edit');
Route::put('/sala/edit/{id}',[SalaController::class,'edit'])->name('sala.edit');
Route::delete('/sala/{id}',[SalaController::class, 'destroy'])->name('sala.delete');




Route::get('/index/testes',[TesteController::class,'index'])->name('testes.index');

Route::post('/create/testes',[TesteController::class,'create'])->name('testes.create');

Route::get('/create/testes',[TesteController::class,'create'])->name('testes.create');

Route::post('/storetestes',[TesteController::class,'store'])->name('testes.store');

Route::post('/testes/edit/{id}',[TesteController::class,'edit'])->name('testes.edit');
Route::delete('/testes/{id}',[TesteController::class, 'destroy'])->name('teste.delete');






Route::get('/index/reservas',[ReservaController::class,'index'])->name('reservas.index');

Route::post('/create/reservas',[ReservaController::class,'create'])->name('testes.reservas');

Route::get('/create/reservas',[ReservaController::class,'create'])->name('reservas.create');

Route::post('/storereservas',[ReservaController::class,'store'])->name('reservas.store');

Route::post('/reservas/edit/{id}',[ReservaController::class,'edit'])->name('reservas.edit');
Route::delete('/reservas/{id}',[ReservaController::class, 'destroy'])->name('reserva.delete');







Route::get('/index/previsaoentregar',[PrevisaoEntregarController::class,'index'])->name('previsaoentregar.index');

Route::post('/create/previsaoentregar',[PrevisaoEntregarController::class,'create'])->name('previsaoentregar.reservas');

Route::get('/create/previsaoentregar',[PrevisaoEntregarController::class,'create'])->name('previsaoentregar.create');

Route::post('/storeprevisaoentregar',[PrevisaoEntregarController::class,'store'])->name('previsaoentregar.store');

Route::post('/previsaoentregar/edit/{id}',[PrevisaoEntregarController::class,'edit'])->name('previsaoentregar.edit');

Route::delete('/previsaoentregar/{id}',[PrevisaoEntregarController::class, 'destroy'])->name('previsaoentregar.delete');





Route::get('/index/patrimonio',[PatrimonioController::class,'index'])->name('patrimonio.index');

Route::post('/create/patrimonio',[PatrimonioController::class,'create'])->name('patrimonio.reservas');

Route::get('/create/patrimonio',[PatrimonioController::class,'create'])->name('patrimonio.create');

Route::post('/storepatrimonio',[PatrimonioController::class,'store'])->name('patrimonio.store');

Route::post('/patrimonio/edit/{id}',[PatrimonioController::class,'edit'])->name('patrimonio.edit');
Route::put('/patrimonio/edit/{id}',[PatrimonioController::class,'edit'])->name('patrimonio.edit');

Route::delete('/patrimonio/{id}',[PatrimonioController::class, 'destroy'])->name('patrimonio.delete');





Route::get('/index/manutencao',[ManutencaoController::class,'index'])->name('manutencao.index');

Route::post('/create/manutencao',[ManutencaoController::class,'create'])->name('manutencao.reservas');

Route::get('/create/manutencao',[ManutencaoController::class,'create'])->name('manutencao.create');

Route::post('/storemanutencao',[ManutencaoController::class,'store'])->name('manutencao.store');

Route::post('/manutencao/edit/{id}',[ManutencaoController::class,'edit'])->name('manutencao.edit');
Route::delete('/manutencao/{id}',[ManutencaoController::class, 'destroy'])->name('manutencao.delete');








Route::get('/index/evento',[EventoController::class,'index'])->name('evento.index');

Route::post('/create/evento',[EventoController::class,'create'])->name('evento.create');

Route::get('/create/evento',[EventoController::class,'create'])->name('evento.create');

Route::post('/storeevento',[EventoController::class,'store'])->name('evento.store');

Route::post('/evento/edit/{id}',[EventoController::class,'edit'])->name('evento.edit');

Route::put('/evento/edit/{id}',[EventoController::class,'edit'])->name('evento.edit');

Route::delete('/evento/{id}',[EventoController::class, 'destroy'])->name('evento.delete');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas para solo auntenccados
    Route::get('/eventos', [EventoController::class, 'index'])->middleware(['auth', 'verified'])->name('eventos');
    Route::get('/eventos/{evento}/detalle', [EventoController::class, 'show2']);
    Route::post('/evento/user/storeweb', [EventoController::class, 'storeWeb']);
    Route::get('/evento/{evento}/user/{user}/del', [EventoController::class, 'borrarUserWeb']);
    //buscar
    Route::post('/evento/buscar/fecha', [EventoController::class, 'buscarFecha']);
    Route::post('/evento/buscar/ciudad', [EventoController::class, 'buscarCiudad']);
    Route::post('/evento/buscar/categoria', [EventoController::class, 'buscarCategoria']);


});


//Solo si eres admin y estás autenticado
Route::middleware(['auth', 'rol:admin'])->group(function () {
    //Rutas protegidas para admin
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard', [EventoController::class , 'indexAdmin'])->middleware(['auth', 'verified'])->name('dashboard');
    //borra un evento
    Route::get('/evento/{evento}/borrar', [EventoController::class, 'destroy']);
    //envia informacion de de un formulario para crear un evento
    Route::get('/evento/nuevo', [EventoController::class, 'create']);
    //crea el evento enviado por el formuario
    Route::post('/evento/store', [EventoController::class, 'store']);
    //envia a ver el detalle de un evento segun el id
    Route::get('/evento/{evento}/detalle', [EventoController::class, 'show']);
    //borra un usuario del evento segun el vento en que se a inscrito y la id del usuario
    Route::get('/evento/{evento}/user/{user}/borrar', [EventoController::class, 'borrarUser']);
    //inscribe  aun usario segun el evento y el ide del usuario
    Route::get('/evento/{evento}/user/{user}/incribir', [EventoController::class, 'create2']);
    //inserta al usuario en el evento
    Route::post('/evento/user/store', [EventoController::class, 'store2']);

    //busqueda
    Route::post('/evento/fecha', [EventoController::class, 'buscarFecha']);
    Route::post('/evento/ciudad', [EventoController::class, 'buscarCiudad']);
    Route::post('/evento/categoria', [EventoController::class, 'buscarCategoria']);

    //modifica el evento determinado
    Route::post('/evento/{evento}/update', [EventoController::class, 'update']);




});

//Solo si eres creador de ventos y estás autenticado
Route::middleware(['auth', 'rol:creadoreve'])->group(function () {
    //Rutas protegidas para admin
    //Route::get('/creadorEventos', [EventoController::class, 'indexCreador']);
    //Route::get('/dashboard', [EventoController::class , 'indexAdmin'])->middleware(['auth', 'verified'])->name('dashboard');
});

//rutas solo para web sin  autenticar
Route::get('/eventos', [EventoController::class, 'index']);

require __DIR__.'/auth.php';

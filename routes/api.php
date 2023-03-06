<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AsistenteResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\EventoResource;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





//todas las inscrpciones del evento en cuestion
// Route::get('/eventia/asistente/{dni}/inscripciones',  function ($dni) {
//     $equipos = Equipo::where('modalidad',1)->get();
//     foreach($equipos as $equipo){
//         $jugadores = $equipo->componentes()->get();
//     }
//     return new EventoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
// });
// Route::get('equipos/1',  function () {
//     $equipos = Equipo::where('modalidad',1)->get();
//     foreach($equipos as $equipo){
//         $jugadores = $equipo->componentes()->get();
//     }
//     return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
// });

Route::middleware('auth:sanctum')->group(function () {

    //todos los evntos
    Route::get('/eventia/evento',  function () {
        return new EventoResource(Evento::all());
    });

    //solo un evento
    Route::get('/eventia/evento/{id}',  function ($id) {
        return new EventoResource(Evento::findOrFail($id));
    });

    //todas las categorias
    Route::get('/eventia/categoria',  function () {
        return new CategoriaResource(Categoria::all());
    });

    //todos los usuarios
    Route::get('/eventia/asistente',  function () {
        return new UserResource(User::all());
    });

    //solo un usuario
    Route::get('/eventia/asistente/{dni}',  function ($dni) {
        return new UserResource(User::where("dni", $dni)->first());
    });
    //ver todas las inscripciones
    Route::get('/eventia/evento/{id}/inscripciones',  function ($id) {
        return new EventoResource(Evento::findOrFail($id)->usuarios()->get());
    });

    //borra el evento yy sus inscripciones
    Route::delete('/eventia/evento/{id}',  function ($id) {
        return new EventoResource(Evento::findOrFail($id));
    });
});

//CREAR TOKEN
Route::post('/tokens/create', function (Request $request) {
  
    $user = User::where('email', $request->email)->first();
  
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Usuario o contraseña incorrectos']);
        /*
        throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.'],
        ]);
        */
    }

    $token = $user->createToken($request->email);
 
    return response()->json(['token' => $token->plainTextToken]);
});
<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asistente.eventos', ['eventos' => Evento::paginate(8), 'categorias' => Categoria::all()]);
    }

    public function indexAdmin()
    {
        return view('admin.eventos', ['eventos' => Evento::all(), 'categorias' => Categoria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formNuevoEvento', ['categorias' => Categoria::all()]);
    }

    public function create2(Evento $evento)
    {
        return view('admin.formAddUser', ['evento' => $evento]);
    }
    public function createWeb(Evento $evento)
    {
        return view('asistente.formAddUser', ['evento' => $evento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();

        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->descripcion = $request->input('descripcion');
        $evento->ciudad = $request->input('ciudad');
        $evento->direccion = $request->input('direccion');
        $evento->aforomax = $request->input('aforomax');
        $evento->tipo = $request->input('tipo');
        $evento->numMaxEntradas = $request->input('numMaxEntradas');

        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $evento->imagen =  str_replace('public', 'storage', $path);

        $evento->categoria_id = $request->input('categoria_id');
        $evento->user_id = $request->input('user_id');

        $evento->save();
        return redirect()->intended('/dashboard');
    }

    public function store2(Request $request)
    {
        $evento = new Evento();
        $user = new User();
        $evento->id = $request->input('evento_id');
        $user->id = $request->input('user_id');

        $numEntradas = $request->input('numEntradas');
        $estado = $request->input('estado');
        if ($evento->usuarios()->where('user_id', $user->id)->get()->count() == 0) {
            $evento->usuarios()->attach($user->id, ['numEntradas' => $numEntradas, 'estado' => $estado]);
        }

        return view('admin.eventoDetalle', ['eventos' => $evento, 'usuarios' => $evento->usuarios()->get()]);
    }
    public function storeWeb(Request $request)
    {
        $evento = new Evento();
        $user = new User();
        $evento->id = $request->input('evento_id');
        $user->id = $request->input('user_id');

        $numEntradas = $request->input('numEntradas');
        $estado = $request->input('estado');
        if ($evento->usuarios()->where('user_id', $user->id)->get()->count() == 0) {
            $evento->usuarios()->attach($user->id, ['numEntradas' => $numEntradas, 'estado' => $estado]);
        }


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('admin.eventoDetalle', ['eventos' => $evento, 'usuarios' => $evento->usuarios()->get()]);
    }
    public function show2(Evento $evento)
    {
        return view('asistente.eventoDetalle', ['categorias' => Categoria::all(), 'eventos' => $evento, 'usuarios' => $evento->usuarios()->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evento $evento)
    {
        $evento = Evento::find($evento->id);
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->descripcion = $request->input('descripcion');
        $evento->ciudad = $request->input('ciudad');
        $evento->direccion = $request->input('direccion');
        $evento->aforomax = $request->input('aforomax');
        $evento->tipo = $request->input('tipo');
        $evento->numMaxEntradas = $request->input('numMaxEntradas');
        $evento->categoria_id = $request->input('categoria_id');

        $evento->save();

        return redirect()->intended('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect('/dashboard');
    }

    //borra un ususario solo admin
    public function borrarUser(Evento $evento, User $user)
    {
        if ($evento->usuarios()->where('user_id', $user->id)->get()->count() == 1) {
            $evento->usuarios()->detach($user->id);
        }

        return back();
    }
    //borra un usuario determinado solo webe
    public function borrarUserWeb(Evento $evento, User $user)
    {
        if ($evento->usuarios()->where('user_id', $user->id)->get()->count() == 1) {
            $evento->usuarios()->detach($user->id);
        }

        return back();
    }



    //metodos de busqueda
    public function buscarFecha(Request $request)
    {

        $eventos = Evento::where('fecha', '=', $request->input('fecha'))->get();

        if(Auth::user()->rol=="admin" || Auth::user()->rol=="creadoreve"){
            return view('admin.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }else{
            return view('asistente.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }
    }

    public function buscarCiudad(Request $request)
    {

        $eventos = Evento::where('ciudad', '=', $request->input('ciudad'))->get();

        if(Auth::user()->rol=="admin" || Auth::user()->rol=="creadoreve"){
            return view('admin.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }else{
            return view('asistente.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }
    }

    public function buscarCategoria(Request $request)
    {

        $eventos = Evento::join('categorias', 'eventos.categoria_id', '=', 'categorias.id')->where('categoria_id', '=', $request->input('categoria'))->get();

        if(Auth::user()->rol=="admin" || Auth::user()->rol=="creadoreve"){
            return view('admin.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }else{
            return view('asistente.buscados', ['eventos' => $eventos, 'categorias' => Categoria::all()]);
        }
    }
}

@extends('asistente.layout')

@section('titulo', 'Eventos')

@section('main')

<div class="d-flex justify-content-evenly">
  <div>
    {{-- bucar por fecha --}}
    <form action="/evento/buscar/fecha" method="post">
      @csrf
      <label for="fecha">Fecha: </label>
      <input type="date" id="fecha" name="fecha">
      <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>
  </div>
  <div>
    {{-- buscar por ciudad --}}
    <form action="/evento/buscar/ciudad" method="post">
      @csrf
      <label for="ciudad">Ciudad: </label>
      <input type="text" id="ciudad" name="ciudad">
      <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>
  </div>
  <div>
    {{-- buscar por categoria --}}
    <form action="/evento/buscar/categoria" method="post">
      @csrf
      <label for="categoria">Categoria</label>
      <select name="categoria" id="">
        <option>Elige una categoria...</option>
          @foreach($categorias as $categoria)
              <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
          @endforeach
      </select>
      <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>
  </div>
</div>

<div class="album py-5 ">
  <div class="container-fluid">
      <div class="row  row-cols-sm-1 row-cols-md-2  row-cols-lg-3 row-cols-xl-4 g-3">
    @foreach($eventos as $key => $evento)
        {{-- <div class='col-lg-4 d-flex justify-content-center mt-4 mb-5'> --}}
            {{-- <div class="card bg-dark" style="width: 18rem;">
                <div class="card-body ">
                    <h2 class="card-title text-center text-warning-emphasis">{{$evento->nombre}}</h2>
                    <p class="card-subtitle mb-2 text-light-emphasis">{{$evento->fecha}}</p>
                    <p class="card-text text-light">{{$evento->descripcion}}</p>
                    <p class="card-text text-light">{{$evento->ciudad}}</p>
                    <p class="card-text text-light">{{$evento->direccion}}</p>
                    <p class="card-text text-light">Aforo: {{$evento->aforomax}}</p>
                    <p class="card-text text-light">{{$evento->tipo}}</p>
                    <p class="card-text text-light">Nº MaxEntradas: {{$evento->numMaxEntradas}}</p>
                    @foreach($categorias as $key => $categoria)
                        @if ($evento->categoria_id == $categoria->id)
                        <p class="card-text text-light">{{ $categoria->nombre }}</p>
                        @endif
                    @endforeach
                </div>
            </div> --}}
            {{-- <div class="card mb-3" style="width: 900px;">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="{{ asset($evento->imagen) }}" class=" rounded-start" width="100%" height="530" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body bg-dark">
                        <h2 class="card-title text-center text-warning-emphasis">{{$evento->nombre}}</h2>
                        <p class="card-text text-light">{{$evento->descripcion}}</p>
                        <p class="card-text text-light">{{$evento->ciudad}}</p>
                        <p class="card-text text-light">{{$evento->direccion}}</p>
                        <p class="card-text text-light">Aforo: {{$evento->aforomax}}</p>
                        <p class="card-text text-light">{{$evento->tipo}}</p>
                        <p class="card-text text-light">Nº MaxEntradas: {{$evento->numMaxEntradas}}</p>
                        @foreach($categorias as $key => $categoria)
                            @if ($evento->categoria_id == $categoria->id)
                            <p class="card-text text-light">{{ $categoria->nombre }}</p>
                            @endif
                        @endforeach
                        <p class="card-subtitle mb-2 text-light-emphasis">{{$evento->fecha}}</p>
                    </div>
                  </div>
                </div>
              </div> --}}
              <div class="">
                <div class="card shadow-lg anima">
                    <img src="{{ asset($evento->imagen) }}" class=" rounded-top" alt="..." width="100%" height="350">
                <div class="card-body rounded">
                  <h2 class="card-title text-center text-warning-emphasis">{{$evento->nombre}}</h2>
                        <p class="card-text text-dark"><strong>Ciudad:&nbsp</strong>{{$evento->ciudad}}</p>
                        <p class="card-text text-dark"><strong>Aforo Maximo:&nbsp</strong>{{$evento->aforomax}}</p>
                        <p class="card-text text-dark"><strong>Tipo:&nbsp</strong>{{$evento->tipo}}</p>
                        @foreach($categorias as $key => $categoria)
                            @if ($evento->categoria_id == $categoria->id)
                            <p class="card-text text-dark"><strong>Categoria:&nbsp</strong>{{ $categoria->nombre }}</p>
                            @endif
                        @endforeach

                        <p class="card-subtitle mb-2 text-light-emphasis float-end">{{$evento->fecha}}</p>
                        <a class="btn btn-outline-dark shadow-lg" href="/eventos/{{$evento->id}}/detalle">INFORMACION DEL EVENTO</a>
                </div>
                </div>
            </div>
        {{-- </div> --}}
    @endforeach
  </div></div></div>
    <div class='row me-5 mb-5'>
        {{ $eventos->links() }}
    </div>
@endsection
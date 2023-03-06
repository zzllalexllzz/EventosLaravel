@extends('asistente.layout')

@section('titulo', 'Eventos')

@section('main')
<!-- Button trigger modal -->
<center>
  <div class="">
    <button type="button" class="btn btn-outline-dark mb-5 " data-bs-toggle="modal" data-bs-target="#exampleModal">
      INSCRIBIRME
    </button>
  </div>
  
</center>


  <div class="row mb-5 flex justify-content-center">
    <div class="col-sm-4 mb-3 mb-sm-0">
      <div class="card shadow-lg animaeve">
        <div class="card-body ">
          <h5 class="card-title text-center">EVENTO</h5>
          <h1 class="card-title text-center text-warning-emphasis">{{$eventos->nombre}}</h1>
          <p class="card-text"><strong>Descripcion: </strong><br>{{$eventos->descripcion}}</p>
          <p class="card-text"><strong>Ciudad: </strong><br>{{$eventos->ciudad}}</p>
          <p class="card-text"><strong>Direccion: </strong><br>{{$eventos->direccion}}</p>
          <p class="card-text"><strong>Aforo Maximo: </strong><br>{{$eventos->aforomax}}</p>
          <p class="card-text"><strong>Tipo: </strong><br>{{$eventos->tipo}}</p>
          <p class="card-text"><strong>Nº Maximo de Entradas: </strong><br>{{$eventos->numMaxEntradas}}</p>
          @foreach($categorias as $key => $categoria)
              @if ($eventos->categoria_id == $categoria->id)
              <p class="card-text"><strong>Categoria: </strong><br>{{ $categoria->nombre }}</p>
              @endif
          @endforeach
          <strong>Fecha: </strong><br>
          <p class="card-subtitle mb-2 text-light-emphasis">{{$eventos->fecha}}</p>
        </div>
        <img src="{{asset($eventos->imagen)}}" class="card-img-top" alt="...">
      </div>
    </div>
    <div class="col-sm-4 ">
      <div class="card shadow-lg animaeve">
        <div class="card-body">
          <h2 class="card-title text-center">Paticipantes del Evento</h2>
          <ul class="list-group list-group-flush">
            @foreach($usuarios as $key => $usuario)
            <li class="list-group-item"><strong>Nombre:</strong>&nbsp{{$usuario->nombre}}&nbsp{{$usuario->apellido}}, <strong>Edad:</strong>&nbsp{{$usuario->edad}} años
          @if(Auth::user()->id==$usuario->id)
          <a class="float-end" href="/evento/{{$eventos->id}}/user/{{Auth::user()->id}}/del"><i class="bi bi-x-lg text-danger"></i></a>
          @endif
          @endforeach
        </li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Limite de entradas: {{$eventos->numMaxEntradas}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
        <form method='POST' action='/evento/user/storeweb'>
            @csrf
            <!-- user_id -->
              <input type="hidden" name="user_id" value={{Auth::user()->id}}/>
            <!-- evento -->
              <input type="hidden" name="evento_id" value={{$eventos->id}}/>
            <!-- estado -->
              <input type="hidden" name="estado" value="recibida"/>
              <!-- numEntradas -->
              <label for="numEntradas">Numero de Entradas</label>
              <input type="number" name="numEntradas" min="1" max="{{$eventos->numMaxEntradas}}"/><br>

              <button type="submit" class="btn btn-outline-info text-center">Incribirme</button>
        </form>
        </div>
        <div class="modal-footer bg-dark">
        </div>
      </div>
    </div>
  </div>
@endsection
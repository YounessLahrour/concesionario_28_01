@extends('plantillas.plantilla')
@section('titulo')
    Coches
@endsection
@section('cabecera')
    Coches disponibles
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
<div class="container">
<a href="{{route('coches.create')}}" class="btn btn-success mb-3">Nuevo coche</a>
<form name="search" action="{{route('coches.index')}}" method="GET" class="form-inline float-right">
  <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>
  
    <select name="marca_id" class="form-control mr-2" onchange="this.form.submit()">
    <option value="%">Todos</option>
    <option value="-1">Sin marca</option>
    @foreach ($marcas as $item)
    @if ($item->id== $request->marca_id)
        <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
      @else
      <option value="{{$item->id}}" >{{$item->nombre}}</option>
    @endif
    @endforeach
  </select>
  <select name="tipo" class="form-control" onchange="this.form.submit()">
      <option value="%">Todos</option>
    @foreach ($tipos as $item)
  <option value="{{$item}}">{{$item}}</option>
    @endforeach
  </select>

  
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
</div>
<table class="table table-striped table-dark mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matricula</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Tipo</th>
            
            <th scope="col">Klms</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($coches as $coch)
                 <tr>
            <th scope="row" class="align-middle">
            <a href="{{route('coches.show', $coch)}}" class="btn btn-secondary">Detalles</a>
            </th>
        <td class="align-middle">{{$coch->matricula}}</td>
        <td class="align-middle">{{$coch->marca->nombre}}</td>
            <td class="align-middle">{{$coch->modelo}}</td>
            <td class="align-middle">{{$coch->tipo}}</td>
            
            <td class="align-middle">{{$coch->klms}}</td>
            <td class="align-middle">
                    <img src="{{asset($coch->foto)}}" width="90px" height="90px" class="rounded-circle" >
                    </td>
                    <td class="align-middle">
                        <form name="borrar" action="{{route('coches.destroy', $coch)}}" method="POST" style="white-space: nowrap">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('coches.edit', $coch)}}" class="btn btn-warning normal">Editar</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar coche?')">Borrar</button>
                            
                          </form>
                    </td>
          </tr>
            @endforeach
         
       
        </tbody>
      </table>
      {{$coches->appends(Request::except('page'))->links()}}
      <a href="{{route('index')}}" class="btn btn-info align:left"><- Atras</a>
@endsection
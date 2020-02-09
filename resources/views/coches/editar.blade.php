@extends('plantillas.plantilla')
@section('titulo')
   Editar Coches
@endsection
@section('cabecera')
   Modificar Coche
@endsection
@section('contenido')
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $item)
    <li>
      {{$item}}
    </li>
@endforeach  
</ul>  
</div>    
 
@endif
<form name="c" method="POST" action="{{route('coches.update', $coch)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-row mt-3">
    <div class="col">
    <input type="text" class="form-control" value="{{$coch->matricula}}" name="matricula" required>
    </div>
    <div class="col">
        <select name="marca_id" class="form-control">
      @foreach ($marcas as $item)
      @if ($coch->marca_id==$item->id)
        <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
      @else
      <option value="{{$item->id}}" >{{$item->nombre}}</option>
      @endif
      @endforeach
      </select>
    </div>
    <div class="col">
        <input type="text" class="form-control" value="{{$coch->modelo}}" name="modelo" required>
      </div>
  </div>
  <div class="form-row mt-3">
      <div class="col">
      
        <input type="text" class="form-control" value="{{$coch->color}}" name="color">
      </div>
      <div class="col">
          <select name="tipo" class="form-control">
            @foreach ($tipos as $tipo)
              @if ($tipo==$coch->tipo)
          <option selected>{{$tipo}}</option>
              @else
          <option >{{$tipo}}</option>
              @endif
            @endforeach
            
        </select>
      </div>
      <div class="col">
          <input type="number" class="form-control" value="{{$coch->klms}}" name="klms" required>
        </div>
        <div class="col">
            <input type="number" class="form-control" value="{{$coch->pvp}}" name="pvp" required>
          </div>
    </div>

    <div class="form-row mt-3">
          <div class="col">
              <input type="file" class="form-control" name="foto" accept="image/*">
              <img src="{{asset($coch->foto)}}" width="50vw" height="50vh" class="rounded-circle">
            </div>
            
      </div>

      <button type="submit" class="btn btn-success" value="Guardad">Modificar</button>
          <a href="{{route('coches.index')}}" class="btn btn-info">Volver</a>
</form>

@endsection
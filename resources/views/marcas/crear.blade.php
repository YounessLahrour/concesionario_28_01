@extends('plantillas.plantilla')
@section('titulo')
    Marcas
@endsection
@section('cabecera')
   Crear Marca
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
<form name="c" method="POST" action="{{route('marcas.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-row mt-3">
    <div class="col">
        Nombre:
      <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
    </div>
    <div class="col">
        Pais:
        <select name="pais" class="form-control">
            @foreach ($paises as $item)
            @if ($item=="España")
            <option selected>{{$item}}</option>
            @endif
                <option >{{$item}}</option>
            @endforeach
            
                
      </select>
    </div>
    
          <div class="col ">
              Logo:
              <input type="file" class="form-control " name="logo" accept="image/*">
            </div>    
      </div>
      <div class="col mt-3">
           <button type="submit" class="btn btn-success" value="Guardad">Guardar</button>
            <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
            <a href="{{route('marcas.index')}}" class="btn btn-info">Volver</a>
      </div>
           
</form>

@endsection
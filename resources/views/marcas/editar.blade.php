@extends('plantillas.plantilla')
@section('titulo')
    Marcas
@endsection
@section('cabecera')
   Editar Marca
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
<form name="c" method="POST" action="{{route('marcas.update', $marca)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-row mt-3">
    <div class="col">
        Nombre:
    <input type="text" class="form-control" value="{{$marca->nombre}}" name="nombre" required>
    </div>
    <div class="col">
        Pais:
        <select name="pais" class="form-control">
            @foreach ($paises as $pais)
                @if ($pais==$marca->pais)
                    <option selected>{{$pais}}</option>
                @else
                    <option >{{$pais}}</option>
                @endif
            @endforeach  
       </select>
    </div>        
      </div>
      <div class="col ">
          Logo:
          <img src="{{asset($marca->logo)}}" width="90px" height="90px" class="rounded-circle mt-3" >
          
        </div> 
        <div class="col">
            Cambiar Logo:
            <input type="file" class="form-control mt-3 col-md-4" name="logo" accept="image/*">
        </div>
      <div class="col mt-3">
           <button type="submit" class="btn btn-success" value="Editar">Editar</button>
            <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
            <a href="{{route('marcas.index')}}" class="btn btn-info">Volver</a>
      </div>
           
</form>

@endsection
@extends('plantillas.plantilla')
@section('titulo')
    Coches
@endsection
@section('cabecera')
   Crear Coche
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
<form name="c" method="POST" action="{{route('coches.store')}}" enctype="multipart/form-data">
  @csrf
  
  <div class="form-row mt-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Matricula" name="matricula" required>
    </div>
    <div class="col">
        <select name="marca_id" class="form-control">
      @foreach ($marcas as $item)
        <option value="{{$item->id}}">{{$item->nombre}}</option>
      @endforeach
      </select>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="Modelo" name="modelo" required>
      </div>
  </div>
  <div class="form-row mt-3">
      <div class="col">
        <input type="text" class="form-control" placeholder="Color" name="color">
      </div>
      <div class="col">
          <select name="tipo" class="form-control">
            <option selected>Diesel</option>
            <option >Gasolina</option>
            <option >Hibrido</option>
            <option >Eléctrico</option>
            <option >Gas (GNC/GLC)</option>
        </select>
      </div>
      <div class="col">
          <input type="number" class="form-control" placeholder="Kilometros" name="klms" required>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Precio" name="pvp" required>
          </div>
    </div>

    <div class="form-row mt-3">
          <div class="col">
              <input type="file" class="form-control" name="foto" accept="image/*">
            </div>
            
      </div>

      <button type="submit" class="btn btn-success" value="Guardad">Guardar</button>
            <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
          <a href="{{route('coches.index')}}" class="btn btn-info">Volver</a>
</form>

@endsection
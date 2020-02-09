@extends('plantillas.plantilla')
@section('titulo')
    Detalle Coche
@endsection
@section('cabecera')
    Detalles Coches Matricula <i><b>{{$coch->matricula}}</b></i>
<a href="{{route('coches.index')}}" class="btn btn-info">Volver</a>
@endsection
@section('contenido')
<p class="font-weight-bold ml-3">Matricula: {{$coch->matricula}} </p> 
<p class="font-weight-bold ml-3">Marca: {{$coch->marca->nombre}} </p>
<p class="font-weight-bold ml-3">Logo: <img src="{{asset($coch->marca->logo)}}" width="40vw" height="40vh" class="ml-5"></p>
<table class="ml-3" cellspacing='5' cellspacing='5'>
    <tr>
        <td>
        <p class="font-weight-bold">Modelo: {{$coch->modelo}}</p>
        </td>
        <td rowspan="5" class="">
        <img src="{{asset($coch->foto)}}" width="150vw" height="150vh">
        </td>
    </tr>
    <tr>
            <td>
                <p class="font-weight-bold">Color: {{$coch->color}}</p>
            </td>
    </tr>
    <tr>
            <td>
                <p class="font-weight-bold">Tipo: {{$coch->tipo}}</p>
            </td>
    </tr>
    <tr>
            <td>
                <p class="font-weight-bold">PVP(€): {{$coch->pvp}}</p>
            </td>
    </tr>
    <tr>
            <td>
                <p class="font-weight-bold">Kilometros: {{$coch->klms}}</p>
            </td>
    </tr>
</table>
@endsection
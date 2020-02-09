@extends('plantillas.plantilla')
@section('titulo')
    Marcas
@endsection
@section('cabecera')
<div>Detalles de <b>{{$marca->nombre}}</b></div>
@endsection
@section('contenido')
<table class="ml-3" cellspacing='5' cellspacing='5'>
        <tr>
            <td >
            Nombre:
            <p class="font-weight-bold"> {{$marca->nombre}}</p>
            </td>
            <td rowspan="5" >
            <img src="{{asset($marca->logo)}}" width="150vw" height="150vh" class="rounded-circle">
            </td>
        </tr>
        <tr>
                <td>
                    Pais:
                    <p class="font-weight-bold"> {{$marca->pais}}</p>
                </td>
        </tr>
    
    </table>
    <a href="{{route('marcas.index')}}" class="btn btn-info ">Volver</a>
@endsection
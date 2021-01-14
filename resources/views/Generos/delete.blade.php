@extends('layout')
<h2>Deseja eliminar o Genero</h2>
<h2>{{$genero->designacao}}</h2>
<form action="{{route('generos.destroy', ['id'=>$genero->id_genero])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$genero->id_genero}}">
    <input type="submit" value="Eliminar">
</form>
@extends('layout')
<h2>Deseja eliminar o Album</h2>
<h2>{{$album->titulo}}</h2>
<form action="{{route('albuns.destroy', ['id'=>$album->id_album])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$album->id_album}}">
    <input type="submit" value="Eliminar">
</form>
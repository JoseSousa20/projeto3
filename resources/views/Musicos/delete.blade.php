@extends('layout')
<h2>Deseja eliminar o Musico</h2>
<h2>{{$musico->nome}}</h2>
<form action="{{route('musicos.destroy', ['id'=>$musico->id_musico])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$musico->id_musico}}">
    <input type="submit" value="Eliminar">
</form>